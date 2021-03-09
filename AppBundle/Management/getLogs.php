<?php
require_once ("DB/Entity/EntityLogs.php");
$EntityLogs = new EntityLogs();
echo json_encode($EntityLogs->getLogs());
