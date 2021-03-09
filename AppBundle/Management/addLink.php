<?php
require_once('DB/Model/ModelLinks.php');
$modelLinks = new ModelLinks();

echo json_encode($modelLinks->addLink($_POST['name'],
    $_POST['description'],
    $_POST['link'],
  ));