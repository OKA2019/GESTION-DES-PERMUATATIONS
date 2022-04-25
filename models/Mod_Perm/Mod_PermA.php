<?php
     
    //recuperation de la liste des dossier non traiter
    function PermAiepNT()
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

        //annee de la permutation
        $statut = $user->query('SELECT annee FROM statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut)');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiersv non traiter
        $listeIEPNT = $user->query("SELECT DISTINCT nom, prenoms, telephone, dossier_deman.id_dossier AS num_doss, iep_souh, dren_souh FROM personnel
        JOIN enseig_demandeur ON enseig_demandeur.annee = $statutAN[0]
        JOIN dossier_deman ON ((personnel.matricule = dossier_deman.matricule) AND (dossier_deman.Id_iep = '$mat_iep'))
        JOIN dossier ON ( (dossier_deman.id_dossier = dossier.id_dossier) AND (statut_iep1 IS NULL)) ");
        $listeIEPNT = $listeIEPNT->fetchAll(PDO::FETCH_CLASS);


        return $listeIEPNT;
    }

    //recuperation de la liste des dossier traiter
    function PermAiepT()
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

        $statut = $user->query('SELECT annee FROM  statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut)');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiers  traiter
        $listeIEPT = $user->query("SELECT DISTINCT nom, prenoms, telephone , iep_souh, dren_souh, statut_iep1 FROM personnel
        JOIN enseig_demandeur ON enseig_demandeur.annee = $statutAN[0]
        JOIN dossier_deman ON ((personnel.matricule = dossier_deman.matricule) AND (dossier_deman.Id_iep = '$mat_iep'))
        JOIN dossier ON ( (dossier_deman.id_dossier = dossier.id_dossier) AND (statut_iep1 IS NOT NULL)) ");
        $listeIEPT = $listeIEPT->fetchAll(PDO::FETCH_CLASS);


        return $listeIEPT;
    }

        /** DREN Traitement de dossiers de permutations */


        
    //recuperation de la liste des dossier non traiter de la dren demandeur
    function PermAdrenNT()
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
        $statut = $user->query('SELECT annee FROM  statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut)');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiersv non traiter
        $PermAdrenNT = $user->query("SELECT DISTINCT nom, prenoms, telephone,dossier.id_dossier AS num_doss, iep_souh, dren_souh FROM personnel
        JOIN enseig_demandeur ON enseig_demandeur.annee = $statutAN[0]
        JOIN dossier_deman ON ((personnel.matricule = dossier_deman.matricule) AND (dossier_deman.Id_dren = '$mat_dren'))
        JOIN dossier ON ( (dossier_deman.id_dossier = dossier.id_dossier) AND (statut_iep1  = 'Accepter' ) AND (statut_dren1 IS NULL)) ");
        $PermAdrenNT = $PermAdrenNT->fetchAll(PDO::FETCH_CLASS);


        return $PermAdrenNT;
    }

    //recuperation de la liste des dossier traiter par la dren
    function PermAdrenT()
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

        $statut = $user->query('SELECT annee FROM  statut where statut.Id_Statut = LAST_INSERT_ID(Id_Statut)');
        $statutAN = $statut->fetch();

        // Faire une jointure pour renvoyer les dossiers  traiter
        $PermAdrenT = $user->query("SELECT DISTINCT nom, prenoms, telephone, iep_souh, dren_souh, statut_dren1 FROM personnel
        JOIN enseig_demandeur ON enseig_demandeur.annee = $statutAN[0]
        JOIN dossier_deman ON ((personnel.matricule = dossier_deman.matricule) AND (dossier_deman.Id_dren = '$mat_dren'))
        JOIN dossier ON ( (dossier_deman.id_dossier = dossier.id_dossier) AND (statut_dren1 IS NOT NULL)) ");
        $PermAdrenT = $PermAdrenT->fetchAll(PDO::FETCH_CLASS);


        return $PermAdrenT;
    }

    // fonction de traitement du dossier par l'iepA
    function traiteIEP(string $code, string $traite)
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

        $sql = "UPDATE dossier,dossier_deman SET statut_iep1 = '$traite' 
        WHERE dossier.id_dossier ='$code' AND dossier_deman.Id_iep = '$mat_iep'";
        $trai_iep = $user->query($sql);
        $traiter_iep = $trai_iep->execute();

        return $traiter_iep;
    }

    
    // fonction de traitement du dossier par la drenA
    function traiteDREN(string $code, string $traite)
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

        $sql = "UPDATE dossier,dossier_deman SET statut_dren1 = '$traite'
        WHERE dossier.id_dossier ='$code' AND dossier_deman.Id_dren = '$mat_dren'";
        $trai_dren = $user->query($sql);
        $traiter_dren = $trai_dren->execute();

        return $traiter_dren;
    }