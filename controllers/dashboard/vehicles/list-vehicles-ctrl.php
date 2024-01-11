<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    
    $title = 'Liste des véhicules';
    
    $vehicles = Vehicle::getAll();

    // $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // if(isset($_SESSION['msg'])) {
    //     unset($_SESSION['msg']);
    // }
    


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list-vehicles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
