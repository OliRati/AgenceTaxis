<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$idConducteur = $_GET['id'] ?? null;

if (!is_numeric($idConducteur)) {
    dd("Ce conducteur n'existe pas !!!");
}

$driver = getConducteur($pdo, $idConducteur);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        // traitement du formulaire d'ajout d'un vehicule

        $nom = nettoyer($_POST['nom']);
        $prenom = nettoyer($_POST['prenom']);

        updateConducteur($pdo, $idConducteur, $nom, $prenom);
    }

    redirect("/driver/list-driver.php");
}

$nom = $driver['nom'];
$prenom = $driver['prenom'];

$pageTitle = "Modifier un conducteur";
include PHP_ROOT . "/views/driver/driver-view.php";