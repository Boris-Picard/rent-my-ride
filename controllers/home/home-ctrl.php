<?php

require_once __DIR__ . '/../../models/Vehicle.php';
require_once __DIR__ . '/../../models/Category.php';

try {

    $title = 'Accueil';

    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    $id_category = filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT);

    $searched = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

    if($searched == '') {
        $searched = null;
    }

    $listCategories = Category::getAll();

    $resultOnpage = 6;

    $vehicles = Vehicle::nbVehicles($id_category, search: $searched);

    $nbPages = ceil($vehicles / $resultOnpage);
    
    if ($page <= 0 || $page > $nbPages) {
        $page = 1;
    }

    $start = ($page - 1) * $resultOnpage;

    $limitPages = Vehicle::getAll($resultOnpage, $start, id: $id_category, search: $searched);
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/home/home.php';
include __DIR__ . '/../../views/templates/footer.php';
