<?php


/** LISTE DES DREN */
function listeDREN()
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
  $listedren = "SELECT DISTINCT Id_dren, nom_dren, mail_dren, contact_dren, nom_localite, Chef_Lieux, 
  dren.matricule_respo AS iden , 
  dren.nom_respo AS nom, 
  dren.prenoms_respo AS prenoms, 
  dren.mails_respo AS mail, 
  dren.tel_respo AS tel
  FROM dren, drh_men, localite WHERE dren.Id_drh = drh_men.Id_drh AND dren.Id_localite = localite.Id_localite ";
  
  $dren = $user->query($listedren);
  $dren = $dren->fetchAll(PDO::FETCH_CLASS);

  return $dren;
}


//Liste de ces dren
function listeIEP_dren()
{
        $mat = $_SESSION['mat_dren'];

        $username = 'root';
        $pass = '';
        try {
                $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
                $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        } catch (PDOException $e) {
                die('echec lors de la connexion à la base de données:' . $e->getMessage());
        }

        $iep = $user->query("SELECT nom_iep, mail_iep, contact_iep, nom_localite, Chef_Lieux FROM iep 
        JOIN localite ON iep.Id_localite = localite.Id_localite 
        JOIN dren ON iep.Id_dren = dren.Id_dren 
        WHERE dren.Id_dren = '$mat' ORDER BY nom_iep
        ");
        $iep = $iep->fetchAll(PDO::FETCH_CLASS);

        return $iep;
}


// requête de selection des DREN
function liste_dren_All()
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

        $dren = $user->query("SELECT Id_dren, nom_dren, mail_dren, contact_dren, nom_localite, Chef_Lieux
        FROM dren, drh_men, localite
        WHERE  dren.Id_localite = localite.Id_localite AND dren.Id_drh = drh_men.Id_drh
        ORDER BY nom_dren
        ");
        $dren = $dren->fetchAll(PDO::FETCH_CLASS);

        return $dren;
}


// requête de selection des DREN
function seach_dren(string $nom)
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

        $dren = $user->query("SELECT Id_dren, nom_dren, mail_dren, contact_dren, nom_localite, Chef_Lieux, nom_drh
        FROM dren, drh_men, localite
        WHERE  dren.Id_localite = localite.Id_localite AND dren.Id_drh = drh_men.Id_drh AND (nom_dren LIKE '%$nom%')
        ORDER BY nom_dren
        ");
        $dren = $dren->fetchAll(PDO::FETCH_CLASS);

        return $dren;
}

