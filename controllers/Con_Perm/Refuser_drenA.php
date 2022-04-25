<?php
    /** connexion a la base et envoie le matricule */
    $numdoss = $_GET['numdoss'];
    $signer = "Refuser";

    require 'Con_PermA.php';
    $Con_PermA->traiter_PermA_dren($numdoss, $signer);
