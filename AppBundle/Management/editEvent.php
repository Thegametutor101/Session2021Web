<?php
require_once ('DB/Model/ModelEvents.php');
$modelEvents = new ModelEvents();

$location = array();
$location[] = array(
    'city' => $_POST['city'],
    'address' => $_POST['street'],
    'province' => $_POST['state'],
    'apartment' => $_POST['suite'],
    'postalCode' => $_POST['zip']
);
$json = json_encode($location);
echo json_encode($modelEvents->editEVent(
    $_POST['name'],
    $_POST['description'],
    $json,
    $_POST['dateStart'],
    $_POST['dateEnd'],
    $_POST['maxCapacity'],
    $_POST['id']
));