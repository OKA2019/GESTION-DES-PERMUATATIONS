<?php

/** recupère le matricule et renvoie le resultat correspondant */

class Con_Permut
{
    public function AddDemande(string $matricule, string $nom, string $prenoms, string $fonction, string $iep1, string $dren1, string $iepshou, string $drenshou)
    {
        require_once '../../models/bd_authen.php';
        foreach ($ensei as $utilisateur) {
            $nom_iep = false;
            $dejaD = false;
            $dejaF = false;
            if ($utilisateur->matricule == $matricule) {
                /** Verifie si le matricule correspond au nom et prenoms entrer */
                if ($utilisateur->matricule == $matricule && $utilisateur->nom == $nom && $utilisateur->prenoms == $prenoms) {
                    require_once('../../models/bd_authen.php');
                    //Parcours la liste des IEP et DREN
                    foreach ($iep as $iepD) {
                        require_once('../../models/bd_authen.php');
                        /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                        if ($iepD->nom_iep == $iep1) {
                            $nom_iep = true;
                        }
                    }
                    if ($nom_iep) {

                        // Faire appel a la requete qui executer la demande de permutation 
                        require '../../models/Mod_Perm/Mod_PERM.php';

                        //verifie la disponibilité
                        $statut = recupdonner();
                        $anne = $statut[1];
                        if ($statut[2] == 'Activer') {
                            $date = Date('Y-m-d');
                            if ($statut[3] <= $date && $date <= $statut[4]) {
                                require_once('../../models/bd_authen.php');
                                foreach ($dem as $dejaD) {
                                    /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                                    if ($dejaD->matricule == $matricule and $dejaD->annee == $anne) {
                                        $dejaD = true;
                                    } else {
                                        $dejaD = false;
                                    }
                                }

                                foreach ($fav as $deja) {
                                    require_once('../../models/bd_authen.php');
                                    /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                                    if ($deja->matricule == $matricule and $deja->annee == $anne) {
                                        $dejaF = true;
                                    } else {
                                        $dejaF = false;
                                    }
                                }
                                if ($dejaD == true or $dejaF == true) {
                                    echo "<script type=\"text/javascript\">";
                                    echo " alert('ERREUR, Vous etre déja impliquer dans une permuation au cours de cette année');";
                                    echo "window.history.back();";
                                    echo "</script>";
                                    exit;
                                } else {
                                    $id_stat = $statut[0];
                                    $add = demande($matricule, $nom, $prenoms, $fonction, $iep1, $dren1, $iepshou, $drenshou, $id_stat, $anne);

                                    // Faire appel a fonction qui renvoie le code déidentifications du dossiers 
                                    if ($add[1] == true) {
                                        echo "<script type=\"text/javascript\">";
                                        echo " alert('Votre avis de permutation a bien été prise en compte. Veuiller transmetre ce code à la personne favorable Code Dossier :  $add[0]');";
                                        echo "window.location = '../../index.php?page=permuteENSEI';";
                                        echo "</script>";
                                    } else {
                                        // Appel d'une requete d"annulations des insertions


                                        echo "<script type=\"text/javascript\">";
                                        echo " alert('ERREUR');";
                                        echo "window.history.back();";
                                        echo "</script>";
                                        exit;
                                    }
                                }
                            } else {
                                echo "<script type=\"text/javascript\">";
                                echo " alert('ERREUR, La permutation est indisponible pour le moment');";
                                echo "window.history.back();";
                                echo "</script>";
                                exit;
                            }
                        } else {
                            echo "<script type=\"text/javascript\">";
                            echo " alert('Désolé, il y\'a pas de permuations durant cette année');";
                            echo "window.history.back();";
                            echo "</script>";
                            exit;
                        }
                    } else {
                        echo "<script type=\"text/javascript\">";
                        echo " alert('ERREUR, Vos coordonnés administratifs sont introuvables');";
                        echo "window.history.back();";
                        echo "</script>";
                        exit;
                    }
                } else {
                    echo "<script type=\"text/javascript\">";
                    echo " alert('ERREUR, Ce matricule ne correspond pas au nom et prenoms');";
                    echo "window.history.back();";
                    echo "</script>";
                    exit;
                }
            }
        }
    }

