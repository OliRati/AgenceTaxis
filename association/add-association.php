<?php
include '../fonctions.php';
require '../connexiondb.php';

$conducteurs = listerConducteurs($pdo);
$vehicules = listerVehicules($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire d'edition d'une association Vehicule - Conducteur

    $idConducteur = nettoyer($_POST['conducteur']);
    $idVehicule = nettoyer($_POST['vehicule']);

    $state = ajoutAssociation($pdo, $idConducteur, $idVehicule);

    if ($state) {
        header("Location: " . WEB_ROOT . "/association/list-association.php");
    }
}

include PATH_PROJECT . "/views/association/add-association-view.php";
?>