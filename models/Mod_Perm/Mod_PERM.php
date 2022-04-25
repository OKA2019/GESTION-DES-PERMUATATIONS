<?php

session_start();
/* Fonction avis de demande */
function demande(string $matricule, string $nom, string $prenoms, string $fonction, string $iepRe, string $drenRe, string $iepshou, string $drenshou, float $id_stat, string $annee)
{

    //inclure la BD
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    //script qui creer le code du dossier
    // recup drh
    $idendrh = $user->query('SELECT*FROM drh_men');
    $idendrh = $idendrh->fetchAll(PDO::FETCH_OBJ);
    foreach ($idendrh as $tab) {
        $idendrh = $tab->Id_drh;
    }

    //annee de la permutation
    $annee = $user->query('SELECT annee FROM statut');
    $annee = $annee->fetchAll(PDO::FETCH_OBJ);
    foreach ($annee as $tab) {
        $an = $tab->annee;
    }
    //dateheure de la demande
    $codeDT = time();

    //longeur de la table dossier
    $long = $user->query('SELECT*FROM dossier ');
    $long = $long->fetchAll(PDO::FETCH_OBJ);
    $longDoss = count($long);

    //longeur de la table dossier demand
    $long = $user->query('SELECT*FROM dossier_deman ');
    $longdem = $long->fetchAll(PDO::FETCH_OBJ);
    $longDem = count($longdem);
    $longDem = $longDem + 1;

    $codedossier = "PERMUTE" . $codeDT;



    $fk_iep = $user->query("SELECT Id_iep FROM iep WHERE nom_iep ='$iepRe' ");
    $valiep = $fk_iep->fetch();

    $fk_dren = $user->query("SELECT Id_dren FROM dren WHERE nom_dren ='$drenRe' ");
    $valdren = $fk_dren->fetch();

    
    try {

        $rien = NULL;
        //script qui remplie le dossier
        $dem1 = $user->prepare('INSERT INTO `dossier`(`id_dossier`, `statut_iep1`, `statut_iep2`, `statut_dren1`, `statut_dren2`, `statut_drh`, `date_arrive_dren1`, `date_arrive_dren2`, `Id_Statut`, `Id_drh`) 
        VALUES (?,?,?,?,?,?,?,?,?,?) ');
        $dem = $dem1->execute(array($codedossier, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $id_stat, $idendrh));

        $date = date("Y-m-d H:m:s");
        //script qui rempli enseignant demandeur
        $dosDem = $user->prepare('INSERT INTO `enseig_demandeur` (`id_ensei_deman`, `matricule`, `date_deman`, `annee`) 
            VALUES(?, ?, ?, ?)');
        $dosDem = $dosDem->execute(array(NULL, $matricule, $date, $an));

        $id_ensei = $user->query("SELECT max(id_ensei_deman) as nombre FROM enseig_demandeur");
        $id_ensei = $id_ensei->fetch();
    
        $val_dem = $id_ensei['nombre'];
        //script qui rempli dosseier demandeur
        $dosDem = $user->prepare('INSERT INTO `dossier_deman`(`Id_DosDem`, `dren_souh`, `iep_souh`, `date_Dem`, `Id_iep`, `Id_dren`,`id_ensei_deman`, `matricule`, `id_dossier`)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) ');
        $dosDem = $dosDem->execute(array(
            $longDem,
            $drenshou,
            $iepshou,
            $date,
            $valiep['Id_iep'],
            $valdren['Id_dren'],
            $val_dem,
            $matricule,
            $codedossier
        ));
    } catch (PDOException $e) {
        die('ERROR' . $e->getMessage());
    }

    return array($codedossier, $dem, $dosDem);
}



/* Fonction favorable */
/* Fonction avis de demande */
function favorable(string $matricule, string $nom, string $prenoms, string $fonction, string $iepRe, string $drenRe, string $choix, string $code, float $id_stat, string $annee)
{

    //inclure la BD
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    //script qui creer le code du dossier


    //longeur de la table dossier
    $long = $user->query('SELECT*FROM dossier_fav ');
    $long = $long->fetchAll(PDO::FETCH_OBJ);
    $longDoss = count($long);

    $fk_iep = $user->query("SELECT Id_iep FROM iep WHERE nom_iep ='$iepRe' ");
    $valiep = $fk_iep->fetch();

    $fk_dren = $user->query("SELECT Id_dren FROM dren WHERE nom_dren ='$drenRe' ");
    $valdren = $fk_dren->fetch();
    try {


        //annee de la permutation
        $annee = $user->query('SELECT annee FROM statut');
        $annee = $annee->fetchAll(PDO::FETCH_OBJ);
        foreach ($annee as $tab) {
            $an = $tab->annee;
        }

        $date = date("Y-m-d H:m:s");
        //script qui rempli enseignant favorable
        $enseiDem = $user->prepare('INSERT INTO `enseig_favorable` (`id_ensei_fav`, `matricule`, `date_valide`, `annee`) 
            VALUES(?, ?, ?, ?)');
        $enseiDem = $enseiDem->execute(array(NULL, $matricule, $date, $an));

        
        $id_ensei = $user->query("SELECT max(id_ensei_fav) as nombre FROM enseig_favorable");
        $id_ensei = $id_ensei->fetch();
    
        $val_fav = $id_ensei['nombre'];
        $rien = NULL;
        //script qui rempli dossier demandeur
        $dosFav = $user->prepare('INSERT INTO `dossier_fav` (`Id_DosFav`, `opinion`, `date_opinion`, `Id_iep`, `Id_dren`, `id_ensei_fav`, `matricule`, `id_dossier`)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?) ');
        $dosFav = $dosFav->execute(array(
            NULL,
            $choix,
            $date,
            $valiep['Id_iep'],
            $valdren['Id_dren'],
            $val_fav,
            $matricule,
            $code
        ));
    } catch (PDOException $e) {
        die('ERROR' . $e->getMessage());
    }

    return $dosFav;
}



/** fonction recpère les informations des coordonnées */
function recupdonner()
{

    // appelle de la connexion a la bd
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    /** variable de lecture du statut(disponibilité) du jeu */
    $stat = $user->query('SELECT*FROM statut WHERE LAST_INSERT_ID(Id_Statut)');
    $stat = $stat->fetchAll(PDO::FETCH_OBJ);
    if (!empty($stat)) {

        foreach ($stat as $tab) {
            $iden = $tab->Id_Statut;
            $annee = $tab->annee;
            $dispo = $tab->statut;
            $debut = $tab->debut_ensei;
            $fin = $tab->fin_ensei;
            $debutiep = $tab->debut_iep;
            $finiep = $tab->fin_iep;
            $debutdren = $tab->debut_dren;
            $findren = $tab->fin_dren;
            $debutdrh = $tab->debut_drh;
            $findrh = $tab->fin_drh;
        }
        $tab = array($iden, $annee, $dispo, $debut, $fin, $debutiep, $finiep, $debutdren, $findren, $debutdrh, $findrh);
    } else {
        $iden = count($stat);
        $annee = 2021;
        $dispo = "Désactiver";
        $debut = "2021-01-01";
        $fin = "2021-01-01";
        $debutiep = "2021-01-01";
        $finiep = "2021-01-01";
        $debutdren = "2021-01-01";
        $findren = "2021-01-01";
        $debutdrh = "2021-01-01";
        $findrh = "2021-01-01";

        $tab = array($iden, $annee, $dispo, $debut, $fin, $debutiep, $finiep, $debutdren, $findren, $debutdrh, $findrh);
    }

    return $tab;
}



/** Reccupper les onfo lier au dossier */
function codedossier()
{
    //RECCUPERER LA VALEUR DE LA SESSION

    $ref_dos = $_SESSION['mat_ensei'];
    // appelle de la connexion a la bd
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }


    // Reccup info perso
    $person = $user->query("SELECT*FROM personnel WHERE matricule ='$ref_dos' ");
    $person = $person->fetchAll(PDO::FETCH_OBJ);


    $doss = $user->query("SELECT id_dossier, date_Dem FROM dossier_deman WHERE matricule ='$ref_dos' ");
    $doss = $doss->fetchAll(PDO::FETCH_OBJ);

    if (!empty($doss)) {
        foreach ($doss as $key => $tab) {
            $codedoss = $tab->id_dossier;
            $dateD = $tab->date_Dem;
        }
        foreach ($person as $tab2) {
            $nom = $tab2->nom . " " . $tab2->prenoms;
            $tel = $tab2->telephone;
            $idiep = $tab2->Id_iep;
        }


        //reccup info IEP
        $iepinfo = $user->query("SELECT*FROM iep WHERE Id_iep ='$idiep' ");
        $iepinfo = $iepinfo->fetchAll(PDO::FETCH_OBJ);

        foreach ($iepinfo as $tab2) {
            $nom_iep = $tab2->nom_iep;
            $idlocaliep = $tab2->Id_localite;
            $iddren = $tab2->Id_dren;
        }

        //reccup info DREN
        $dreninfo = $user->query("SELECT*FROM dren WHERE Id_dren ='$iddren' ");
        $dreninfo = $dreninfo->fetchAll(PDO::FETCH_OBJ);

        foreach ($dreninfo as $tab2) {
            $nom_dren = $tab2->nom_dren;
            $idlocaldren = $tab2->Id_localite;
        }

        //reccup info Localite
        $localinfo = $user->query("SELECT*FROM localite WHERE Id_localite ='$idlocaliep' ");
        $localinfo = $localinfo->fetchAll(PDO::FETCH_OBJ);

        foreach ($localinfo as $tab2) {
            $nom_local = $tab2->nom_localite;
            $nom_chef = $tab2->Chef_Lieux;
        }
        $doss = array($codedoss, $nom, $tel, $nom_iep, $nom_dren, $nom_local, $nom_chef, $dateD);
    }

    return $doss;
}


//recuperation de la liste des dossier non traiter de la drh demandeur
function PermdrhNT()
{
    $mat_drh = $_SESSION['mat_drh'];

    // appelle de la connexion a la bd
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    //annee de la permutation
        $statut = $user->query('SELECT annee FROM  statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut)');
    $statutAN = $statut->fetch();

    // Faire une jointure pour renvoyer les dossiersv non traiter
    $PermdrhNT = $user->query("SELECT DISTINCT nom, prenoms, dossier.id_dossier AS num_doss,
    (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
    (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
    (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_nom,
    (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_prenom,
    (SELECT nom_iep FROM iep,dossier_fav WHERE iep.Id_iep = dossier_fav.Id_iep LIMIT 1) AS fav_iep,
    (SELECT nom_dren FROM dren ,dossier_fav WHERE dren.Id_dren = dossier_fav.Id_dren LIMIT 1) AS fav_dren
    FROM personnel
    JOIN enseig_favorable ON enseig_favorable.annee = $statutAN[0]
    JOIN dossier_fav ON personnel.matricule = dossier_fav.matricule
    JOIN dossier ON dossier_fav.id_dossier = dossier.id_dossier
    JOIN drh_men ON dossier.Id_drh = drh_men.Id_drh AND drh_men.Id_drh = '$mat_drh'
    WHERE statut_dren1 = 'Accepter' AND statut_dren2 = 'Accepter' AND statut_drh IS NULL  ");
    $PermdrhNT = $PermdrhNT->fetchAll(PDO::FETCH_CLASS);


    return $PermdrhNT;
}


//recuperation de la liste des dossier non traiter de la drh demandeur
function PermdrhT()
{
    $mat_drh = $_SESSION['mat_drh'];

    // appelle de la connexion a la bd
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    //annee de la permutation
    $statut = $user->query('SELECT annee FROM  statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut) ');
    $statutAN = $statut->fetch();

    // Faire une jointure pour renvoyer les dossiersv non traiter
    $PermdrhT = $user->query("SELECT DISTINCT nom, prenoms, statut_drh,
    (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
    (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
    (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_nom,
    (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_prenom,
    (SELECT nom_iep FROM iep,dossier_fav WHERE iep.Id_iep = dossier_fav.Id_iep LIMIT 1) AS fav_iep,
    (SELECT nom_dren FROM dren ,dossier_fav WHERE dren.Id_dren = dossier_fav.Id_dren LIMIT 1) AS fav_dren
    FROM personnel
    JOIN enseig_favorable ON enseig_favorable.annee = $statutAN[0]
    JOIN dossier_fav ON personnel.matricule = dossier_fav.matricule
    JOIN dossier ON dossier_fav.id_dossier = dossier.id_dossier
    JOIN drh_men ON dossier.Id_drh = drh_men.Id_drh AND drh_men.Id_drh = '$mat_drh'
    WHERE statut_dren1 = 'Accepter' AND statut_dren2 = 'Accepter' AND statut_drh IS NOT NULL  ");
    $PermdrhT = $PermdrhT->fetchAll(PDO::FETCH_CLASS);



    return $PermdrhT;
}




// fonction d'ajout informations de la permutations
function ADDStatut(string $anne, string $statut, string $debut_ensei, string $fin_ensei, string $debut_iep, string $fin_iep, string $debut_dren, string $fin_dren, string $debut_drh, string $fin_drh)
{
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");

        $admin = $user->prepare('INSERT INTO `statut` (`Id_Statut`, `annee`, `statut`, `debut_ensei`, `fin_ensei`, `debut_iep`, `fin_iep`, `debut_dren`, `fin_dren`, `debut_drh`, `fin_drh`)
        VALUES (:Id_Statut, :annee, :statut, :debut_ensei, :fin_ensei, :debut_iep, :fin_iep, :debut_dren, :fin_dren, :debut_drh, :fin_drh) ');
        $admin = $admin->execute([
            'Id_Statut' => NULL,
            'annee' => $anne,
            'statut' => $statut,
            'debut_ensei' => $debut_ensei,
            'fin_ensei' => $fin_ensei,
            'debut_iep' => $debut_iep,
            'fin_iep' => $fin_iep,
            'debut_dren' => $debut_dren,
            'fin_dren' => $fin_dren,
            'debut_drh' => $debut_drh,
            'fin_drh' => $fin_drh
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    return $admin;
}


    // fonction de traitement du dossier par la drh
    function traite_drh(string $code, string $traite)
    {

        
        $mat_drh = $_SESSION['mat_drh'];
        // appelle de la connexion a la bd
        $username = 'root';
        $pass = '';
        try {
            $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
            $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        } catch (PDOException $e) {
            die('echec lors de la connexion à la base de données:' . $e->getMessage());
        }

        $sql = "UPDATE dossier,drh_men SET statut_drh = '$traite'
        WHERE dossier.id_dossier ='$code' AND drh_men.Id_drh = '$mat_drh'";
        $trai_dren = $user->query($sql);
        $traiter_dren = $trai_dren->execute();

        return $traiter_dren;
    }

    
//recuperation de la liste des personne retenue pour la permuations
function permut_retenue(string $an, string $fin)
{

    // appelle de la connexion a la bd
    $username = 'root';
    $pass = '';
    try {
        $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
        $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        die('echec lors de la connexion à la base de données:' . $e->getMessage());
    }

    // Faire une jointure pour renvoyer les dossiersv non traiter
    $permut_retenue = $user->query("SELECT nom, prenoms, statut_drh, $an AS anneePerm,
    (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
    (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
    (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_nom,
    (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS fav_prenom,
    (SELECT nom_iep FROM iep,dossier_fav WHERE iep.Id_iep = dossier_fav.Id_iep LIMIT 1) AS fav_iep,
    (SELECT nom_dren FROM dren ,dossier_fav WHERE dren.Id_dren = dossier_fav.Id_dren LIMIT 1) AS fav_dren
    FROM personnel
    JOIN enseig_favorable ON enseig_favorable.annee = $an
    JOIN dossier_fav ON ((personnel.matricule = dossier_fav.matricule))
    JOIN dossier ON (dossier_fav.id_dossier = dossier.id_dossier)
    JOIN drh_men ON  (dossier.Id_drh = drh_men.Id_drh) 
    WHERE ( (statut_drh = 'Accepter') AND (enseig_favorable.annee = $an) )  ");
    $permut_retenue = $permut_retenue->fetchAll(PDO::FETCH_CLASS);



    return $permut_retenue;
}
