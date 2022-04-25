<?php

/** Class de gestion des gestionnaire */
class ConDren
{
  // Listes des dren

  public function listedren()
  {
    /** Liste des administrateur */
    include_once '../../models/Mod_DREN/bd_DREN.php';
    $liste = listeDREN();

    /** AFFICHAGE DE LA LISTES DES dren */
    if ($liste == true) {
      /** Lecture des donnees de la BD  */
      $i = 1;

      echo "<table width=\"100%\" style=\"font-size:14px;\" ><tr height=\"60px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th>Nom</th> <th> E-Mail </th> <th style=\"padding-left:10px;padding-right:10px;\"> Contacts </th><th>Nom localite </th> <th> Chef lieux </th>
          <th> Noms responsable </th><th>E-Mail responsable </th> <th> Contact responsable </th></tr>";
      foreach ($liste as $key => $valeur) {
        echo "<tr height=\"50px\" style=\"background-color:#e1e1e1;font-size:13px;\"><td><center> " . $i . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
        echo "<td><center> " . $valeur->mail_dren . " </center></td>";
        echo "<td style=\"padding-left:10px;padding-right:10px;\"><center> " . $valeur->contact_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        echo "<td><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
        echo "<td><center> " . $valeur->mail . " </center></td>";
        echo "<td><center> " . $valeur->tel . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    }
  }


  // Listes de tout les IEP
  public function listeIEPUnique()
  {
    /** Liste des administrateur */
    include_once 'models/Mod_DREN/bd_DREN.php';
    $liste = listeIEP_dren();

    /** AFFICHAGE DE LA LISTES DES JOUEURS */
    if (!empty($liste)) {
      /** Lecture des donnees de la BD  */
      $i = 1;
      echo " <h3> Liste des vos inspections </h3><br> ";
      echo "<table width=\"98%\" style=\"border-raduis:20px;\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th>Nom</th> <th> E-Mail </th> <th> Contacts </th><th> Nom localité </th> <th> Chefs lieux </th></tr>";
      foreach ($liste as $key => $valeur) {
        echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><h5><center> " . $valeur->nom_iep . " </center></h5></td>";
        echo "<td><center> " . $valeur->mail_iep . " </center></td>";
        echo "<td><center> " . $valeur->contact_iep . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    }
  }

  //liste detailler de tout les dren
  public function drenAll()
  {
    /** Liste des administrateur */
    include_once '../../models/Mod_DREN/bd_DREN.php';
    $liste = listeDREN();

    /** AFFICHAGE DE LA LISTES DES dren */
    if ($liste == true) {
      /** Lecture des donnees de la BD  */
      $i = 1;

      echo "<table width=\"100%\" style=\"font-size:14px;\" ><tr height=\"60px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th>Identifiants </th> <th>Nom</th> <th> E-Mail </th> <th style=\"padding-left:10px;padding-right:10px;\"> Contacts </th><th>Nom localite </th> <th> Chef lieux </th>
          <th> Matricule responsable </th><th> Noms responsable </th><th>E-Mail responsable </th> <th> Contact responsable </th></tr>";
      foreach ($liste as $key => $valeur) {
        echo "<tr height=\"50px\" style=\"background-color:#e1e1e1;font-size:13px;\"><td><center> " . $i . " </center></td>";
        echo "<td><center> " . $valeur->Id_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
        echo "<td><center> " . $valeur->mail_dren . " </center></td>";
        echo "<td style=\"padding-left:10px;padding-right:10px;\"><center> " . $valeur->contact_dren . " </center></td>";
        echo "<td><center> " . $valeur->iden . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        echo "<td><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
        echo "<td><center> " . $valeur->mail . " </center></td>";
        echo "<td><center> " . $valeur->tel . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    }
  }

  // Recherche IEP
  public function seachDren(string $nom)
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_DREN/bd_DREN.php';
    $resul = seach_dren($nom);

    if ($resul == true) {
      /** Lecture des donnees de la BD  */
      $i = 1;
      echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
      echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
      foreach ($resul as $key => $valeur) {
        echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><h5><center> " . $valeur->nom_dren . " </center></h5></td>";
        echo "<td><center> " . $valeur->mail_dren . " </center></td>";
        echo "<td><center> " . $valeur->contact_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_drh . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
    } else {
      echo "<div style=\"background-color:red;color:white;font-size:20px; padding-top:20px;text-align:center;height:40px; opacity:0.6\"> 
          <i> Auccun resultat trouver ! </i>
          </div>";
    }
  }


  // tout les dren avec plus de details
  public function liste_dren_All()
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_DREN/bd_DREN.php';
    $resul = liste_dren_All();

      /** Lecture des donnees de la BD  */
      $i = 1;
      echo "<h2 style=\"text-align:center\">Liste de directions régionales </h2>";
      echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Identifiants </th> <th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
      foreach ($resul as $key => $valeur) {
        echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><center> " . $valeur->Id_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
        echo "<td><center> " . $valeur->mail_dren . " </center></td>";
        echo "<td><center> " . $valeur->contact_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_localite . " </center></td>";
        echo "<td><center> " . $valeur->Chef_Lieux . " </center></td>";
        $i++;
      }
      echo "</tr></table>";
  }
}

$ConDren = new ConDren();
