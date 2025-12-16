<?php
include '../fonctions.php';
require '../connexiondb.php';

$vehiculeArray = listerVehicules($pdo);

include PATH_PROJECT . "/views/vehicule/list-vehicule-view.php";
