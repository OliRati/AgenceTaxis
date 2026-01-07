<?php
require '../includes.php';

$idConducteur = "";
$nom = "";
$prenom = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // Validation du formulaire d'ajout d'un conducteur

    // CSRF verification
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
        $state = ajoutConducteur($pdo, $nom, $prenom);

        if ($state) {
            redirect("/driver/list-driver.php");
        }

        $errors[] = "Impossible d'ajouter ce conducteur";
    }
}

$pageTitle = "Ajouter un conducteur";
include PHP_ROOT . "/views/driver/driver-view.php";
