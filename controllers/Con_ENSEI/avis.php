<?php 

        $nom = $_POST['nom'];
        $prenom = $_POST['prenoms'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $local = $_POST['local'];
        $dren = $_POST['dren'];
        $iep = $_POST['iep'];
        $ecole = $_POST['ecole'];

        // Appel de la fonction qui permet d'envoyer les resultats
        require '../../models/Mod_Ensei/Mod_ENSEI.php';
        $add = addavis();
        if($add == true)
        {
            echo "<script type=\"text/javascript\">";
            echo " alert('Votre avis de permutation a bien été prise en compte');";
            echo "window.location = '../../index.php?page=ensei';";
            echo "</script>";
        }
       