<?php
require_once (__DIR__."/DB/Entity/EntityEvents.php");
$entityEvents = new EntityEvents();
echo $entityEvents->getEvent($_POST['id']);