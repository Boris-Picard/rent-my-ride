<?php

require_once __DIR__ . '/../models/Vehicle.php';


try {
    $vehicles = Vehicle::getAll();

    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    $resultNbPages = 10;

    $start = ($page - 1) * $resultNbPages;

    $getPages = Vehicle::getPage();
    var_dump($getPages);

    $pages = ceil($getPages / $resultNbPages);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}








include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';