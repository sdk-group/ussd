<?php

$equeue_xmlrpc_server = xmlrpc_server_create(); 
 
function MKGU_SendRate2($method_name, $params, $user_data) {
    return "Gotcha!";
}

xmlrpc_server_register_method($equeue_xmlrpc_server, 'MKGU_SendRate2', 'MKGU_SendRate2');
$data = xmlrpc_server_call_method($equeue_xmlrpc_server, $HTTP_RAW_POST_DATA, null, array('encoding' => 'utf-8', 'escaping' => 'markup'));
if ($data) {
	header('Content-Type: text/xml');
	header('charset: utf-8');
	echo $data;
}
xmlrpc_server_destroy($equeue_xmlrpc_server); 

?>