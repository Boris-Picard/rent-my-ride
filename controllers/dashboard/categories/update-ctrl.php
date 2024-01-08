<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';

try {
    session_start();
    $title = 'Modification d\'une catégorie';
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
            $name = $_GET['name'];
            $id_category = $GET['id_category'];

            $category = new Category();

            var_dump($category);
            die;

            $category->getName($name);
            $result = $category->update();

            // if ($result) {
            //     $msg = 'La donnée a bien été insérée !';
            // } else {
            //     $msg = 'Erreur, la donnée n\'a pas été insérée';
            // }

            header('Location:list-ctrl.php');

            die;
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
