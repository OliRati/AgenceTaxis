<?php
require '../includes.php';

$associationArray = listerAssociations($pdo);

include PHP_ROOT . "/views/association/list-association-view.php";
?>
