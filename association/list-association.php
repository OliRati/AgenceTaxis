<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$associationArray = listerAssociations($pdo);

include PHP_ROOT . "/views/association/list-association-view.php";
?>
