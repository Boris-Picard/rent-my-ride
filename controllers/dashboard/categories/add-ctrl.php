<?php

include __DIR__ . '/../../../models/Category.php';

$hostdb = 'localhost';
$userdb = 'BorisRide';
$passdb = 'M7cya2wS3QLr85YF';
$namedb = 'rent_my_ride';
$sql = "mysql:host=$hostdb;dbname=$namedb;";
$dsn = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $mydb = new PDO($sql, $userdb, $passdb, $dsn);
    echo "Connexion réussie";
} catch (PDOException $error) {
    echo 'Connexion impossible';
}
