<?php
require_once (__DIR__."/DB/Entity/EntityLinks.php");
$entityLink = new EntityLinks();
echo $entityLink->getLink($_POST['id']);