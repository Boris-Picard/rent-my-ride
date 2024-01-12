<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Vehicle.php';

try {
    $categories = Category::getAll();
    $vehicles = Vehicle::getAll();
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header-dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/templates/footer-dashboard.php';
