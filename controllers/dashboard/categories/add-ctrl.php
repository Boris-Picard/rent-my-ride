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
        $hostdb = 'localhost';
        $userdb = 'BorisRide';
        $passdb = 'M7cya2wS3QLr85YF';
        $namedb = 'rent_my_ride';

        try {
            $mydb = new PDO($sql, $userdb, $passdb, $dsn);
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie";
            $sth = $mydb->prepare("INSERT INTO `categories` (`name`)
                            VALUES('$name')");
            $sth->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}








include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
