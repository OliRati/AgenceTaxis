<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

if (isset($_GET['car'])) {
    $tmp_idVehicule = nettoyer($_GET['car']);
    if (is_numeric($tmp_idVehicule))
        $idVehicule = intval($tmp_idVehicule, 10);
}

if (isset($_GET['driver'])) {
    $tmp_idConducteur = nettoyer($_GET['driver']);
    if (is_numeric($tmp_idConducteur))
        $idConducteur = intval($tmp_idConducteur, 10);
}

$conducteurs = listerConducteurs($pdo);
$vehicules = listerVehicules($pdo);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire d'edition d'une association Vehicule - Conducteur

    if (isset($_POST['conducteur']))
        $idConducteur = nettoyer($_POST['conducteur']);

    if (isset($_POST['vehicule']))
        $idVehicule = nettoyer($_POST['vehicule']);

    if (isset($idConducteur) && isset($idVehicule)) {
        $state = ajoutAssociation($pdo, $idConducteur, $idVehicule);

        if ($state) {
            redirect("/association/list-association.php");
        }

        $errors[] = "Impossible d'enregistrer l'opération";
    }

    $errors[] = "Vous devez sélectionner un conducteur et un vehicule";
}

$pageTitle = 'Ajouter une affectation Chauffeur - Vehicule';
include PHP_ROOT . "/views/association/association-view.php";
