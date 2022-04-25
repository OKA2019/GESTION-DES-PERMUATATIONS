<?php

/** Class de gestion des gestionnaire */
class ConAdmin
{


  public function AddAdmin (string $matricule, string $nom, string $prenom , string $adresse, string $mail,float $tel)
  {
      // Appel de la fonction qui permet d'ajouter un admin
      require '../../models/Mod_admin/bd_admin.php';
      $liste = listeadmin();

      $add = true;
      foreach($liste as $valeur)
      {
        if($valeur->matricule == $matricule)
        {
          $add = false;
        }
      }

      // etablir les condition d'ajouter d'un admin <?php
      if($add == true)
      {
        $add = addadmin($matricule, $nom, $prenom, $adresse, $mail, $tel);
          echo "<script type=\"text/javascript\">";
          echo " alert('La personne a été ajouter en tand qu\'un administrateur');";
          echo "location.assign('../../index.php?page=admin');";
          echo "</script>";
          
      }
      else
      {
          echo "<script type=\"text/javascript\">";
          echo " alert('ERREUR, Le matricule existe déjà !');";
          echo "window.history.back();";
          echo "</script>";
      }

  }
    
    //suppesion d'un gestionnaire
    public function del_admin(string $matricule_connect, string $matricule)
    {
      /** Appel de function de suppression d'un gestionnaire */
        require '../../models/Mod_admin/bd_admin.php';
        $longAdmin = longAdmin();

        if ( $longAdmin > 1)
        {
            $del = strcmp($matricule_connect, $matricule);

            if(($matricule_connect == $matricule) ||  ($del == 0 ))
            {
                  // appèl de la fonction de supression
                    $effacer = deladmin();

                    /** Message a l'utilisateur */
                    if($effacer)
                    {
                    echo "<script type=\"text/javascript\">";
                    echo " alert('L\'administrateur immatricule $matricule a été supprimer avec succès !');";
                    echo "</script>";
                    header('location: ../../index.php');
                    }
            }
            else
            {
                echo "<script type=\"text/javascript\">";
                echo " alert(' Erreur, vous ne pouvez pas effacer un autre administrateur. Mais vous pouviez vous retirer ! ');";
                echo "window.history.back();";
                echo "</script>";
            }
        }
        else
        {
          echo "<script type=\"text/javascript\">";
          echo " alert(' Erreur, il faut au moins un administrateur !');";
          echo "window.history.back();";
          echo "</script>";
        }
    }


    public function ModifAdmin(string $id, string $matricule, string $nom, string $prenom, string $adresse, string $mail, string $tel)
    {
      require '../../models/Mod_admin/bd_admin.php';
      $resultat = modifier($id,$matricule, $nom, $prenom, $adresse, $mail, $tel);

        if($resultat == true)
        {
            echo "<script type=\"text/javascript\">";
            echo " alert('La mise à jour a été effectuer avec succès !');";
            echo "location.assign('../../index.php?page=admin');";
            echo "</script>";
            
        }
        else
        {
            echo "<script type=\"text/javascript\">";
            echo " alert('ERREUR, le matricule existe déjà ou vous n\'aviez rien modifier !');";
            echo "window.history.back();";
            echo "</script>";
        }
    }

    // Liste des administrateurs

    public function listeadministateur()
    {
        /** Liste des administrateur */
      require 'models/Mod_admin/bd_admin.php';
      $liste = listeadmin();
        
      return $liste;
    }

    public function listeadmin()
    {
        /** Liste des administrateur */
      require '../../models/Mod_admin/bd_admin.php';
      $liste = listeadmin();
        
      return $liste;
    }