    /** Control Favorable */

    public function AddFavorable(string $matricule, string $nom, string $prenoms, string $fonction, string $iep1, string $dren1, string $code, string $choix)
    {
        require_once '../../models/bd_authen.php';
        foreach ($ensei as $utilisateur) {
            $nom_iep = false;
            $dejaD = false;
            $dejaF = false;
            $priseF = false;
            if ($utilisateur->matricule == $matricule) {
                /** Verifie si le matricule correspond au nom et prenoms entrer */
                if ($utilisateur->matricule == $matricule && $utilisateur->nom == $nom && $utilisateur->prenoms == $prenoms) {
                    require_once('../../models/bd_authen.php');
                    //Parcours la liste des IEP et DREN
                    foreach ($iep as $iepD) {
                        require_once('../../models/bd_authen.php');
                        /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                        if ($iepD->nom_iep == $iep1) {
                            $resul = true;
                        }
                    }
                    if ($resul) {

                        // Faire appel a la requete qui executer la demande de permutation 
                        require '../../models/Mod_Perm/Mod_PERM.php';

                        //verifie la disponibilité
                        $statut = recupdonner();
                        $id_stat = $statut[0];
                        $anne = $statut[1];
                        if ($statut[2] == 'Activer') {
                            $date = Date('Y-m-d');
                            if ($statut[3] <= $date && $date <= $statut[4]) {
                                require_once('../../models/bd_authen.php');
                                foreach ($dem as $dejaD) {
                                    /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                                    if ($dejaD->matricule == $matricule and $dejaD->annee == $anne) {
                                        $dejaD = true;
                                    } else {
                                        $dejaD = false;
                                    }
                                }
                                foreach ($fav as $deja) {
                                    require_once('../../models/bd_authen.php');
                                    /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                                    if ($deja->matricule == $matricule and $deja->annee == $anne) {
                                        $dejaF = true;
                                    } else {
                                        $dejaF = false;
                                    }
                                }

                                if ($dejaD == true or $dejaF == true) {
                                    echo "<script type=\"text/javascript\">";
                                    echo " alert('ERREUR, Vous etre déja impliquer dans une permuation au cours de cette année');";
                                    echo "window.history.back();";
                                    echo "</script>";
                                    exit;
                                } else {
                                    //APPEL DE FONCTION DE RECUP DE FAV

                                    foreach ($pris as $perm) {
                                        require_once('../../models/bd_authen.php');
                                        /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
                                        if ($perm->id_dossier == $code) {
                                            $priseF = true;
                                        }
                                    }
                                    if ($priseF) {
                                        echo "<script type=\"text/javascript\">";
                                        echo " alert('ERREUR, Ce dossier a déjà été confirmer');";
                                        echo "window.history.back();";
                                        echo "</script>";
                                        exit;
                                    } else {
                                        // Faire appel a fonction qui renvoie le code déidentifications du dossiers 
                                        $fav = favorable($matricule, $nom, $prenoms, $fonction, $iep1, $dren1, $choix, $code, $id_stat, $anne);
                                        if ($fav == true) {
                                            echo "<script type=\"text/javascript\">";
                                            echo " alert('Votre avis de permutation a bien été prise en compte.Veuiller attends les résultats ');";
                                            echo "window.location = '../../index.php?page=permuteENSEI';";
                                            echo "</script>";
                                        } else {
                                            // Appel d'une requete d"annulations des insertions


                                            echo "<script type=\"text/javascript\">";
                                            echo " alert('ERREUR');";
                                            echo "window.history.back();";
                                            echo "</script>";
                                            exit;
                                        }
                                    }
                                }
                            } else {
                                echo "<script type=\"text/javascript\">";
                                echo " alert('ERREUR, La permutation est indisponible pour le moment');";
                                echo "window.history.back();";
                                echo "</script>";
                                exit;
                            }
                        } else {
                            echo "<script type=\"text/javascript\">";
                            echo " alert('Désolé, il y\'a pas de permuations durant cette année');";
                            echo "window.history.back();";
                            echo "</script>";
                            exit;
                        }
                    } else {
                        echo "<script type=\"text/javascript\">";
                        echo " alert('ERREUR, Vos coordonnés administratifs sont introuvables');";
                        echo "window.history.back();";
                        echo "</script>";
                        exit;
                    }
                } else {
                    echo "<script type=\"text/javascript\">";
                    echo " alert('ERREUR, Ce matricule ne correspond pas au nom et prenoms');";
                    echo "window.history.back();";
                    echo "</script>";
                    exit;
                }
            }
        }
    }


