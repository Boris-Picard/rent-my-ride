<?php

$error = [];
$alert = [];

define('REGEX_NAME', '^[A-Za-zé \'-]{2,100}+$');
define('REGEX_MODEL', '^[a-zA-Z0-9_. -]*$');
define('REGEX_REGISTRATION', '^[A-Z]{2}-\d{3}-[A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]{1,10}$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_PHONE', '^(33|0)(6|7|9)\d{8}$');
define('REGEX_CITY', '^[a-zA-ZÀ-Ÿ -.]*$');
define('REGEX_ZIP', '^[0-9]{5}$');

define('DSN', 'mysql:host=localhost;dbname=rent_my_ride');
define('USER', 'BorisRide');
define('PASSWORD', 'M7cya2wS3QLr85YF');

define('IMAGE_TYPES',  ['image/jpeg', 'image/png', 'image/avif']);
define('IMAGE_SIZE', 2*1024*1024);