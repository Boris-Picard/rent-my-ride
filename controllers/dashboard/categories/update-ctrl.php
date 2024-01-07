<?php

$dsn = 'mysql:host=localhost;dbname=rent_my_ride';
$userdb = 'BorisRide';
$passdb = 'M7cya2wS3QLr85YF';

$name = $_POST['name'];
$id_category = $_POST['id_category'];

try {
    $mydb = new PDO($dsn, $userdb, $passdb);
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE `categories` SET `name`=:name WHERE `id_category` = :id_category";

    $stmt = $mydb->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);

    $stmt->execute();

    $mydb = null;
    $stmt = null;

    header('Location:list-ctrl.php');

    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
