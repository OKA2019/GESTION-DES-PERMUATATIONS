<?php
require '../../models/bd_connexion.php';
try
{
$canne = $_POST['canne'];
$sucre = $_POST['sucre'];
$gagnant = $_POST['gagnant'];

$id_resultat = $user->query('SELECT id_resultat FROM resultat_pronostic');
$id = $id_resultat->fetchAll(PDO::FETCH_OBJ);
$i = count($id);
$i++;
$addjeu = $user->prepare('INSERT INTO `resultat_pronostic`(`id_resultat`, `final_canne`, `final_sucre`, `nb_gagnant`, `id_pro`) 
VALUES (:id_resultat, :canne, :sucre, :gagnant, :id_pro) ');
$addjeu = $addjeu->execute(
  ['id_resultat'=> $i,
  'canne' => $canne,
  'sucre' => $sucre,
  'gagnant' => $gagnant,
  'id_pro' =>$i]
);

echo "<script type=\"text/javascript\">";
echo " alert('Les données ont bien été enregistrés !');";
echo "</script>";

}
catch (Exception $exep)
{
  echo "<script type=\"text/javascript\">";
  echo " alert('Erreur, veillez revoir les données entrer !');";
  echo "window.history.back();";
  echo "</script>";
}
finally
{
  
  {
    header('location: ../../index.php?page=admin');
  }
}