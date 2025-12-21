<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$driverArray = listerConducteurs($pdo);

include PHP_ROOT . "/views/driver/list-driver-view.php";
?>
