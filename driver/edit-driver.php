<?php
require '../includes.php';

$idConducteur = $_GET['id'] ?? null;

if (!is_numeric($idConducteur)) {
    dd("Ce conducteur n'existe pas !!!");
}

$driver = getConducteur($pdo, $idConducteur);

$nom = $driver['nom'];
$prenom = $driver['prenom'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation du formulaire d'edition d'un conducteur

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    if (isset($_POST['nom']))
        $nom = nettoyer($_POST['nom']);

    if (empty($nom))
        $errors[] = "Le nom est nécéssaire";

    if (isset($_POST['prenom']))
        $prenom = nettoyer($_POST['prenom']);
    
    if (empty($prenom))
        $errors[] = "Le prénom est nécéssaire";

    if (!empty($nom) && !empty($prenom)) {
        $state = updateConducteur($pdo, $idConducteur, $nom, $prenom);

        if ($state) {
            redirect("/driver/list-driver.php");
        }

        $errors[] = "Impossible de modifier ce conducteur";
    }
}

$pageTitle = "Modifier un conducteur";
include PHP_ROOT . "/views/driver/driver-view.php";
