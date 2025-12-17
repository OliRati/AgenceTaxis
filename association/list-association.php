<?php
include '../fonctions.php';
require '../connexiondb.php';

$associationArray = listerAssociations($pdo);

include PATH_PROJECT . "/views/association/list-association-view.php";
?>
