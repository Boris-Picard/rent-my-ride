<?php

require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $vehicle = Vehicle::get($id_vehicle);

    if($vehicle->picture) {
        $link = unlink('../../../public/uploads/vehicles/'.$vehicle->picture);
    }
    
    header('Location: /controllers/dashboard/vehicles/update-ctrl.php?id='.$vehicle->id_vehicle);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/update.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';