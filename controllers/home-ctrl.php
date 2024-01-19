<?php

require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';

try {
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    if ($page <= 0 || (empty($page))) {
        $page = 1;
    }

    $pages = Vehicle::nbVehicles();

    $resultOnpage = 10;

    $nbPages = ceil($pages / $resultOnpage);

    $start = ($page - 1) * $resultOnpage;

    $limitPages = Vehicle::getAll($resultOnpage, $start);

    $listCategories = Category::getAll();

    $id_category = filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($id_category)) {
        $pages = Vehicle::nbVehicles($id_category);
        $nbPages = ceil($pages / $resultOnpage);
        var_dump($pages);
        $start = ($page - 1) * $resultOnpage;

        $limitPages = Vehicle::getAll($resultOnpage, $start, id: $id_category);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
