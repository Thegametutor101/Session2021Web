<?php
require_once('DB/Model/ModelEvents.php');
$modelEvents = new ModelEvents();

echo json_encode($modelEvents->deleteEvent($_POST['id']));