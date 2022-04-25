<?php
    /** connexion a la base et envoie le matricule */
    $matricule = $_POST['matricule'];
    $user = $_POST['choix'];

    require 'authen.php';
    $authen = new Authen();
    $authen->identification($matricule,$user);
