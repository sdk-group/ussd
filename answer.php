<?php 
    require("general.php");
    $curr = $_SESSION['current'];
    $stats= $_SESSION['stats']; 
    $_SESSION['answered'] = true;
    $next = ($curr == sizeof($qa) - 1)? "fin.php" : "question.php";
    $text = $qa[$curr]["a_text"];
    header( 'Content-Type: text/xml'); 
    print '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<page version="2.0">
    <div protocol="ussd">
        <?php echo $text?>
        <input navigationId="form" title="Ваша оценка" name="stat"/>
    </div>
    <navigation id="form" protocol="ussd">
        <link pageId="<?php echo $next ?>" ></link>
    </navigation>
</page>