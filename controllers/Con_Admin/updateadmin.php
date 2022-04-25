<?php
/** Modifier les informations de l'administateur */
require '../../models/bd_connexion.php';

if ( isset($_POST['modifier']) )
{

  $id = $_GET['id'];
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenoms'];
  $adresse = $_POST['adresse'];
  $mail = $_POST['mail'];
  $tel = $_POST['tel'];


  // Appel de la fonction qui permet d'envoyer les resultats

  include_once 'ConAdmin.php';
  $ConAdmin->ModifAdmin($id,$matricule, $nom, $prenom, $adresse, $mail, $tel);
}

?>