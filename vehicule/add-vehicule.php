<?php
require '../includes.php';

$idVehicule = "";
$marque = "";
$modele = "";
$couleur = "";
$immatriculation = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire d'ajout d'un vehicule

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $marque = nettoyer($_POST['marque']);
    $modele = nettoyer($_POST['modele']);
    $couleur = nettoyer($_POST['couleur']);
    $immatriculation = nettoyer($_POST['immatriculation']);

    $state = ajoutVehicule($pdo, $marque, $modele, $couleur, $immatriculation );

    if ($state) {
        redirect("/vehicule/list-vehicule.php");
    }
}

$pageTitle = "Ajouter un vehicule";
include PHP_ROOT . "/views/vehicule/vehicule-view.php";
