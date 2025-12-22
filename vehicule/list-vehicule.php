<?php
require '../includes.php';

$vehiculeArray = listerVehicules($pdo);

include PHP_ROOT . "/views/vehicule/list-vehicule-view.php";
