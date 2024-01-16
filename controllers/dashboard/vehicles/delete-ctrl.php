<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $vehicle = Vehicle::get($id_vehicle);

    $isDeleted = Vehicle::delete($id_vehicle);

    if($isDeleted > 0) {
        $link = unlink('../../../public/uploads/vehicles/'.$vehicle->picture);
    }

    if($isDeleted) {
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }

    header('Location: /controllers/dashboard/vehicles/list-ctrl.php');
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
