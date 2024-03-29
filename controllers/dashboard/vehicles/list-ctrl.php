<?php
session_start();

require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $title = 'Liste des véhicules';
    $vehiclesActive = true;
    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);

    $vehicle = Vehicle::get($id_vehicle);

    if($vehicle){
        Vehicle::unarchive($id_vehicle);
    }
    if($order == null) {
        $order = 'ASC';
    }
    
    // $vehicles = Vehicle::getAll($order, true);
    $vehicles = Vehicle::getAll(order: $order, limit: 100);


    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
    


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
