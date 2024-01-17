<?php

require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';

try {
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    if($page < 1) {
        $page = 1;
    }

    $categories = Category::getAll();

    $pages = Vehicle::getPages();

    $resultOnpage = 10;

    $nbPages = ceil($pages / $resultOnpage);

    $start = ($page - 1) * $resultOnpage;

    if(empty($page) || $page != $nbPages) {
        $start = 0;
        $getPages = Vehicle::limitPages($resultOnpage, $start);
    } else {
        $getPages = Vehicle::limitPages($resultOnpage, $start);
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';