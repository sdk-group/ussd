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
        $curr++;
        $_SESSION['current'] = $curr;
    }
    $text = $qa[$curr]["q_text"];
    $title = $qa[$curr]["title"];
    header( 'Content-Type: text/xml'); 
    print '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<page version="2.0">
    <title protocol="wap java"><?php echo $title?></title>
    <div protocol="ussd">
        <?php echo $text?>
    </div>
    <navigation>
        <link accesskey="1" pageId="answer.php">Оценить
        </link>
    </navigation>
</page>