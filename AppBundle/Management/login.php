<?php
require_once("DB/Entity/EntityAccounts.php");
$entityAccount = new EntityAccounts();
if (!empty($_POST["id"]) && !empty($_POST["password"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];
    try {
        if ($entityAccount->checkUserExists($id)) {
            $account = $entityAccount->getAccountByUsername($id);
            if ($password == $account["password"]) {
                    echo json_encode(array('item' => $account));
            } else {
                echo json_encode(array('item' => 'password'));
            }
        } else {
            echo json_encode(array('item' => 'id'));
        }
    } catch (PDOException $e) {
        echo json_encode(array('item' => "Échec de connexion à la base de données: " . $e->getMessage()));
    }
} else {
    echo json_encode(array('item' => 'empty'));
}