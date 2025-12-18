<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("PATH_PROJECT", $_SERVER['DOCUMENT_ROOT'] . "\devweb-php\AgenceTaxis");
define("WEB_ROOT", "/devweb-php/AgenceTaxis");

function dg($data)
{
    echo '<pre style="background-color: black; color: white; padding: 1rem; margin: 1rem 0">';
    var_dump($data);
    echo "</pre>";
}

function dd($data)
{
    dg($data);
    die();
}

function listerVehicules($pdo)
{
    $sql = "SELECT * FROM vehicule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $vehicules = $stmt->fetchAll();

    return $vehicules;
}

function listerConducteurs($pdo)
{
    $sql = "SELECT * FROM conducteur";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $conducteurs = $stmt->fetchAll();

    return $conducteurs;
}

function listerAssociations($pdo)
{
    $sql = "SELECT a.id_association, c.id_conducteur, c.nom, c.prenom, v.id_vehicule, v.marque, v.modele, v.couleur FROM conducteur c
            JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur
            JOIN vehicule v ON a.id_vehicule = v.id_vehicule
            ORDER BY a.id_association";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $conducteurs = $stmt->fetchAll();

    return $conducteurs;
}

function getVehicule($pdo, $id)
{
    $sql = "SELECT * FROM vehicule WHERE id_vehicule = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $vehicule = $stmt->fetch();

    return $vehicule;
}

function getConducteur($pdo, $id)
{
    $sql = "SELECT * FROM conducteur WHERE id_conducteur = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $conducteur = $stmt->fetch();

    return $conducteur;
}

function getLastInsertId($pdo)
{
    $sql = "SELECT LAST_INSERT_ID()";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $last_insert_id = $stmt->fetch();
    return $last_insert_id;
}

function ajoutVehicule($pdo, $marque, $modele, $couleur, $immatriculation)
{
    $sql = "INSERT INTO vehicule (marque,modele,couleur,immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
    $stm = $pdo->prepare($sql);
    $state = $stm->execute([
        ':marque' => $marque,
        ':modele' => $modele,
        ':couleur' => $couleur,
        ':immatriculation' => $immatriculation
    ]);

    $lastid = getLastInsertId($pdo);

    return $state;
}

function ajoutConducteur($pdo, $nom, $prenom)
{
    $sql = "INSERT INTO conducteur (nom,prenom) VALUES (:nom, :prenom)";
    $stm = $pdo->prepare($sql);
    $state = $stm->execute([
        ':nom' => $nom,
        ':prenom' => $prenom
    ]);

    $lastid = getLastInsertId($pdo);

    return $state;
}

function updateVehicule($pdo, $idVehicule, $marque, $modele, $couleur, $immatriculation)
{
    $sql = "UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id_vehicule = :id_vehicule ;";
    $stm = $pdo->prepare($sql);
    $result = $stm->execute([
        ':id_vehicule' => $idVehicule,
        ':marque' => $marque,
        ':modele' => $modele,
        ':couleur' => $couleur,
        ':immatriculation' => $immatriculation
    ]);

    return $result;
}

function updateConducteur($pdo, $idConducteur, $nom, $prenom)
{
    $sql = "UPDATE conducteur SET nom = :nom, prenom = :prenom WHERE id_conducteur = :id_conducteur ;";
    $stm = $pdo->prepare($sql);

    $result = $stm->execute([
        ':id_conducteur' => $idConducteur,
        ':nom' => $nom,
        ':prenom' => $prenom
    ]);

    return $result;
}

function supprimerVehicule($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM vehicule where id_vehicule = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stm->execute();
    return $suppResult;
}

function supprimerConducteur($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM conducteur where id_conducteur = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stm->execute();
    return $suppResult;
}

function supprimerAssociation($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM association_vehicule_conducteur where id_association = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stm->execute();
    return $suppResult;
}

function nettoyer($dataParam)
{
    $data = trim($dataParam);
    $date = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function getNbLigneTable($pdo, $table)
{
    $sql = "SELECT COUNT(*) as nb FROM " . $table;
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetch();
        $nbLignes = $value['nb'];
    } else
        $nbLignes = 0;

    return $nbLignes;
}

function getUnusedVehicule($pdo)
{
    $sql = "SELECT COUNT(*) as nb
            FROM vehicule v
            LEFT JOIN association_vehicule_conducteur a
            ON v.id_vehicule = a.id_vehicule
            WHERE id_conducteur IS NULL";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetch();
        $nbLignes = $value['nb'];
    } else
        $nbLignes = 0;

    return $nbLignes;
}

function getUnusedConducteur($pdo)
{
    $sql = "SELECT COUNT(*) as nb
            FROM conducteur c
            LEFT JOIN association_vehicule_conducteur a
            ON c.id_conducteur = a.id_conducteur
            WHERE id_vehicule IS NULL";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetch();
        $nbLignes = $value['nb'];
    } else
        $nbLignes = 0;

    return $nbLignes;
}

?>