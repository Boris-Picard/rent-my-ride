<?php

require __DIR__ . '/../../../config/config.php';

// Nettoyage et validation des inputs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name)) {
        $error['name'] = "Veuillez remplir le champ";
    } else {
        $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isOk) {
            $error['name'] = "La catégorie du véhicule n'est pas valide";
        } else {
            if (strlen($name) <= 2 || strlen($name) >= 70) {
                $error['name'] = "La longueur de la catégorie n'est pas bon";
            }
        }
    }

    if (empty($error)) {
        // Connection a la database
        $dsn = 'mysql:host=localhost;dbname=rent_my_ride';
        $userdb = 'BorisRide';
        $passdb = 'M7cya2wS3QLr85YF';

        try {
            $mydb = new PDO($dsn, $userdb, $passdb);
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO `categories` (`name`)
                            VALUES(:name);";

            $stmt = $mydb->prepare($query);

            $stmt->bindParam(':name', $name);

            $stmt->execute();

            $mydb = null;
            $stmt = null;

            header('Location:list-ctrl.php');

            die;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}








include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
