<?php
require_once ('DB/Model/ModelLogs.php');
$modelLogs = new ModelLogs();
echo json_encode($modelLogs->selectAllCroissant());
?>