<?php

$error = [];
$alert = [];

define('REGEX_NAME', '^[A-Za-zé \'-]+$');
define('REGEX_MODEL', '^[a-zA-Z0-9_. -]*$');
define('REGEX_REGISTRATION', '^[A-Z]{2}-\d{3}-[A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]{10}$');

define('DSN', 'mysql:host=localhost;dbname=rent_my_ride');
define('USER', 'BorisRide');
define('PASSWORD', 'M7cya2wS3QLr85YF');
