<?php
require_once ('DB/Model/ModelEvents.php');
$modelEvents = new ModelEvents();
echo json_encode($modelEvents->addEVent($_POST['name'],
    $_POST['description'],
    $_POST['location'],
    $_POST['dateStart'],
    $_POST['dateEnd'],
    $_POST['maxCapacity']));