<?php
    /** connexion a la base et envoie le matricule */
    $numDossB = $_GET['numDossB'];
    $signer = "Refuser";
    require 'Con_PermB.php';
    $Con_PermB->traiter_PermB_iep($numDossB, $signer);
