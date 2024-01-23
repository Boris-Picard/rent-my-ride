<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Vehicle.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Client.php';
require_once __DIR__ . '/../../models/Rent.php';

try {

    $id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $vehicle = Vehicle::get($id_vehicle);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $error['firstname'] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['firstname'] = 'Veuillez renseigner un prénom valide';
            }
        }

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $error['lastname'] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['lastname'] = 'Veuillez renseigner un prénom valide';
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($email)) {
            $error['email'] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $error['email'] = 'Veuillez renseigner un email valide';
            }
        }

        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($birthdate)) {
            $error["birthdate"] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["birthdate"] = 'La date entrée n\'est pas valide!';
            } else {
                $birthdateObj = new DateTime($birthdate);
                // Calcul de l'age de l'utilisateur (année courante - année de naissance)
                $age = date('Y') - $birthdateObj->format('Y');
                if ($age > 100 || $age < 18) {
                    $error["birthdate"] = 'Votre age n\'est pas conforme!';
                }
            }
        }

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        if (empty($phone)) {
            $error["phone"] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
            if (!$isOk) {
                $error["phone"] = 'Le numéro entrée n\'est pas valide!';
            }
        }

        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $error["city"] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CITY . '/')));
            if (!$isOk) {
                $error["city"] = 'La ville n\'est pas valide';
            }
        }

        $postal = filter_input(INPUT_POST, 'postal', FILTER_SANITIZE_NUMBER_INT);
        if (empty($postal)) {
            $error['postal'] = 'Veuillez renseigner ce champ';
        } else {
            $isOk = filter_var($postal, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIP . '/')));
            if (!$isOk) {
                $error['postal'] = 'Le code postal n\'est pas valide';
            }
        }

        $startDate = filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($startDate)) {
            $error['startDate'] = 'Veuillez renseigner une date';
        } else {
            $startDateObj = new DateTime($startDate);
            $startDateFormat = $startDateObj->format('Y-m-d H:i:s');
        }

        $endDate = filter_input(INPUT_POST, 'endDate');
        if (empty($endDate)) {
            $error['endDate'] = 'Veuillez renseigner une date';
        } else {
            $endDateObj = new DateTime($endDate);
            $endDateFormat = $endDateObj->format('Y-m-d H:i:s');
        }
        
        if (empty($error)) {
            $client = new Client();

            $client->setLastname($lastname);
            $client->setFirstname($firstname);
            $client->setEmail($email);
            $client->setBirthday($birthdate);
            $client->setPhone($phone);
            $client->setCity($city);
            $client->setZipcode($postal);

            $result = $client->insert();

            if ($result) {
                $rent = new Rent();

                $rent->setStartDate($startDate);
                $rent->setEndDate($endDate);
                $rent->setIdVehicle($id_vehicle);
                // $rent->setIdClient()

                $rent->insert();
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}










include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/home/reservation.php';
include __DIR__ . '/../../views/templates/footer.php';
