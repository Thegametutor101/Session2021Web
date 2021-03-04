<?php
require_once (__DIR__."/DB/Entity/EntityActivities.php");
$entityActivities = new EntityActivities();
echo json_encode($entityActivities->getActivityByID($_POST["id"]));