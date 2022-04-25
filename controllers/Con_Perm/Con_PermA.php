<?php
session_start();

class Con_PermA
{
  // Listes deS dossiers non traiter
  public function PermAiepNT()
  {
    include_once 'models/Mod_Perm/Mod_PermA.php';
    $liste = PermAiepNT();

    return $liste;
  }


  // Listes deS dossiers non traiter
  public function PermAiepT()
  {
    include_once 'models/Mod_Perm/Mod_PermA.php';
    $traiter = PermAiepT();

    return $traiter;
  }


  // Listes deS dossiers non traiter
  public function PermAdrenNT()
  {
    include_once 'models/Mod_Perm/Mod_PermA.php';
    $liste = PermAdrenNT();

    return $liste;
  }


  // Listes deS dossiers non traiter
  public function PermAdrenT()
  {
    require_once 'models/Mod_Perm/Mod_PermA.php';
    $listeB = PermAdrenT();

    return $listeB;
  }

  //traitement du dossier par l'iepA
  public function traiter_PermA_iep(string $code, string $traite)
  {

  //Appel du fichier qui contient la fonctions de recupperations de statut
    include_once '../../models/Mod_Perm/recup_last_statut.php';
    $statut = recup_last_statut();

    $debut = $statut[0];
    $fin = $statut[1];
    //verifie la disponibilité
      $date = Date('Y-m-d');
      if ($debut <= $date && $date <= $fin) {

        require_once '../../models/Mod_Perm/Mod_PermA.php';
        $modif = traiteIEP($code, $traite);
        if ($modif == true) {
          echo "<script type=\"text/javascript\">";
          echo " alert('Traitement effectuer ');";
          echo "window.location = '../../index.php?page=permuteIEP';";
          echo "</script>";
        } else {
          // Appel d'une requete d"annulations des insertions
          echo "<script type=\"text/javascript\">";
          echo " alert('ERREUR, veuillez vous deconnecter et vous réconnecter');";
          echo "window.history.back();";
          echo "</script>";
        }
      }
     else {
      echo "<script type=\"text/javascript\">";
      echo " alert('ERREUR, La date de traitement du dossier est passer');";
      echo "window.history.back();";
      echo "</script>";
      exit;
    }
  }

  
  //traitement du dossier par l'drenA
  public function traiter_PermA_dren(string $code, string $traite)
  {

  //Appel du fichier qui contient la fonctions de recupperations de statut
    include_once '../../models/Mod_Perm/recup_last_statut.php';
    $statut = recup_last_statut();

    $debut = $statut[2];
    $fin = $statut[3];
    //verifie la disponibilité
      $date = Date('Y-m-d');
      if ($debut <= $date && $date <= $fin) {

        require_once '../../models/Mod_Perm/Mod_PermA.php';
        $modif = traiteDREN($code, $traite);
        if ($modif == true) {
          echo "<script type=\"text/javascript\">";
          echo " alert('Traitement effectuer ');";
          echo "window.location = '../../index.php?page=permuteDREN';";
          echo "</script>";
        } else {
          // Appel d'une requete d"annulations des insertions
          echo "<script type=\"text/javascript\">";
          echo " alert('ERREUR, veuillez vous deconnecter et vous réconnecter');";
          echo "window.history.back();";
          echo "</script>";
        }
      }
     else {
      echo "<script type=\"text/javascript\">";
      echo " alert('ERREUR, La date de traitement du dossier est passer');";
      echo "window.history.back();";
      echo "</script>";
      exit;
    }
  }
}

$Con_PermA = new Con_PermA();
