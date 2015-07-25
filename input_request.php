<?php 
    require("general.php");
    $_SESSION['office'] = $_REQUEST['office'];

    header( 'Content-Type: text/xml'); 
    print '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<page version="2.0">
    <div protocol="ussd">
        <input navigationId="form" title="<?php echo $input_request?>" name="request"/>
    </div>
    <navigation id="form" protocol="ussd">
        <link pageId="pre.php" ></link>
    </navigation>
</page>