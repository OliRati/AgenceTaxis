<?php
include '../fonctions.php';
require '../connexiondb.php';

$idConducteur = $_GET['id'] ?? null;

if (!is_numeric($idConducteur)) {
    dd("Ce conducteur n'existe pas !!!");
}

$ret = supprimerConducteur($pdo, $idConducteur);

if ($ret) {
    header("Location: " . WEB_ROOT . "/driver/list-driver.php");
}
