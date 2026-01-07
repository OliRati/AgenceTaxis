<?php
require '../includes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {

    // Traitement du formulaire de Suppression d'un vehicule

    // CSRF verification
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $idConducteur = $_POST['id_conducteur'];

    if (!is_numeric($idConducteur)) {
        dd("Ce conducteur n'existe pas !!!");
    }

    $status = supprimerConducteur($pdo, $idConducteur);

    if ($status) {
        redirect("/driver/list-driver.php");
    }
}

die('Access denied');
