<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    
    $title = 'Liste des véhicules archivées';
    $vehiclesActive = true;
    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    if($id_vehicle) {
        Vehicle::archive($id_vehicle);
        header('location: /controllers/dashboard/vehicles/archive-ctrl.php');
    }

    $vehicles = Vehicle::getAll(archived: false);

    // $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // if(isset($_SESSION['msg'])) {
    //     unset($_SESSION['msg']);
    // }
    

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/archive.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';