    //gestions de statut
    public function  last_statut()
    {
      require_once 'models/Mod_Perm/recup_last_statut.php';
      $recup_last_statut = recup_last_statut();

      return $recup_last_statut;
    }

    
    // Recherche de la recherche d'un intituteur
    public function seachEnsei_admin(string $nom)
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models/Mod_Ensei/Mod_ENSEI.php';
      $seach = seachEnsei($nom);

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
          echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Matricule </th> <th> Nom et prénoms </th><th> E-Mails </th> <th> Contacts </th><th> IEP </th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($seach as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><center> ".$valeur->matricule ." </center></td>";
              echo "<td><center> ".$valeur->nom_perso ." ". $valeur->prenoms ."</center></td>";
              echo "<td><center> ".$valeur->mail. " </center></td>";
              echo "<td><center> ".$valeur->telephone ." </center></td>";
              echo "<td><center> ".$valeur->nom_iep ." </center></td>";
              echo "<td><center> ".$valeur->nom_dren ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
        else
        {
          echo "<div style=\"background-color:red;color:white;font-size:20px; padding-top:20px;text-align:center;height:40px; opacity:0.6\"> 
          <i> Auccun resultat trouver ! </i>
          </div>";
        }
        
    }

    // Recherche ECOLE
    public function seachEcole_admin(string $nom)
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models/Mod_IEP/bd_IEP.php';
      $seach = seachEcole($nom);

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
          echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Identifiants </th><th> Noms </th> <th> Type d'ecole </th><th> E-Mails </th> <th> Contacts </th><th> IEP </th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($seach as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><center> ".$valeur->Id_ecole ." </center></td>";
              echo "<td><center> ".$valeur->nom_ecole ." </center></td>";
              echo "<td><center> ".$valeur->Type_ecole. " </center></td>";
              echo "<td><center> ".$valeur->mail_ecole. " </center></td>";
              echo "<td><center> ".$valeur->contact_ecole ." </center></td>";
              echo "<td><center> ".$valeur->nom_iep ." </center></td>";
              echo "<td><center> ".$valeur->nom_dren ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
        else
        {
          echo "<div style=\"background-color:red;color:white;font-size:20px; padding-top:20px;text-align:center;height:40px; opacity:0.6\"> 
          <i> Auccun resultat trouver ! </i>
          </div>";
        }
        
    }

    // Recherche IEP
    public function seachIEP_admin(string $nom)
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models/Mod_IEP/bd_IEP.php';
      $seach = seachIEP($nom);

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
          echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Identifiants </th><th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($seach as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><center> ".$valeur->Id_iep ." </center></td>";
              echo "<td><center> ".$valeur->nom_iep ." </center></td>";
              echo "<td><center> ".$valeur->mail_iep. " </center></td>";
              echo "<td><center> ".$valeur->contact_iep ." </center></td>";
              echo "<td><center> ".$valeur->nom_dren ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
        else
        {
          echo "<div style=\"background-color:red;color:white;font-size:20px; padding-top:20px;text-align:center;height:40px; opacity:0.6\"> 
          <i>Auccun resultat trouver ! </i>
          </div>";
        }
        
    }

    
  // Recherche DREN
  public function seachDren_admin(string $nom)
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_DREN/bd_DREN.php';
    $resul = seach_dren($nom);

    if ($resul == true) {
      /** Lecture des donnees de la BD  */
      $i = 1; 
      echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
      echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Identifiants </th> <th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
      foreach ($resul as $key => $valeur) {
        echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><center> " . $valeur->Id_dren . " </center></td>";
        echo "<td><center> " . $valeur->nom_dren . " </center></td>";
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

  // liste du DRH
  public function liste_drh_All()
  {

    // Appel de la fonction qui permet d'ajouter un admin
    require 'models/Mod_admin/bd_admin.php';
    $resul = liste_drh_All();

    if ($resul == true) {
      /** Lecture des donnees de la BD  */
      $i = 1; 
      echo "<h2 style=\"text-align:center\"> Liste de directions des ressources humaines </h2>";
      echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th><th> Identifiants </th> <th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
      foreach ($resul as $key => $valeur) {
        echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
        echo "<td><center> " . $valeur->iden_drh . " </center></td>";
        echo "<td><center> " . $valeur->nom_drh . " </center></td>";
        echo "<td><center> " . $valeur->mail_drh . " </center></td>";
        echo "<td><center> " . $valeur->contact_drh . " </center></td>";
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

}

$ConAdmin = new ConAdmin();








