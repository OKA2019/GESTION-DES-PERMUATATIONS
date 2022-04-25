<?php
/** Appel de la class qui va générer le code d'ajout d'un admin */
            
        $anne = $_POST['annee'];
        $statut = $_POST['disponibilite'];
         $debut_ensei = $_POST['debut_ensei'];
         $fin_ensei = $_POST['fin_ensei'];
         $debut_iep = $_POST['debut_iep'];
         $fin_iep = $_POST['fin_iep'];
         $debut_dren = $_POST['debut_dren'];
         $fin_dren = $_POST['fin_dren'];
         $debut_drh = $_POST['debut_drh'];
         $fin_drh = $_POST['fin_drh'];

         require 'Con_Permut.php';
         $Con_Permut->Addstatut(
         $anne, $statut, 
         $debut_ensei, $fin_ensei, 
         $debut_iep, $fin_iep, 
         $debut_dren, $fin_dren, 
         $debut_drh, $fin_drh);



