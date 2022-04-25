<?php

$matricule = $_POST['matricule'];
$campagne= $_POST['campagne'];

/** Appel de la class qui va générer le code d'ajout d'un admin */
require 'ConAdmin.php';
$ConAdmin->seachUser($matricule,$campagne);
