<?php
/** Appel de la class qui va générer le code d'ajout d'un admin */
    
        $matricule = $_POST['matricule'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenoms'];
         $adresse = $_POST['adresse'];
         $mail = $_POST['mail'];
         $tel = $_POST['tel'];
         require 'ConAdmin.php';
         $ConAdmin->AddAdmin($matricule, $nom, $prenom, $adresse, $mail, $tel);



