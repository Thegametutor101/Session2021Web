<?php
require_once (__DIR__."/DB/Entity/EntityAccounts.php");
$entityAccount = new EntityAccounts();
echo json_encode(array("item" => $entityAccount->getAccounts()));