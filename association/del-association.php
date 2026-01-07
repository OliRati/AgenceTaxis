<?php
require '../includes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {

    // Traitement du formulaire de Suppression d'un vehicule

    // CSRF verification
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $idAssociation = $_POST['id_association'];

    if (!is_numeric($idAssociation)) {
        dd("Ce vehicule n'existe pas !!!");
    }

    $status = supprimerAssociation($pdo, $idAssociation);

    if ($status) {
        redirect("/association/list-association.php");
    }
}

die('Access denied');
