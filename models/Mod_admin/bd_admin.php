<?php

// SELECTION DES administrateurS
function administratuer()
{

  require '../../models/bd_connexion.php';

  $admin = $user->query('SELECT*FROM administrateur');

  /** Lecture des donnees de la BD  */
  $admin = $admin->fetchAll(PDO::FETCH_CLASS);

  return $admin;

}

/** Fonction d'ajout d'un admistrateurs */

  function addadmin(string $matricule, string $nom, string $prenom, string $adresse, string $mail, float $tel)
  {
    require '../../models/bd_connexion.php';

      $admin = $user->prepare('INSERT INTO `administrateur`(`matricule`, `nom`, `prenoms`, `adresse`, `mail`, `telephone`) 
      VALUES (:matricule, :nom, :prenom, :adresse, :mail, :telephone) ');
      $admin = $admin->execute([
        'matricule' => $matricule,
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'mail' => $mail,
        'telephone' => $tel]
      );
    
    return $admin;
}

/** recupère le nombre d'administrateur */
function longAdmin()
{
  require '../../models/bd_connexion.php';
  $id_resultat = $user->query('SELECT matricule FROM administrateur');
  $id = $id_resultat->fetchAll(PDO::FETCH_OBJ);
  $i = count($id);

  return $i;
}


/** recupère le nombre d'administrateur */
function listeadmin()
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
  
  $admin = $user->query('SELECT*FROM administrateur');
  /** Lecture des donnees de la BD  */
  $admin = $admin->fetchAll(PDO::FETCH_CLASS);
  
  return $admin;
}


/** Fonction de suppression d'un admistrateur */

function deladmin()
{
  require '../../models/bd_connexion.php';
 
  $deladmin = $user->prepare("DELETE FROM administrateur WHERE matricule =:mat LIMIT 1");
  $deladmin = $deladmin->bindValue(':mat',$_SESSION['matricule']).
  $effacer = $deladmin->execute();
  return $effacer;
}


/** Fonction de suppression d'un gestionnaires */

function modifier(string $id, string $matricule, string $nom, string $prenom, string $adresse, string $mail, string $tel)
{
  require '../../models/bd_connexion.php';
 
  $modif = "UPDATE administrateur SET matricule = '$matricule', nom = '$nom' ,prenoms = '$prenom', 
  adresse = '$adresse', mail = '$mail', telephone = '$tel'
  WHERE matricule = '$id' ";
  $admin = $user->exec($modif);
  return $admin;
}



// requête de selection des Drh
function liste_drh_All()
{
        $username = 'root';
        $pass = '';
        try {
                $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
                $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        } catch (PDOException $e) {
                die('echec lors de la connexion à la base de données:' . $e->getMessage());
        }

        $dren = $user->query("SELECT drh_men.Id_drh AS iden_drh, nom_drh, mail_drh, contact_drh, nom_localite, Chef_Lieux
        FROM drh_men, localite
        WHERE  drh_men.Id_localite = localite.Id_localite
        ORDER BY nom_drh
        ");
        $dren = $dren->fetchAll(PDO::FETCH_CLASS);

        return $dren;
}


