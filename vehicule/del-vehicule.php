<?php
include '../fonctions.php';
require '../connexiondb.php';

$idVehicule = $_GET['id'] ?? null;

if (!is_numeric($idVehicule)) {
    dd("Ce vehicule n'existe pas !!!");
}

$suppResultVehicule = supprimerVehicule($pdo, $idVehicule);

if ($suppResultVehicule) {
    redirect("/vehicule/list-vehicule.php");
}
