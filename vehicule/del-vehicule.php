<?php
require '../includes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {

    // Traitement du formulaire de Suppression d'un vehicule

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $idVehicule = $_POST['id_vehicule'];

    if (!is_numeric($idVehicule)) {
        dd("Ce vehicule n'existe pas !!!");
    }

    $status = supprimerVehicule($pdo, $idVehicule);

    if ($status) {
        redirect("/vehicule/list-vehicule.php");
    }
}

die('Access denied');

