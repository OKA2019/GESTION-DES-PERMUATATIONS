<?php

//Fonction de recuperations des dossiers de permutations non traiter en fonctions de la dren
function recup_last_statut()
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
    $stat = $user->query('SELECT annee, statut, fin_ensei, debut_ensei, debut_iep, fin_iep, debut_dren, fin_dren, debut_drh, fin_drh FROM statut WHERE Id_Statut = LAST_INSERT_ID(Id_Statut)');
    $recup = $stat->fetchAll(PDO::FETCH_CLASS);
    foreach ($recup as $key => $statut) {
        $annee = $statut->annee;
        $stat = $statut->statut;
        $debut_ensei = $statut->debut_ensei;
        $fin_ensei = $statut->fin_ensei;
        $debut_iep = $statut->debut_iep;
        $fin_iep = $statut->fin_iep;
        $debut_dren = $statut->debut_dren;
        $fin_dren = $statut->fin_dren;
        $debut_drh = $statut->debut_drh;
        $fin_drh = $statut->fin_drh;
    }

    return array($debut_iep, $fin_iep, $debut_dren, $fin_dren, $debut_drh, $fin_drh, $annee,$stat, $debut_ensei, $fin_ensei);
}
