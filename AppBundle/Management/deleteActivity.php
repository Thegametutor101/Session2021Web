<?php
require_once ('DB/Model/ModelActivities.php');
$modelActivities = new ModelActivities();
echo json_encode($modelActivities->removeActivity($_POST['id']));