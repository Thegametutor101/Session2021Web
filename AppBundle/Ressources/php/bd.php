<?php
try {
    $connexion = new PDO('mysql:host=206.167.140.56;dbname=h2021_420626ri_gr01_équipe_6;port=3306', '1846551', '1846551');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode("erreur" . $e->getMessage());
}
if (isset($_POST["requete"])) {
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
    } elseif ($_POST["requete"] == "insertEvent") {
        echo 'tsts';
        try {
            $stmt = $connexion->prepare("INSERT INTO EVENTS ( name, description, location, dateStart, dateEnd, maxCapacity) VALUES (:name, :description, :location, :dateStart, :dateEnd, :maxCapacity)");
            $stmt->bindParam(':name', $_POST["name"]);
            $stmt->bindParam(':description', $_POST["description"]);
            $stmt->bindParam(':location', $_POST["location"]);
            $stmt->bindParam(':dateStart', $_POST["dateStart"]);
            $stmt->bindParam(':dateEnd', $_POST["dateEnd"]);
            $stmt->bindParam(':maxCapacity', $_POST["maxCapacity"]);
            $stmt->execute();
            echo json_encode(true);
        } catch (PDOException $e) {
            echo json_encode($e);
        }
    }
}


?>





