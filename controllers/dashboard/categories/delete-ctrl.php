<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = "Veuillez remplir le champ";
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['name'] = "La catégorie du véhicule n'est pas valide";
            } else {
                if (strlen($name) <= 2 || strlen($name) >= 70) {
                    $error['name'] = "La longueur de la catégorie n'est pas bon";
                }
            }
        }

        $id_category = $_POST['id_category'];

        $category = new Category();

        $category->setName($name);
        $category->setIdCategory($id_category);

        $result = $category->delete();

        header('Location:/controllers/dashboard/categories/list-ctrl.php');
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
