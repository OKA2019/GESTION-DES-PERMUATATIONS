<?php
    /** connexion a la base et envoie le matricule */
    $numdoss = $_GET['numdoss'];
    $signer = "Accepter";
    require 'Con_Permut.php';
    $Con_Permut->traiter_Perm_drh($numdoss, $signer);
