<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=sessionweb2021;port=3308', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode("erreur" . $e->getMessage());
}
if (isset($_POST["requete"])){
    if ($_POST["requete"] == "selectEvents") {
        try {
            $stmt = $connexion->prepare("SELECT * FROM EVENTS");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($results);
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    } elseif ($_POST["requete"] == "getEvent") {
        try {
            $stmt = $connexion->prepare("SELECT * FROM EVENTS WHERE `id` like :id");
            $stmt->bindParam(':id', $_POST["id"]);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    }
}else


?>





