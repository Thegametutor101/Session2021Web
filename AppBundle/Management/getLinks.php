<?php
require_once (__DIR__."/DB/Entity/EntityLinks.php");
$entityEvents = new EntityLinks();
echo json_encode($entityEvents->getLinks());