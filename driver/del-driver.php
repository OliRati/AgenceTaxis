<?php
require '../includes.php';

$idConducteur = $_GET['id'] ?? null;

if (!is_numeric($idConducteur)) {
    dd("Ce conducteur n'existe pas !!!");
}

$ret = supprimerConducteur($pdo, $idConducteur);

if ($ret) {
    redirect("/driver/list-driver.php");
}
