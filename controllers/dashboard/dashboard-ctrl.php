<?php

$dsn = 'mysql:host=localhost;dbname=rent_my_ride';
$userdb = 'BorisRide';
$passdb = 'M7cya2wS3QLr85YF';

try {
    $mydb = new PDO($dsn, $userdb, $passdb);
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $count = "SELECT count(*) FROM `categories`";

    $stmt = $mydb->prepare($count);

    $stmt->execute();

    $result = $stmt->fetchAll();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header-dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/templates/footer-dashboard.php';
