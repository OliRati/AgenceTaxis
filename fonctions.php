<?php
define("PATH_PROJECT", $_SERVER['DOCUMENT_ROOT'] . "\devweb-php\AgenceTaxis");
define("WEB_ROOT", "\devweb-php\AgenceTaxis");

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
function getVehicule($pdo, $id)
{
    $sql = "SELECT * FROM vehicule WHERE id_vehicule = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $vehicule = $stmt->fetch();

    return $vehicule;
}

function addVehicule($pdo, $marque, $modele, $couleur, $immatriculation)
{
    $sql = "INSERT INTO vehicule (marque,modele,couleur,immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
    $stm = $pdo->prepare($sql);
    $state = $stm->execute([
        ':marque' => $marque,
        ':modele' => $modele,
        ':couleur' => $couleur,
        ':immatriculation' => $immatriculation
    ]);

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

function supprimerVehicule($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM vehicule where id_vehicule = :id");
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
?>