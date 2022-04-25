<?php

/** Liste des administrateur */

require 'models/bd_connexion.php';
$admin = $user->query('SELECT*FROM administrateur');
/** Lecture des donnees de la BD  */
$admin = $admin->fetchAll(PDO::FETCH_CLASS);
$i=1;
echo "<h3> Liste des gestionnaires </h3><br/>";
echo "<table border='0.5' width=\"98%\"><tr height=\"22px\" style=\"color:white;background-color: rgb(82, 82, 238);\" >
<th> N° </th> <th>matricule</th> <th> Nom et Prénoms </th><th> Contact  </th><th width=\"25%\"> Actions </th> </tr>";
  foreach($admin as $key => $valeur)
  {
    echo "<tr><td><center> ".$i. " </center></h4></td>";
    echo "<td><h4><center> ".$valeur->matricule ." </center></h4></td>";
    echo "<td><center> ".$valeur->nom ." ".$valeur->prenom ." </center></td>";
    echo "<td><center> ".$valeur->contact ." </center></td>";
    echo "<td><table width=\"100%\"> <tr><th><a href=\"#ancre_ajouter \"  style=\"background: none; color: black;\" > Ajouter </a></th>
    <th><a href=\"controllers/Con_admin/update.php?id=$valeur->id_admin \" style=\"background: none; color: black;\" > Modifier </a></th>
    <th><a href=\"controllers/Con_admin/delAdmin.php?matricule= $valeur->matricule \"  style=\"background: none; color: black;\"> Supprimer </a></th></tr></table></td>";
    $i++;
    
  }
  echo "</tr></table>";
