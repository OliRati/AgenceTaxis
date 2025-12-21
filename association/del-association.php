<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$idAssociation = $_GET['id'] ?? null;

if (!is_numeric($idAssociation)) {
    dd("Ce conducteur n'existe pas !!!");
}

$ret = supprimerAssociation($pdo, $idAssociation);

if ($ret) {
    redirect("/association/list-association.php");
}
