<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$idAssociation = $_GET['id'] ?? null;

if (!is_numeric($idAssociation)) {
    dd("Cette association n'existe pas !!!");
}

$conducteurs = listerConducteurs($pdo);
$vehicules = listerVehicules($pdo);

$association = getAssociation($pdo, $idAssociation);

$idVehicule = $association['id_vehicule'];
$idConducteur = $association['id_conducteur'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        // traitement du formulaire d'edition d'une association Vehicule - Conducteur

        $idConducteur = nettoyer($_POST['conducteur']);
        $idVehicule = nettoyer($_POST['vehicule']);

        updateAssociation($pdo, $idAssociation, $idConducteur, $idVehicule);
    }

    redirect("/association/list-association.php");
}

$pageTitle = 'Editer un conducteur';
include PHP_ROOT . "/views/association/association-view.php";