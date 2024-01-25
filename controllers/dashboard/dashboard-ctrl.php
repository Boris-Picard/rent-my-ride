<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Vehicle.php';
require_once __DIR__ . '/../../models/Rent.php';

try {
    $dashboard = true;
    $categories = Category::getAll();
    $vehicles = Vehicle::getDateOrder();
    $rents = Rent::getAll(order: false);
    
    
    $convert = strtotime($vehicles[0]['created_at']);
    $date = date('d/m/y H:i', $convert);
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header-dashboard.php';
include __DIR__ . '/../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/templates/footer-dashboard.php';
