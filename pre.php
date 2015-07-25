<?php 
    require("general.php");
    $_SESSION['stats'] = []; 
    $_SESSION['current'] = 0;
    $_SESSION['request'] = $_REQUEST['request'];

    $curr = $_SESSION['current'];
    $stats= $_SESSION['stats']; 
    
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
    <navigation protocol="ussd">
        <link accesskey="1" pageId="answer.php">Оценить
        </link>
    </navigation>
</page>