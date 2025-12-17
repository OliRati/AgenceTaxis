<?php
include '../fonctions.php';
require '../connexiondb.php';

$idVehicule = $_GET['id'] ?? null;

if (!is_numeric($idVehicule)) {
    dd("Ce vehicule n'existe pas !!!");
}

$car = getVehicule($pdo, $idVehicule);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        // traitement du formulaire d'ajout d'un vehicule

        $marque = nettoyer($_POST['marque']);
        $modele = nettoyer($_POST['modele']);
        $couleur = nettoyer($_POST['couleur']);
        $immatriculation = nettoyer($_POST['immatriculation']);

        $sql = "UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id_vehicule = :id_vehicule ;";
        $stm = $pdo->prepare($sql);
        $result = $stm->execute([
            ':id_vehicule' => $idVehicule,
            ':marque' => $marque,
            ':modele' => $modele,
            ':couleur' => $couleur,
            ':immatriculation' => $immatriculation
        ]);
    }

    header("Location: " . WEB_ROOT . "/vehicule/list-vehicule.php");
}

include PATH_PROJECT . "/views/vehicule/vehicule-view.php";