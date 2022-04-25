<?php

require_once 'models/bd_connexion.php';

//Appel du fichier bd_gagant afin d"acceder à la function qui renvoie l'annee de la campagne
require_once 'models/Mod_jeu/bd_gagnant.php';
$annee = campagne();

// requête de selection des joueurs
$joueur = "SELECT DISTINCT pronostic.matricule,utilisateur.nom, utilisateur.prenom,utilisateur.site,utilisateur.adresse,
pronostic.ton_canne, pronostic.ton_sucre, pronostic.date
FROM 
pronostic, utilisateur, campagne
WHERE utilisateur.matricule = pronostic.matricule AND pronostic.campagne='$annee'
ORDER BY date";

$users = $user->query($joueur);


/** AFFICHAGE DE LA LISTES DES JPOUEURS */
if($users == true) 
{
  /** Lecture des donnees de la BD  */
  $users = $users->fetchAll(PDO::FETCH_CLASS);
  $i=1;
  echo "<p>
    <h3 style=\"text-align:center;\">Pronostisque des differents participants </h3>
    <br/>
    </p>";
  echo "<table border='1px solid' width=\"98%\" style=\"margin-left:1%;margin-rigth:1%;\"><tr style=\"color:white;background-color: rgb(82, 82, 238);\" >
  <th> N° </th> <th>matricule</th> <th> Nom et Prénoms </th> <th> Site </th> <th> Contact </th> <th> Tonnage canne </th><th> Tonnage sucre </th><th > Date </th> </tr>";
    foreach($users as $key => $valeur)
    {
      echo "<tr><td><center> ".$i. " </center></td>";
      echo "<td><h4><center> ".$valeur->matricule ." </center></h4></td>";
      echo "<td><center> ".$valeur->nom. " " .$valeur->prenom." </center></td>";
      echo "<td><center> ".$valeur->site ." </center></td>";
      echo "<td><center> ".$valeur->adresse ." </center></td>";
      echo "<td><center> ".$valeur->ton_canne ." </center></td>";
      echo "<td><center> ".$valeur->ton_sucre ." </center></td>";
      echo "<td><center> ".$valeur->date ." </center></td>";
      $i++;
    }
    echo "</tr></table>";
}
