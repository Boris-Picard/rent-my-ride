<?php 

require_once __DIR__ . '/../../models/Vehicle.php';
// require_once __DIR__ . '/../../models/Category.php';


$id_vehicle = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$vehicle = Vehicle::get($id_vehicle);

$title = $vehicle->model;











include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/home/vehicle.php';
include __DIR__ . '/../../views/templates/footer.php';
