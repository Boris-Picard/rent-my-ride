<?php

require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Category.php';

try {
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    if ($page < 1 || (empty($page))) {
        $page = 1;
    }

    $categories = Category::getAll();

    $pages = Vehicle::getPages();

    $resultOnpage = 10;

    $nbPages = ceil($pages / $resultOnpage);

    $start = ($page - 1) * $resultOnpage;

    $getPages = Vehicle::limitPages($resultOnpage, $start);
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $categories = array_column($categories, 'id_category');

        $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_category)) {
            $error['categories'] = 'Veuillez sélectionner une catégorie';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            if (!in_array($id_category, $categories)) {
                $error['categories'] = 'Ce n\'est pas une catégorie valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }
        }

        $categories = Category::getAll();
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
