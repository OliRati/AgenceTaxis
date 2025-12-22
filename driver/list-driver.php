<?php
require '../includes.php';

$driverArray = listerConducteurs($pdo);

include PHP_ROOT . "/views/driver/list-driver-view.php";
?>
