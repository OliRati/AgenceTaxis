<?php
require '../includes.php';

$idAssociation = $_GET['id'] ?? null;

if (!is_numeric($idAssociation)) {
    dd("Cette association n'existe pas !!!");
}

$conducteurs = listerConducteurs($pdo);
$vehicules = listerVehicules($pdo);

$association = getAssociation($pdo, $idAssociation);

$idVehicule = $association['id_vehicule'];
$idConducteur = $association['id_conducteur'];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        // traitement du formulaire d'edition d'une association Vehicule - Conducteur

        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('Token CSRF invalide');
        }

        $idConducteur = nettoyer($_POST['conducteur']);
        $idVehicule = nettoyer($_POST['vehicule']);

        $result = updateAssociation($pdo, $idAssociation, $idConducteur, $idVehicule);
        if ($result) {
            redirect("/association/list-association.php");
        }

        $errors[] = "Impossible de modifier ce conducteur";
    }
}

$pageTitle = 'Editer un conducteur';
include PHP_ROOT . "/views/association/association-view.php";
