<?php

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';

try {
    $title = 'Confimer une réservation';

    $client = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = intval(filter_input(INPUT_GET, 'vehicle', FILTER_SANITIZE_NUMBER_INT));
    
    $rent = Rent::getAll($client, $vehicle);
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/reservations/confirm.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
