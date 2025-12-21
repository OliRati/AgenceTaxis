<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$vehiculeArray = listerVehicules($pdo);

include PHP_ROOT . "/views/vehicule/list-vehicule-view.php";
