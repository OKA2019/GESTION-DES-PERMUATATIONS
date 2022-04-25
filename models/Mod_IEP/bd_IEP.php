<?php


function listeIEPUnique()
{
        $mat = $_SESSION['mat_iep'];

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
        WHERE dren.Id_dren = (SELECT iep.Id_dren FROM iep WHERE Id_iep = '$mat' ) ORDER BY nom_iep
        ");
        $iep = $iep->fetchAll(PDO::FETCH_CLASS);

        return $iep;
}


// requête de selection des ecoles
function listeEcole()
{
        session_start();
        $matricule = $_SESSION['mat_iep'];
        $username = 'root';
        $pass = '';
        try {
                $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
                $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        } catch (PDOException $e) {
                die('echec lors de la connexion à la base de données:' . $e->getMessage());
        }


        $ecole = $user->query("SELECT Id_ecole, nom_ecole, Type_ecole, mail_ecole, contact_ecole, nom_localite, Chef_Lieux 
    FROM ecole
    JOIN localite ON ecole.Id_localite = localite.Id_localite
    JOIN iep ON ecole.Id_iep = iep.Id_iep
    WHERE iep.Id_iep='$matricule' ORDER BY Type_ecole
    ");
        $ecole = $ecole->fetchAll(PDO::FETCH_CLASS);

        return $ecole;
}

// requête de selection de tout ecoles
function listeEcoleAll()
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


        $ecole = $user->query("SELECT Id_ecole, nom_ecole, Type_ecole, mail_ecole, contact_ecole, nom_localite, Chef_Lieux, nom_iep, nom_dren 
    FROM ecole, localite, iep, dren
    WHERE  ecole.Id_localite = localite.Id_localite AND ecole.Id_iep = iep.Id_iep AND iep.Id_dren = dren.Id_dren
    ORDER BY Type_ecole
    ");
        $ecole = $ecole->fetchAll(PDO::FETCH_CLASS);

        return $ecole;
}


// requête de selection des ecoles
function seachEcole(string $nom)
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


        $ecole = $user->query("SELECT Id_ecole, nom_ecole, Type_ecole, mail_ecole, contact_ecole, nom_localite, Chef_Lieux,nom_iep, nom_dren 
    FROM ecole, localite, iep, dren
    WHERE  ecole.Id_localite = localite.Id_localite AND ecole.Id_iep = iep.Id_iep AND iep.Id_dren = dren.Id_dren
    AND nom_ecole LIKE '%$nom%'
    ORDER BY Type_ecole, nom_ecole
    ");
        $ecole = $ecole->fetchAll(PDO::FETCH_CLASS);

        return $ecole;
}

// requête de selection des IEP
function seachIEP(string $nom)
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


        $iep = $user->query("SELECT DISTINCT Id_iep, nom_iep, mail_iep, contact_iep, nom_localite, Chef_Lieux, nom_dren 
    FROM iep, localite, dren
    WHERE  iep.Id_localite = localite.Id_localite AND iep.Id_dren = dren.Id_dren AND (nom_iep LIKE '%$nom%')
    ORDER BY nom_iep
    ");
        $iep = $iep->fetchAll(PDO::FETCH_CLASS);

        return $iep;
}

// selection de tout lesIEP
function IEP_All()
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


                $iep = $user->query("SELECT DISTINCT Id_iep, nom_iep, mail_iep, contact_iep, nom_localite, Chef_Lieux, nom_dren 
        FROM iep, localite, dren
        WHERE  iep.Id_localite = localite.Id_localite AND iep.Id_dren = dren.Id_dren
        ORDER BY nom_iep
        ");
        $iep = $iep->fetchAll(PDO::FETCH_CLASS);

        return $iep;
}
