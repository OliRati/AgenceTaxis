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

function getVehicule($pdo, $id)
{
    $sql = "SELECT * FROM vehicule WHERE id_vehicule = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $vehicule = $stmt->fetch();

    return $vehicule;
}

function supprimerVehicule($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM vehicule where id_vehicule = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);
    $suppResult = $stm->execute();
    return $suppResult;
}

function nettoyer($dataParam) {
    $data = trim($dataParam);
    $date = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
?>