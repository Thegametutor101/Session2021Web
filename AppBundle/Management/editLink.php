<?php
require_once('DB/Model/ModelLinks.php');
$modelLinks = new ModelLinks();

echo json_encode($modelLinks->editLink(
    $_POST['name'],
    $_POST['description'],
    $_POST['link'],
    $_POST['id']
));