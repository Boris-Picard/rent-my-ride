<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';


try {
    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $categoriesActive = true;
    
    $category = Category::get($id_category);

    if (!$category) {
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

    $title = 'Modification d\'une catégorie';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été modifiée';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['name'] = 'La catégorie du véhicule n\'est pas valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été modifiée';
            } else {
                if (strlen($name) <= 2 || strlen($name) >= 70) {
                    $error['name'] = 'La longueur de la catégorie n\'est pas bon';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été modifiée';
                }
            }
        }

        if (Category::isExist($name) && $name != $category->name) {
            $error['isExist'] = 'Donnée déjà existante';
            $alert['error'] = 'Donnée déjà existante';
        }

        if (empty($error)) {

            $category = new Category();

            $category->setName($name);
            $category->setIdCategory($id_category);

            $category->update();

            $alert['success'] = 'La donnée a bien été modifiée ! Vous allez être redirigé(e).';
            header('Refresh:3; url=list-ctrl.php');
        }
        $category = Category::get($id_category);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
