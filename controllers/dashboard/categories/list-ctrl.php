<?php


$dsn = 'mysql:host=localhost;dbname=rent_my_ride';
$userdb = 'BorisRide';
$passdb = 'M7cya2wS3QLr85YF';

try {
    $mydb = new PDO($dsn, $userdb, $passdb);
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = ("SELECT *, GROUP_CONCAT(`name`) FROM `categories` GROUP BY `id_category`");

    $result = $mydb->prepare($stmt);

    $result->execute();

    $mydb = null;
    $stmt = null;
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage()); 
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
