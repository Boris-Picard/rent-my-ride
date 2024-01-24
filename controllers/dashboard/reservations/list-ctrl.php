<?php
session_start();

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';

try {
    $title = 'Liste des réservations';

    $rents = Rent::getAll();

    $confirmedRents = Rent::getAll(archived: false);
    
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
    

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/reservations/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
