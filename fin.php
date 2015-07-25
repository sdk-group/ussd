<?php 
    require("general.php");
    $curr = $_SESSION['current'];
    $stat = $_REQUEST['stat'];
    if($stat && $_SESSION['answered']){
        $_SESSION['answered'] = false;
        $max = $qa[$curr]["a_range"]["max"];
        $min = $qa[$curr]["a_range"]["min"];
        $res = ($stat > $max)? $max : round($stat);
        $res = ($stat < $min)? $min : round($stat);
        $_SESSION['stats'][$curr] = $res; 
    }
    
    $stats = $_SESSION['stats'];
    $office = $_SESSION['office'];
    $req = $_SESSION['request'];

    $res = send_rate($office, $req, $stats);
    session_write_close();

    header( 'Content-Type: text/xml'); 
    print '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<page version="2.0">
    <title protocol="java wap">QAService</title>
    <div> <?php echo $final_thanks?></div>
</page>