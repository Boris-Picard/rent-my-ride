<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';

try {
    $title = 'Ajout d\'une catégorie';
    // Nettoyage et validation des inputs
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

        if (empty($error)) {
            $category = new Category();

            $category->setName($name);
            $result = $category->insert();

            if($result) {
                $msg = 'La donnée a bien été insérée !';
            } else {
                $msg = 'Erreur, la donnée n\'a pas été insérée';
            }

            header('Location:list-ctrl.php');

            die;
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}







include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
