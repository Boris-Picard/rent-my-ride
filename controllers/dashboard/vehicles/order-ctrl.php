<?php
session_start();

require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $title = 'Liste des véhicules';

    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);

    $vehicles = Vehicle::getAll($order);

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