<?php
require_once('DB/Model/ModelAccounts.php');
$modelAccount = new ModelAccounts();
echo json_encode($modelAccount->deleteAccount($_POST["username"]));