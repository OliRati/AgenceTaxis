<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

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

include PHP_ROOT . "/views/association/add-association-view.php";
?>