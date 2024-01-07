<?php
require __DIR__ . '/../../../config/config.php';

session_start();

$dsn = 'mysql:host=localhost;dbname=rent_my_ride';
$userdb = 'BorisRide';
$passdb = 'M7cya2wS3QLr85YF';

if (isset($_GET['id_category'])) {
    $id_category = $_GET['id_category'];
    try {
        $mydb = new PDO($dsn, $userdb, $passdb);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `categories` WHERE `id_category`=:id_category LIMIT 1";

        $stmt = $mydb->prepare($query);

        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetch();

        $mydb = null;
        $stmt = null;
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_category = $_POST['id_category'];
    $name = $_POST['name'];
    try {
        $mydb = new PDO($dsn, $userdb, $passdb);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE `categories` SET `name`=:name WHERE `id_category`=:id_category";

        $stmt = $mydb->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);

        var_dump($_POST);

        $result = $stmt->execute();

        $mydb = null;
        $stmt = null;

        if($result) {
            $_SESSION['status'] = "Catégorie modifié avec succès !";
            header('Location:list-ctrl.php');
        }
        
        die;
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
