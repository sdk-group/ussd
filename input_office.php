<?php 
    require("general.php");
    header( 'Content-Type: text/xml'); 
    print '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<page version="2.0">
    <div protocol="ussd">
        <input navigationId="form" title="<?php echo $input_office?>" name="office"/>
    </div>
    <navigation id="form" protocol="ussd">
        <link pageId="input_request.php" ></link>
    </navigation>
</page>