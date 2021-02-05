<?php

try {
    $connexion =  new PDO('mysql:host=localhost;dbname=sessionweb2021;port=3308', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode("erreur" . $e->getMessage());
}

if ($_POST["requete"] == "selectEvents") {
    try {
        $stmt = $connexion->prepare("SELECT * FROM EVENTS");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    } catch (PDOException $e) {
        echo json_encode($e);
    }
}

?>





