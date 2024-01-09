<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';

try {
    
    $title = 'Liste des catégories';
    $category = new Category();
    
    $result = $category->getAll();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
