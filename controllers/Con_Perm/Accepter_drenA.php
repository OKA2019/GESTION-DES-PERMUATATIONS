<?php
    /** connexion a la base et envoie le matricule */
    $numdoss = $_GET['numdoss'];
    $signer = "Accepter";
    require 'Con_PermA.php';
    $Con_PermA->traiter_PermA_dren($numdoss, $signer);