    //code du dossier 
    public function CodeDossier()
    {
        require_once 'models/Mod_Perm/Mod_PERM.php';
        $statut = recupdonner();
        $anne = $statut[1];
        $code = "";
        $recupcode = codedossier();

        $recupann = false;
        require_once('models/bd_authen.php');
        foreach ($dem as $dejaD) {
            /** Verifie si la personne existe les coordonnes administratives indiquer existe*/
            if ($dejaD->annee == $anne) {
                $recupann = true;
            }
        }

        if (!empty($recupcode[0])) {
            $code = $recupcode[0];
        } else {
            $recupann = true;
        }
        $tab = array($code, $recupann);
        return $tab;
    }

    public function recupdate()
    {
        require_once 'models/Mod_Perm/Mod_PERM.php';
        $date = recupdonner();
        return $date;
    }
    // Ajout de satut de la permuation
    public function Addstatut(string $anne, string $statut, string $debut_ensei, string $fin_ensei, string $debut_iep, string $fin_iep, string $debut_dren, string $fin_dren, string $debut_drh, string $fin_drh)
    {
        // Appel de la fonction qui permet d'ajouter un admin
        require '../../models/Mod_Perm/Mod_PERM.php';
        $add = Addstatut($anne, $statut, $debut_ensei, $fin_ensei, $debut_iep, $fin_iep, $debut_dren, $fin_dren, $debut_drh, $fin_drh);
        // etablir les condition d'ajouter d'un admin <?php
        if ($add == true) {
            echo "<script type=\"text/javascript\">";
            echo " alert('La mise a jour a été effectuer avec succès');";
            echo "location.assign('../../index.php?page=permute');";
            echo "</script>";
        } else {
            echo "<script type=\"text/javascript\">";
            echo " alert('ERREUR, Veuiller reverifier vos données');";
            echo "window.history.back();";
            echo "</script>";
            exit;
        }
    }


    // Dossier non traiter par la drh
    public function PermdrhNT()
    {
        include_once 'models/Mod_Perm/Mod_Perm.php';
        $PermdrhNT  = PermdrhNT();

        return $PermdrhNT;
    }


    // Dossier traiter par la drh
    public function PermdrhT()
    {
        include_once 'models/Mod_Perm/Mod_Perm.php';
        $trait_drh = PermdrhT();

        return $trait_drh;
    }

    
  //traitement du dossier par l'drh
  public function traiter_Perm_drh(string $code, string $traite)
  {

  //Appel du fichier qui contient la fonctions de recupperations de statut
    include_once '../../models/Mod_Perm/recup_last_statut.php';
    $statut = recup_last_statut();

    $debut = $statut[4];
    $fin = $statut[5];
    //verifie la disponibilité
      $date = Date('Y-m-d');
      if ($debut <= $date && $date <= $fin) {

        require_once '../../models/Mod_Perm/Mod_PERM.php';
        $modif = traite_drh($code, $traite);
        if ($modif == true) {
          echo "<script type=\"text/javascript\">";
          echo " alert('Traitement effectuer ');";
          echo "window.location = '../../index.php?page=permutedrh';";
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

  
    // personne retenue pour la permutations
    public function perso_retenue()
    {
        
  //Appel du fichier qui contient la fonctions de recupperations de statut
    include_once 'models/Mod_Perm/recup_last_statut.php';
    $statut = recup_last_statut();
    $an = $statut[6];
    $fin = $statut[5];
    //verifie la disponibilité
      $date = Date('Y-m-d');
      if ($fin <= $date) {
        include_once 'models/Mod_Perm/Mod_Perm.php';
        $permut_retenue = permut_retenue($an, $fin);

      }
      else
      {
          $permut_retenue = "";
      }

        return $permut_retenue;
    }


}
$Con_Permut = new Con_Permut();
