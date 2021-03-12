<?php
require_once (__DIR__."/DB/Entity/EntityLogs.php");
$entityLogs = new EntityLogs();
echo json_encode(array("item" => $entityLogs->getLogs()));