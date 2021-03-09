<?php
require_once ('DB/Model/ModelActivities.php');
$modelActivities = new ModelActivities();
echo json_encode($modelActivities->updateActivity($_POST['id'],
    $_POST['name'],
    $_POST['description'],
//    json_encode($_POST['location']),
    $_POST['dateStart']/*,
    $_POST['dateEnd'],
    $_POST['maxCapacity']*/));