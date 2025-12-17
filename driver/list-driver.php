<?php
include '../fonctions.php';
require '../connexiondb.php';

$driverArray = listerConducteurs($pdo);

include PATH_PROJECT . "/views/driver/list-driver-view.php";
?>
