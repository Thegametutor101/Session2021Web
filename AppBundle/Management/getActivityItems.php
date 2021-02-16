<?php
require_once (__DIR__."/DB/Entity/EntityItemList.php");
$entityItemList = new EntityItemList();
echo json_encode(array("item" => $entityItemList->getItemLists($_POST["number"])));