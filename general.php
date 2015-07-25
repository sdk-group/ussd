<?php 
    require("config.php");
    require("qa.php");
    include("lib/xmlrpc.inc");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
     
    function send_rate($office, $req_code, $stats){
        try{
            $state = 0;
            $office_code = $office;

            global $xmlrpc;

            if(sizeof($xmlrpc) > 1)
            {
                $parts = explode("*", $office);
                if(sizeof($parts) < 2)
                    return "Код офиса должен быть вида 123*123456.";

                $state = $parts[0];
                $office_code = $parts[1];
            }

            if(!$req_code)
                return "Код талона не указан.";        

            $xmlrpc_url = parse_url($xmlrpc[$state]["url"]);
            $xmlrpc_url["user"] = $xmlrpc[$state]["auth"]["login"];
            $xmlrpc_url["pass"] = $xmlrpc[$state]["auth"]["password"];
            $xmlrpc_url["port"] = $xmlrpc[$state]["port"] ? $xmlrpc[$state]["port"]: (($xmlrpc_url["scheme"] == "https") ? 443 : 80);
            $xmlrpc_url["host"] .= ":".$xmlrpc_url["port"];
            $url = http_build_url($xmlrpc[$state]["url"], $xmlrpc_url);

            $results = [];

            for($i = 0, $sz = count($stats); $i < $sz; $i++){
                $results[$i] = new xmlrpcval(array(new xmlrpcval($i, "int"), 
                                                   new xmlrpcval($stats[$i], "int")
                                                  ), "struct");
            }

                $client = new xmlrpc_client($url);
                $client->return_type = 'phpvals';
    //            $client->setdebug(1);
                $message = new xmlrpcmsg("MKGU_SendRate2", array(new xmlrpcval($req_code, "string"), 
                                                                 new xmlrpcval($office_code, "string"), 
                                                                 new xmlrpcval($results, "struct")));
                $resp = $client->send($message);
                if ($resp->faultCode()){ 
                    return $resp->faultString(); 
                }else{ 
                    return $resp->value();
                }
        }catch(Exception $e){
            return $e->getMessage();
        }
        return true;
    }
?>