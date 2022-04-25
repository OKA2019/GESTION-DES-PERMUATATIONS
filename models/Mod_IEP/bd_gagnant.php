<?php

/** Fonction de selection des gagants */
function gagnant(string $nb_gagnant,string $canne, string $sucre, string $annee)
{
    require 'models/bd_connexion.php';
    $laureat = " SELECT DISTINCT pronostic.matricule,utilisateur.nom, utilisateur.prenom,utilisateur.site,utilisateur.adresse,
    pronostic.ton_canne, pronostic.ton_sucre, pronostic.date
    FROM 
        pronostic, utilisateur, campagne
    WHERE 
        utilisateur.matricule = pronostic.matricule AND pronostic.campagne='$annee'
    ORDER BY ABS(ton_sucre - '$sucre'),ABS(ton_canne - '$canne'),pronostic.date LIMIT $nb_gagnant ";

    $gagnant = $user->query($laureat);

    return $gagnant;

}


/** Fonction qui retourne la pronostic d'un utilisateur */
function uniquepronostic(string $matricule, string $annee)
{
    require 'models/bd_connexion.php';
    $laureat = " SELECT DISTINCT pronostic.matricule,utilisateur.nom, utilisateur.prenom,utilisateur.site,utilisateur.adresse,
    pronostic.ton_canne, pronostic.ton_sucre, pronostic.date
    FROM 
        pronostic, utilisateur, campagne
    WHERE 
        pronostic.matricule = '$matricule'  AND pronostic.campagne='$annee' ";

    $gagnant = $user->query($laureat);

    return $gagnant;

}

/** fonction qui renvoie lae nombre de gagnant */
function resultat_final()
{   
    require 'models/bd_connexion.php';
    $id_resultat = $user->query('SELECT * FROM campagne');
    $tab = $id_resultat->fetchAll(PDO::FETCH_CLASS);
    
    if ($tab)  
    {
        foreach($tab as $nb)
        {
            
            $nombreGagnant = $nb->nb_gagnant;
            $canne = $nb->final_canne;
            $sucre = $nb->final_sucre;
        
        }

        $resultat = array($nombreGagnant,$canne,$sucre);
        return $resultat;
    }
}

/** Fonction qui renvoie l'année de la campagne */
function campagne()
{
    require 'models/bd_connexion.php';

    /** lecture de la campagne en cours */
    $annee = $user->query('SELECT * FROM campagne ');
    $annee = $annee->fetchAll(PDO::FETCH_OBJ);

    foreach($annee as $tab)
    {
        $annee = $tab->campagne;
    }
    if(!empty($annee))
    {
        $annee = $annee;
    }
    else
    {
        $annee = "0";
    }
    return $annee;
}