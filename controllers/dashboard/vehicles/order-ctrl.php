<?php
session_start();

require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $title = 'Liste des véhicules';
    
    $vehicles = Vehicle::getAll();

    $orders = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

    if($orders === 'desc') {
        $vehicles = Vehicle::getAllDesc();
    } 

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';