<?php 

         $mat = $_POST['matricule'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenoms'];
         $fonction = $_POST['fonction'];
         $dren = $_POST['region'];
         $iep = $_POST['inspection'];
         $drenshou = $_POST['regionshou'];
         $iepshou = $_POST['inspectionshou'];

        require_once '../Con_Perm/Con_Permut.php';
        $demande = new Con_Permut();
       $demande->AddDemande($mat, $nom, $prenom, $fonction, $iep, $dren, $iepshou, $drenshou);


