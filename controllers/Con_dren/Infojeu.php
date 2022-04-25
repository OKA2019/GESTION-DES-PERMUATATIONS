<?php

require '../../models/bd_connexion.php';

$statut = $_POST['statut'];
$annee = $_POST['campagne'];
$debut = $_POST['debut'];
$fin = $_POST['fin'];
$camp =  $_POST['fin'];
$camp = explode('-',$camp);


$id_pro = $user->query('SELECT id_statut FROM statut ');
$id = $id_pro->fetchAll(PDO::FETCH_OBJ);
$i = count($id);
$i++;
$resultat = $user->prepare('INSERT INTO statut VALUES (:id_statut, :statut, :debut, :fin) ');
$resultat = $resultat->execute(
  ['id_statut'=> $i,
  'statut' => $statut,
  'debut' => $debut,
  'fin' => $fin]);

$campagne = $user->prepare('INSERT INTO campagne VALUES (:id_campagne, :campagne, :id_pro)');
$campagne = $campagne->execute(
  ['id_campagne'=>$i,
   'campagne'=> $camp[0],
    'id_pro'=>$i]);

if($resultat == true && $campagne == true) 
{
  echo "<script type=\"text/javascript\">";
  echo " alert('La mise à jour a été effectuer avec succès !');";
  echo "</script>";
  
  header('location: ../../index.php?page=gestion');
}
else
{
  echo "<script type=\"text/javascript\">";
  echo " alert('Veillez revoir vos données saisies !');";
  echo "window.history.back();";
  echo "</script>";
}
?>