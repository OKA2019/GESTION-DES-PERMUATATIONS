<?php

    /** appel de la fonction addadmin dans la class Classadmin et dit a quoi correspond la solution de cette methode */
    function idmodif(string $id, string $nom, string $prenom,float $numero)
    {
                
        require_once '../models/bd_connexion.php';
        $modif = "UPDATE administrateur SET matricule = $nom, nom = $prenom ,prenom = $prenom, contact = numero
        WHERE id_admin = $id ";
        $admin = $user->exec($modif);
    }
