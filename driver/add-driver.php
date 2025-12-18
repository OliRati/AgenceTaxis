<?php
include '../fonctions.php';
require '../connexiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire d'ajout d'un vehicule

    $nom = nettoyer($_POST['nom']);
    $prenom = nettoyer($_POST['prenom']);

    $state = ajoutConducteur($pdo, $nom, $prenom );

    if ($state) {
        redirect("/driver/list-driver.php");
    }
}

include PATH_PROJECT . "/views/driver/add-driver-view.php";
?>
