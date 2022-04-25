<?php 

         $mat = $_POST['matricule'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenoms'];
         $fonction = $_POST['fonction'];
         $dren = $_POST['region'];
         $iep = $_POST['inspection'];
         $code = $_POST['codedoss'];
         $choix = $_POST['choix'];

        require_once '../Con_Perm/Con_Permut.php';
        $favo = new Con_Permut();
       $favo->AddFavorable($mat, $nom, $prenom, $fonction, $iep, $dren, $code, $choix);


