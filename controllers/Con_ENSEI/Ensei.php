<?php

/** Class de gestion des gestionnaire */
class ConEnsei
{

  // Liste des Annonce en fonction de la localite de l'enseignant

  public function listeAnnonce()
  {
    /** Liste des administrateur */
    require 'models/Mod_Ensei/Mod_Ensei.php';
    $liste_annonce = listeavis();

    return $liste_annonce;
  }


  //liste des iep en fonction de la dren
  public function listeiep()
  {

    require '../../models/Mod_IEP/bd_IEP.php';
    $liste = listeIEPUnique();

    if ($liste == true) {
      $i = 1;

      echo "<table width=\50%\" style=\"font-size:12px;\" ><tr height=\"60px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th>Nom</th> <th> E-Mail </th> <th> Contacts </th> <th> DREN </th> </tr>";
      foreach ($liste as $key => $valeur) {
        echo "<tr height=\"30px\" style=\"background-color:#e1e1e1;font-size:12px;\"><td><center> " . $i . " </center></td>";
        echo "<td><h5><center> " . $valeur->nom_iep . " </center></h5></td>";
        echo "<td><center> " . $valeur->mail_iep . " </center></td>";
        echo "<td><center> " . $valeur->contact_iep . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    }
  }


  // Recherche de la recherche d'un intituteur
  public function liste_ensei_All()
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_Ensei/Mod_ENSEI.php';
    $seach = liste_institu();

    /** Lecture des donnees de la BD  */
    $i = 1;
    echo "<h2 style=\"text-align:center\">Liste de tout les enseignants </h2>";
    echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Matricule </th> <th> Nom et prénoms </th><th> E-Mails </th> <th> Contacts </th><th> IEP </th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
    foreach ($seach as $key => $valeur) {
      echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
      echo "<td><center> " . $valeur->matricule . " </center></td>";
      echo "<td><center> " . $valeur->nom_perso . " " . $valeur->prenoms . "</center></td>";
      echo "<td><center> " . $valeur->mail . " </center></td>";
      echo "<td><center> " . $valeur->telephone . " </center></td>";
      echo "<td><center> " . $valeur->nom_iep . " </center></td>";
      echo "<td><center> " . $valeur->nom_dren . " </center></td>";
      echo "<td><center> " . $valeur->nom_localite . " </center></td>";
      echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
      $i++;
    }
    echo "</tr></table>";
  }


  // Recherche
  public function seachEcole(string $nom, string $choix)
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_admin/bd_admin.php';
    $seach = seachEcole($nom);

    if ($seach == true) {
      /** Lecture des donnees de la BD  */
      $i = 1;
      echo "<table width=\"98%\" style=\"font-size:14px;\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Noms </th> <th> Type </th><th> E-Mails </th> <th> Contacts </th><th>Nom Localite</th> <th> Chef lieux </th> </tr>";
      foreach ($liste as $key => $valeur) {
        echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><h5><center> " . $valeur->nom_ecole . " </center></h5></td>";
        echo "<td><center> " . $valeur->Type_ecole . " </center></td>";
        echo "<td><center> " . $valeur->mail_ecole . " </center></td>";
        echo "<td><center> " . $valeur->contact_ecole . " </center></td>";
        echo "<td><center> " . $valeur->nom_iep . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    } else {
      echo "<div style=\"background-color:red;color:white\"> Le nom n'a pas été trouver veuillez chosir une autre référence </div>";
    }
  }
}

$ConEnsei = new ConEnsei();
