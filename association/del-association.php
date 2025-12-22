<?php
require '../includes.php';

$idAssociation = $_GET['id'] ?? null;

if (!is_numeric($idAssociation)) {
    dd("Ce conducteur n'existe pas !!!");
}

$ret = supprimerAssociation($pdo, $idAssociation);

if ($ret) {
    redirect("/association/list-association.php");
}
