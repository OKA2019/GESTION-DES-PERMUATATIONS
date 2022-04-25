<?php
     
    //recuperation de la liste des dossier non traiter
    function PermBiepNT()
    {
        $mat_iep = $_SESSION['mat_iep'];

        // appelle de la connexion a la bd
        $username = 'root';
        $pass = '';
        try {
            $user = new PDO('mysql:host=localhost;dbname=pct', $username, $pass);
            $user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $user->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
            //annee de la permutation
        $statut = $user->query('SELECT LAST_INSERT_ID(annee) FROM  statut');
        $statutAN = $statut->fetch();

        } catch (PDOException $e) {
            die('echec lors de la connexion à la base de données:' . $e->getMessage());
        }

        // Faire une jointure pour renvoyer les dossiersv non traiter
        $PermBiepNT = $user->query("SELECT DISTINCT nom, prenoms, telephone, dossier.id_dossier AS num_dossF,
        (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
        (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
        (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_nomC,
        (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_prenomC
        FROM dossier
        JOIN enseig_favorable ON enseig_favorable.annee = '$statutAN[0]'
        INNER JOIN dossier_fav ON (enseig_favorable.id_ensei_fav  = dossier_fav.id_ensei_fav ) and dossier_fav.Id_iep = '$mat_iep'
        INNER JOIN personnel ON personnel.matricule = dossier_fav.matricule
        
        WHERE ( (dossier_fav.id_dossier = dossier.id_dossier) AND (statut_iep2 IS NULL))
         ");
        $PermBiepNT = $PermBiepNT->fetchAll(PDO::FETCH_CLASS);
        
        return $PermBiepNT;
    }

    //recuperation de la liste des dossier traiter
    function PermBiepT()
    {
        $mat_iep = $_SESSION['mat_iep'];

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

        $statut = $user->query('SELECT LAST_INSERT_ID(annee) FROM  statut');
        $statutAN = $statut->fetch();

       
        // Faire une jointure pour renvoyer les dossiersv non traiter
        $PermBiepT = $user->query("SELECT DISTINCT nom, prenoms, telephone, statut_iep2, dossier.id_dossier AS num_dossF,
        (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
        (SELECT nom_dren FROM dren,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
        (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_nomC,
        (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_prenomC
        FROM personnel
        JOIN enseig_favorable ON enseig_favorable.annee = $statutAN[0] AND enseig_favorable.matricule
        JOIN dossier_fav ON personnel.matricule = dossier_fav.matricule AND dossier_fav.Id_iep = '$mat_iep'
        JOIN dossier ON dossier_fav.id_dossier = dossier.id_dossier AND statut_iep2 IS NOT NULL ");
        $PermBiepT = $PermBiepT->fetchAll(PDO::FETCH_CLASS);

        return $PermBiepT;
    }

        /** DREN Traitement de dossiers de permutations */


        
    //recuperation de la liste des dossier non traiter de la dren demandeur
    function PermBdrenNT()
    {
        $mat_dren = $_SESSION['mat_dren'];

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
        $statut = $user->query('SELECT LAST_INSERT_ID(annee) FROM  statut');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiersv non traiter
        $PermBdrenNT = $user->query("SELECT DISTINCT nom, prenoms, telephone, dossier.id_dossier AS num_doss,
        (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
        (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
        (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_nomC,
        (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_prenomC
        FROM personnel
        JOIN enseig_favorable ON enseig_favorable.annee = $statutAN[0]
        JOIN dossier_fav ON ((personnel.matricule = dossier_fav.matricule) AND (dossier_fav.Id_dren = '$mat_dren'))
        JOIN dossier ON ( (dossier_fav.id_dossier = dossier.id_dossier) AND (statut_iep2 = 'Accepter') AND (statut_dren2 IS NULL)) ");
        $PermBdrenNT = $PermBdrenNT->fetchAll(PDO::FETCH_CLASS);


        return $PermBdrenNT;
    }

    //recuperation de la liste des dossier traiter
    function PermBdrenT()
    {
        $mat_dren = $_SESSION['mat_dren'];

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

        $statut = $user->query('SELECT LAST_INSERT_ID(annee) FROM  statut');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiers  traiter
        $PermBdrenT = $user->query("SELECT DISTINCT nom, prenoms, telephone, statut_dren2, 
        (SELECT nom_iep FROM iep,dossier_deman WHERE iep.Id_iep = dossier_deman.Id_iep LIMIT 1) AS dem_iep,
        (SELECT nom_dren FROM dren ,dossier_deman WHERE dren.Id_dren = dossier_deman.Id_dren LIMIT 1) AS dem_dren,
        (SELECT nom FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_nomC,
        (SELECT prenoms FROM personnel, dossier_deman WHERE personnel.matricule = dossier_deman.matricule LIMIT 1) AS dem_prenomC
        FROM personnel
        JOIN enseig_favorable ON enseig_favorable.annee = $statutAN[0]
        JOIN dossier_fav ON ((personnel.matricule = dossier_fav.matricule) AND (dossier_fav.Id_dren = '$mat_dren'))
        JOIN dossier ON ( (dossier_fav.id_dossier = dossier.id_dossier) AND (statut_iep2 = 'Accepter') AND (statut_dren2 IS NOT NULL)) ");
        $PermBdrenT = $PermBdrenT->fetchAll(PDO::FETCH_CLASS);


        return $PermBdrenT;
    }

    
    // fonction de traitement du dossier
    function traiteBiep(string $code, string $traite)
    {
        session_start();
        $mat_iep = $_SESSION['mat_iep'];
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

        $sqlB = "UPDATE dossier, dossier_fav SET dossier.statut_iep2 = '$traite' 
        WHERE dossier.id_dossier ='$code' AND dossier_fav.Id_iep = '$mat_iep'";
        $trai_iepB = $user->query($sqlB);
        $traiter_iepB = $trai_iepB->execute();

        return $traiter_iepB;
    }

    
    // fonction de traitement du dossier
    function traite_dren(string $code, string $traite)
    {
        session_start();
        $mat_dren = $_SESSION['mat_dren'];
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

        $sqlB = "UPDATE dossier, dossier_fav SET dossier.statut_dren2 = '$traite' 
        WHERE dossier.id_dossier ='$code' AND dossier_fav.Id_dren = '$mat_dren'";
        $trai_iepB = $user->query($sqlB);
        $traiter_iepB = $trai_iepB->execute();

        return $traiter_iepB;
    }