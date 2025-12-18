<?php
include '../fonctions.php';
require '../connexiondb.php';

$idAssociation = $_GET['id'] ?? null;

if (!is_numeric($idAssociation)) {
    dd("Ce conducteur n'existe pas !!!");
}

$ret = supprimerAssociation($pdo, $idAssociation);

if ($ret) {
    header("Location: " . WEB_ROOT . "/association/list-association.php");
}
