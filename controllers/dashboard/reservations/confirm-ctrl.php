<?php
session_start();

require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';
require_once __DIR__ . '/../../../helpers/Mail.php';

try {
    $title = 'Confimer une réservation';

    $id_client = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $vehicle = intval(filter_input(INPUT_GET, 'vehicle', FILTER_SANITIZE_NUMBER_INT));
    $sendMail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
    $deleteRent = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);

    $rent = Rent::getAll($id_client, $vehicle);

    $id_rent = $rent[0]->id_rent;
    $nameClient = $rent[0]->firstname;

    if ($deleteRent) {
        $delete = Rent::delete($deleteRent);
        $deleteClient = Client::delete($id_client);
        $_SESSION['msg'] = 'La réservation est bien annulée !';
        header('Location: /controllers/dashboard/reservations/list-ctrl.php');
        die;
    }

    if (isset($sendMail)) {
        $adress = 'picard.boris@gmail.com';
        $nameAdress = $nameClient;
        $subject = 'Confirmation de réservation';
        $body = 'Bonjour,' . ' ' . $rent[0]->firstname . ' ' . $rent[0]->lastname . ' ' . 'nous vous confirmons la réservation de votre véhicule <br>'
            . $rent[0]->brand . ' ' . $rent[0]->model . '<br> A Partir du :  ' . $rent[0]->startdate .
            '<br> Au : ' . $rent[0]->enddate . '';
        $mail = Mail::sendMail($adress, $nameAdress, $subject, $body);

        if ($mail) {
            $archive = Rent::archive($id_rent);
            $_SESSION['msg'] = 'Le mail est bien envoyé  !';
            header('Location: /controllers/dashboard/reservations/list-ctrl.php');
            die;
        }
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/reservations/confirm.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
