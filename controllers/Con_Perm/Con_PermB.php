<?php

class Con_PermB
{
     // Listes deS dossiers non traiter
     public function PermBiepNT()
     {
        include_once 'models/Mod_Perm/Mod_PermB.php';
         $liste = PermBiepNT();

          return $liste;
     }
 
 
     // Listes deS dossiers non traiter
     
     // Listes deS dossiers non traiter
     public function PermBiepT()
     {
      include_once 'models/Mod_Perm/Mod_PermB.php';
         $listeTraiter = PermBiepT();

         return $listeTraiter;
     }
 
     // Listes deS dossiers non traiter
     public function PermBdrenNT()
     {
        include_once 'models/Mod_Perm/Mod_PermB.php';
         $liste = PermBdrenNT();

         return $liste;
     }
 
 
     // Listes deS dossiers non traiter
     public function PermBdrenT()
     {
         require_once 'models/Mod_Perm/Mod_PermB.php';
         $PermBdrenT = PermBdrenT();

        return $PermBdrenT;
     }
 
     public function traiter_PermB_iep(string $code, string $traite)
     {
   
     //Appel du fichier qui contient la fonctions de recupperations de statut
       include_once '../../models/Mod_Perm/recup_last_statut.php';
       $statut = recup_last_statut();
   
       $debut = $statut[0];
       $fin = $statut[1];
       //verifie la disponibilité
         $date = Date('Y-m-d');
         if ($debut <= $date && $date <= $fin) {
   
           require_once '../../models/Mod_Perm/Mod_PermB.php';
           $modif = traiteBiep($code, $traite);
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
  public function traiter_PermB_dren(string $code, string $traite)
  {

  //Appel du fichier qui contient la fonctions de recupperations de statut
    include_once '../../models/Mod_Perm/recup_last_statut.php';
    $statut = recup_last_statut();

    $debut = $statut[2];
    $fin = $statut[3];
    //verifie la disponibilité
      $date = Date('Y-m-d');
      if ($debut <= $date && $date <= $fin) {

        require_once '../../models/Mod_Perm/Mod_PermB.php';
        $modif = traite_dren($code, $traite);
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

$Con_PermB = new Con_PermB();