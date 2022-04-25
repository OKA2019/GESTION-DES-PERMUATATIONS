<?php

/** Class de gestion des gestionnaire */
class ConIEP
{

    // Listes de tout les IEP qui ont la meme DREN
    public function listeIEPUnique()
    { 
        /** Liste des administrateur */
      require_once 'models/Mod_IEP/bd_IEP.php';
      $liste = listeIEPUnique();
        
        /** AFFICHAGE DE LA LISTES DES JOUEURS */
        if(!empty($liste)) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo " <h3> Liste des inspections de votre direction regionale</h3><br> ";
          echo "<table width=\"98%\" style=\"border-raduis:20px;\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th>Nom</th> <th> E-Mail </th> <th> Contacts </th><th> Nom localité </th> <th> Chefs lieux </th></tr>";
            foreach($liste as $key => $valeur)
            {
              echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><h5><center> ".$valeur->nom_iep ." </center></h5></td>";
              echo "<td><center> ".$valeur->mail_iep. " </center></td>";
              echo "<td><center> ".$valeur->contact_iep ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
    }

    
    // Listes des ecoles en fonctions des iep
    public function listeEcole()
    {    
    
        /** Liste des administrateur */
      include_once 'models/Mod_IEP/bd_IEP.php';
      $liste = listeEcole();
        
        /** AFFICHAGE DE LA LISTES DES JOUEURS */
        if($liste == true) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<table width=\"98%\" style=\"font-size:14px;\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Indentifiants </th> <th> Noms </th> <th> Type </th><th> E-Mails </th> <th> Contacts </th><th>Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($liste as $key => $valeur)
            {
              echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><center> ".$valeur->Id_ecole ." </center></td>";
              echo "<td><h5><center> ".$valeur->nom_ecole ." </center></h5></td>";
              echo "<td><center> ".$valeur->Type_ecole. " </center></td>";
              echo "<td><center> ".$valeur->mail_ecole. " </center></td>";
              echo "<td><center> ".$valeur->contact_ecole ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
    }

    // Listes de tout les ecoles
    public function listeEcoleAll()
    {    
    
        /** Liste des administrateur */
      include_once 'models/Mod_IEP/bd_IEP.php';
      $liste = listeEcoleAll();
        
        /** AFFICHAGE DE LA LISTES DES JOUEURS */
        if($liste == true) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h2 style=\"text-align:center\"> Liste des ecoles</h2>";
          echo "<table width=\"90%\" style=\"font-size:14px;margin-left:5%\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Indentifiants </th> <th> Noms </th> <th> Type </th><th> E-Mails </th> <th> Contacts </th><th>Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($liste as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><center> ".$valeur->Id_ecole ." </center></td>";
              echo "<td><center> ".$valeur->nom_ecole ." </center></td>";
              echo "<td><center> ".$valeur->Type_ecole. " </center></td>";
              echo "<td><center> ".$valeur->mail_ecole. " </center></td>";
              echo "<td><center> ".$valeur->contact_ecole ." </center></td>";
              echo "<td><center> ".$valeur->nom_localite ." </center></td>";
              echo "<td><center> ".$valeur->Chef_Lieux . " </center></td>";
              $i++;
            }
            echo "</tr></table>";
        }
    }

    // Recherche ECOLE
    public function seachEcole(string $nom)
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models//Mod_IEP/bd_IEP.php';
      $seach = seachEcole($nom);

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
          echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Noms </th> <th> Type d'ecole </th><th> E-Mails </th> <th> Contacts </th><th> IEP </th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($seach as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><h5><center> ".$valeur->nom_ecole ." </center></h5></td>";
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
    public function seachIEP(string $nom)
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models//Mod_IEP/bd_IEP.php';
      $seach = seachIEP($nom);

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h3 style=\"text-align:center\"><br><br> Resultat de la recherche </h3>";
          echo "<br><table width=\"90%\" style=\"font-size:14px;margin-left: 5%;\" ><tr height=\"50px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
          <th> N° </th> <th> Noms </th><th> E-Mails </th> <th> Contacts</th><th> DREN</th><th> Nom Localite</th> <th> Chef lieux </th> </tr>";
            foreach($seach as $key => $valeur)
            {
              echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> ".$i. " </center></td>";
              echo "<td><h5><center> ".$valeur->nom_iep ." </center></h5></td>";
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

    // lISTE DE TOUT LES IEP
    public function liste_iep_All()
    { 
        
      // Appel de la fonction qui permet d'ajouter un admin
      require 'models/Mod_IEP/bd_IEP.php';
      $seach = IEP_All();

        if($seach == true ) 
        {
          /** Lecture des donnees de la BD  */
          $i=1;
          echo "<h2 style=\"text-align:center\"> Liste des inspections </h2>";
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


}

$ConIEP = new ConIEP();








