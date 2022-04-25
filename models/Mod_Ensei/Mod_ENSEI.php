<?php

  /** Base de données du pronostic */


  /* Fonction avis de permutation */
  function addavis ()
  {
      include_once('../../models/bd_connexion.php');
      /** recup de l'année de la campagne pour l'attribuer à la table pronostic afin qu'il puisse verifier 
       * que la pronostic de l'utilisateur soit lier à l'année
       */
      $annee = $user->query('SELECT annee FROM statut LIMIT 1 ');
      $annee = $annee->fetchAll(PDO::FETCH_OBJ);
      foreach($annee as $tab)
      {
          $an = $tab->annee;
      }
  
  
      /** envoie de données a la bd */
      $i=1;
      
      $nom = $_POST['nom'];
      $prenom = $_POST['prenoms'];
      $mail = $_POST['mail'];
      $tel = $_POST['tel'];
      $local = $_POST['local'];
      $dren = $_POST['dren'];
      $iep = $_POST['iep'];
      $ecole = $_POST['ecole'];
      $matricule = $_POST['matricule'];
      $zone = $_POST['zone'];
  

      $addavis = $user->prepare('INSERT INTO `avis_permutat`(`Id_permut`, `nom`, `prenoms`, `mail`, `telephone`, `localite`, `zone`, `dren_souh`, `matricule`, `annee`) 
      VALUES (:Id_permut, :nom, :prenoms, :mail, :telephone, :localite, :zone1, :dren_souh, :matricule, :an) ');
      $addavis = $addavis->execute(
          [ 'Id_permut'=> NULL,
          'nom' => $nom,
          'prenoms' => $prenom,
          'mail'=>$mail,
          'telephone' => $tel,
          'localite' => $local,
          'zone1' => $zone,
          'dren_souh' => $dren,
          'matricule'=> $matricule,
          'an'=> $an
      ]);
      return $addavis;
  }
  

/** fonction de selection de la liste des iep */
function listeavis()
{
  require_once 'models/bd_connexion.php';
  
  // requête de selection des joueurs
  $listeavis = "SELECT*FROM avis_permutat ";
  
  $avis = $user->query($listeavis);
  $avis = $avis->fetchAll(PDO::FETCH_CLASS);

  return $avis;
}

// selections des tout les enseignants
function liste_institu()
{
  
  $username = 'root';
  $pass = '';
  try {
          $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
          $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
  } 
  catch (PDOException $e) {
          die('echec lors de la connexion à la base de données:' . $e->getMessage());
      }

      $institu = "SELECT matricule, personnel.nom AS nom_perso, prenoms, mail, telephone, emploi, nom_iep, nom_dren, nom_localite, Chef_Lieux, nom_dren 
      FROM fonction, personnel, iep,localite, dren
      WHERE fonction.Id_fonct = personnel.id_fonct 
      AND personnel.Id_iep = iep.Id_iep 
      AND iep.Id_localite = localite.Id_localite 
      AND iep.Id_dren = dren.Id_dren";
    $ensei = $user->query($institu);
    $ensei = $ensei->fetchAll(PDO::FETCH_CLASS);

  return $ensei;
  
}

//Recherche enseignat
function seachEnsei(string $nom)
{
  
  $username = 'root';
  $pass = '';
  try {
          $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
          $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
  } 
  catch (PDOException $e) {
          die('echec lors de la connexion à la base de données:' . $e->getMessage());
      }

      $institu = "  ";
    $ensei = $user->query("SELECT matricule, personnel.nom AS nom_perso, prenoms, mail, telephone, emploi, nom_iep, nom_dren, nom_localite, Chef_Lieux, nom_dren 
    FROM fonction, personnel, iep,localite, dren
    WHERE fonction.Id_fonct = personnel.id_fonct 
    AND personnel.Id_iep = iep.Id_iep 
    AND iep.Id_localite = localite.Id_localite 
    AND iep.Id_dren = dren.Id_dren
    AND ( (personnel.nom LIKE '%$nom%' ) OR (prenoms LIKE '%$nom%') OR (matricule LIKE '%$nom%'))");
    $ensei = $ensei->fetchAll(PDO::FETCH_CLASS);

  return $ensei;
  
}

 
