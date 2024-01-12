<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


try {
    $title = 'Modification d\'un véhicule';

    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // utilisation de la méthode static getAll qui permet de récuper toutes les données dans categories
    $listCategories = Category::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // nettoyage et validation de la marque
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

        // nettoyage et validation du modèle
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

        // nettoyage et validation de l'immatriculation
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

        // nettoyage et validation du kilomètrage
        $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);

        if (empty($mileage)) {
            $error['mileage'] = 'Veuillez remplir le champ';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MILEAGE . '/')));
            if (!$isOk) {
                $error['mileage'] = "Vous devez entrer un kilométrage valide";
            } else {
                if (strlen($mileage) < 1 || strlen($mileage) > 10) {
                    $error['registration'] = 'La longueur du kilomètrage doit avoir 1 chiffre minimum 10 chiffres maximum';
                    $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
                }
            }
        }

        /* array_column permet de transformer mon tableau d'ojects en tableau 
            2 paramètres requis => tableau d'ojects et ce que je recherche dans ce dernier */
        $categoryIds = array_column($listCategories, 'id_category');

        // nettoyage et validation du select d'une catégorie
        $id_category = filter_input(INPUT_POST, 'categories', FILTER_SANITIZE_NUMBER_INT);

        if (empty($id_category)) {
            $error['categories'] = 'Veuillez sélectionner une catégorie';
            $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
        } else {
            if (!in_array($id_category, $categoryIds)) {
                $error['categories'] = 'Ce n\'est pas une catégorie valide';
                $alert['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }
        }
        
        $namePicture = null;

        // nettoyage et validation de l'upload d'une image donnée non obligatoire
        if(!empty($_FILES['picture']['name'])) {
            try {
                if($_FILES['picture']['error'] != 0) {
                    throw new Exception("Error");
                }
                if(!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                    throw new Exception("Format non autorisé");
                }
                if($_FILES['picture']['size'] > IMAGE_SIZE) {
                    throw new Exception("Image trop grande");
                }

                $from = $_FILES['picture']['tmp_name'];
    
                $fileName = uniqid('img_');
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    
                $to =  __DIR__ . '/../../../public/uploads/vehicles/' .$fileName.'.'.$extension;

                $namePicture = $fileName. '.' . $extension;
    
                $moveFile = move_uploaded_file($from,$to);
        
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }
        
        if(empty($error)) {
            $vehicles = new Vehicle();

            $vehicles->setBrand($brand);
            $vehicles->setModel($model);
            $vehicles->setRegistration($registration);
            $vehicles->setMileage($mileage);
            $vehicles->setPicture($namePicture);

            Vehicle::getAll($id_vehicle);

            $result = $vehicles->insert($id_vehicle);

            if($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-ctrl.php');
            }
        }

    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/vehicles/update.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
