<?php
require("general.php");

$res = send_rate($argv[1], 1, [1,2,3,5]);

echo $res;
?>