<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';

try {
    $title = 'Ajout d\'un véhicule';

    $listCategories = Category::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($brand)) {
            $error['brand'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['brand'] = 'La marque véhicule n\'est pas valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
            } else {
                if (strlen($brand) <= 2 || strlen($brand) >= 50) {
                    $error['brand'] = 'La longueur de la marque du véhicule n\'est pas valide';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
                }
            }
        }

        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($model)) {
            $error['model'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MODEL . '/')));
            if (!$isOk) {
                $error['model'] = 'Le modèle du véhicule n\'est pas valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
            } else {
                if (strlen($model) <= 2 || strlen($model) >= 50) {
                    $error['model'] = 'La longueur du modèle du véhicule n\'est pas valide';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
                }
            }
        }

        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($registration)) {
            $error['registration'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_REGISTRATION . '/')));
            if (!$isOk) {
                $error['registration'] = 'L\'immatriculation du véhicule n \'est pas valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
            } else {
                if (strlen($registration) < 9) {
                    $error['registration'] = 'La longueur de l\'immatriculation doit faire 9 caractères';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
                }
            }
        }

        $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);

        if (empty($mileage)) {
            $error['mileage'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MILEAGE . '/')));
            if (!$isOk) {
                $error['mileage'] = "Vous devez entrer un kilométrage valide";
            } else {
                if (strlen($mileage) > 10) {
                    $error['registration'] = 'La longueur du kilomètrage doit faire 10 caractères maximum';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
                }
            }
        }

        $id_category = filter_input(INPUT_POST,'categories', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

        if($id_category != null) {
            foreach ($id_category as $category) {
                if(!empty($categories) && !in_array($category,$categories)) {
                    $error['checkbox'] = "Veuillez séléctionner un langage valide";
                }
            }
        }

    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/add-vehicles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
