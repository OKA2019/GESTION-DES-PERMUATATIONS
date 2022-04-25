<!DOCTYPE html>
<html lang="fr">

<head>
    <title> IEP </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/drencss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    <script>
        function signer() {
            var Accepter = document.getElementById('Accepter');
            var AccepterF = document.getElementById('AccepterF');
            if (Accepter) {
                if (confirm(" Voulez-vous accorder la demande " + Accepter.value + " de permutatiopns ?")) {
                    window.location = 'controllers/Con_Perm/Accepter_iepA.php?numdoss=' + Accepter.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
            if(AccepterF)
            {
                if (confirm(" Voulez-vous accorder la demande " + AccepterF.value + " de permutatiopns ?")) {
                    window.location = 'controllers/Con_Perm/Accepter_iepB.php?numDossB=' + AccepterF.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
        }

        function refus() {
            var Refuser = document.getElementById('Refuser');
            var RefuserF = document.getElementById('RefuserF');
            if (Refuser) {
                if (confirm(" Voulez-vous refuser la demande " + Refuser.value + " de permutatiopns?")) {
                    window.location = 'controllers/Con_Perm/Refuser_iepA.php?numdoss=' + Refuser.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
            
            if(RefuserF)
            {
                if (confirm(" Voulez-vous accorder la demande " + RefuserF.value + " de permutatiopns ?")) {
                    window.location = 'controllers/Con_Perm/Refuser_iepB.php?numDossB=' + RefuserF.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
        }
    </script>
    <style>
        .permute {
            width: 98%;
            margin-left: 1%;
            margin-right: 1%;
        }

        .deman,
        .favora {
            width: 80%;
            margin-left: 10%;
            text-align: center;
            border: 1px solid green;
            border-radius: 20px;
            padding: 1%;


        }
    </style>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="admin"> Inspection </label>

        <ul>
            <li><a href="index.php?page=iep"> Accueil </a></li>
            <li><a class="active" href="#"> permutation </a></li>
            <li><a href="index.php?page=seachIEP"> Recherche </a></li>
        </ul>
    </nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <div>
            <marquee>
                La permutation de l'année 2021 sont ouvert du 17/06/2021 au 17/10/2021
            </marquee>
        </div><br />
        <div class="permute">
            <!-- Liste des les demandes de permutations-->
            <fieldset class="deman">
                <legend>
                    <h3> Candidature de permutation </h3>
                </legend>
                
                
                <div style="width:100;">
                    <?php
                    
                    require_once 'controllers/Con_Perm/Con_PermA.php';
                    $liste = $Con_PermA->PermAiepNT();
                    $traiter = $Con_PermA->PermAiepT();

                    if (!empty($liste)) {
                        /** Liste des candidatures non traiter  */
                        $i = 1;
                        echo " <h3> <br/><br/> Liste des dossiers non traiter </h3> ";
                        echo "<table width=\"100%\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;font-size:12px\" >
                            <th> N° </th> <th>Noms demandeur </th> <th> Contacts </th> <th> IEP Souhaite </th> <th> DREN Souhaite </th><th> Actions </th></tr>";
                        foreach ($liste as $key => $valeur) {
                            echo "<tr height=\"30px\" style=\"background-color:#e1e1e1;font-size:14px\">
                            <td style=\"width:2%\"><center> " . $i . " </center></td>";
                            echo "<td style=\"width:30%\"><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                            echo "<td style=\"width:10%\"><center> " . $valeur->telephone . " </center></td>";
                            echo "<td style=\"width:22%\"><center> " . $valeur->iep_souh . " </center></td>";
                            echo "<td style=\"width:18%\"><center> " . $valeur->dren_souh . " </center></td>";
                            echo "<td style=\"width:20%\"><center>
                            <table width=\"100%\"> <tr>
                            <th><option id=\"Accepter\" name=\"dossier\" value=\"$valeur->num_doss\" onclick=\"signer()\" style=\"font-weight: bold;text-decoration: none; color: black;cursor:pointer;\" > Accepter </option></th>
                            <th><option  id=\"Refuser\" name=\"dossier\" value=\"$valeur->num_doss\" onclick=\"refus()\" style=\"font-weight: bold;text-decoration: none; color: black;cursor:pointer;\"> Rejeter </option></th></tr></table>
                            </center></td>";
                            $i++;
                        }
                        echo "</tr></table>";
                    } else {
                        echo " <div style=\"height:30px;padding-top:10px;text-align:center;background-color: gold;font-size:16px;opacity: 0.5;border-radius: 20px;\">  
                            <b><i> Vous n'aviez pas de dossier à traiter </i></b> 
                        </div>";
                    }
                    ?>
                </div>
                <div style="width:100%;">
                <?php

                    if (!empty($traiter)) {
                        /** Liste des candidatures traiter  */
                        $i = 1;
                        echo " <h3><br/><br/> Liste des dossiers traiter </h3> ";
                        echo "<table width=\"100%\" style=\"border-raduis:20px;font-size:12px;\" ><tr height=\"40px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
                               <th> N° </th> <th>Noms demandeur </th> <th> Contacts </th> <th> IEP Souhaite </th> <th> DREN Souhaite </th><th> Statut </th></tr>";
                        foreach ($traiter as $key => $valeur) {
                            echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></td>";
                            echo "<td style=\"width:30%\"><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                            echo "<td ><center> " . $valeur->telephone . " </center></td>";
                            echo "<td><center> " . $valeur->iep_souh . " </center></td>";
                            echo "<td><center> " . $valeur->dren_souh . " </center></td>";
                            echo "<td><center> " . $valeur->statut_iep1 . " </center></td>";
                            $i++;
                        }
                        echo "</tr></table>";
                    }
                ?>
                </div>
            </fieldset><br />

            <!-- Liste des les demandes de permuations favorables-->
            <fieldset class="favora">
                <legend>
                    <h3> Candidature favorables </h3>
                </legend>
                <div style="width:98%;margin-left:1%">
                    <div>
                        <?php
                        require_once 'controllers/Con_Perm/Con_PermB.php';
                        $AtraiterB = $Con_PermB->PermBiepNT();
                        $signerB = $Con_PermB->PermBiepT();

                        /** AFFICHAGE DE LA LISTES DES JOUEURS */
                        if (!empty($AtraiterB)) {
                        /** Liste des dossiers favorables non traiter non traiter  */
                            $i = 1;
                            echo " <h3> <br/><br/> Liste des dossiers non traiter </h3> ";
                            echo "<table width=\"100%\" style=\"font-size:12px;\" ><tr height=\"60px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
                            <th> N° </th> <th><table width=\"100%\"><tr><th colspan=\"100%\" height=\"30px\"> FAVORABLES </th></tr><tr><th> Noms </th><th> Contacts</th></tr></table> </th> 
                            <th><table width=\"100%\"><tr><th colspan=\"100%\" height=\"30px\"> DEMANDEURS </th></tr><tr><th> IEP </th><th> DREN </th><th> Noms </th></tr></table> </th><th> Actions </th></tr>";
                            foreach ($AtraiterB as $key => $valeur) {
                                echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\">
                                <td><center> " . $valeur->num_dossF . " </center></td>";
                                echo "<td><table width=\"100%\"><tr>";
                                echo "<td><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                                echo "<td><center> " . $valeur->telephone . " </center></td>";
                                echo "</tr></table> </td>";
                                echo "<td><table width=\"100%\"><tr>";
                                echo "<td><center> " . $valeur->dem_iep . " </center></td>";
                                echo "<td><center> " . $valeur->dem_dren . " </center></td>";
                                echo "<td><center> " . $valeur->dem_nomC . " " . $valeur->dem_prenomC . " </center></td>";
                                echo "</tr></table> </td>";
                                echo "<td width=\"20%\"><center>
                                <table width=\"100%\"> <tr>
                                <th><option id=\"AccepterF\" name=\"dossierF\" value=\"$valeur->num_dossF\" onclick=\"signer()\" style=\"font-weight: bold;text-decoration: none; color: black;cursor:pointer;\" > Accepter </option></th>
                                <th><option  id=\"RefuserF\" name=\"dossierF\" value=\"$valeur->num_dossF\" onclick=\"refus()\" style=\"font-weight: bold;text-decoration: none; color: black;cursor:pointer;\"> Rejeter </option></th></tr></table>
                                </center></td>";
                                $i++;
                            }
                            echo "</tr></table>";
                        } else {
                            echo " <div style=\"height:30px;padding-top:10px;text-align:center;background-color: gold;font-size:16px;opacity: 0.5;border-radius: 20px;\">  
                                <b><i> Vous n'aviez pas de dossier à traiter </i></b> 
                            </div>";
                        }
                        ?>
                    </div>
                </div>
                <div style="width:100%;">
                    <?php
                        if (!empty($signerB)) {
                            /** Liste des dossiers favorables traiter non traiter  */
                            $i = 1;
                            echo " <h3> <br/><br/> Liste des dossiers traiter </h3> ";
                            echo "<table width=\"100%\" style=\"font-size:12px;\" ><tr height=\"60px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
                            <th> N° </th> <th><table width=\"100%\"><tr><th colspan=\"100%\" width=\"35%\" height=\"30px\"> FAVORABLES </th></tr><tr><th width=\"75%\"> Noms </th><th width=\"25%\"> Contacts</th></tr></table> </th> 
                            <th><table width=\"100%\"><tr><th colspan=\"100%\" width=\"50%\" height=\"30px\"> DEMANDEURS </th></tr><tr><th> IEP </th><th> DREN </th><th> Noms </th></tr></table> </th><th width=\"14%\"> Statut </th></tr>";
                            foreach ($signerB as $key => $valeur) {
                                echo "<tr height=\"30px\" style=\"background-color:#e1e1e1;font-size:12px;\">
                                <td width=\"1%\"><center> " . $valeur->num_dossF. " </center></td>";
                                echo "<td width=\"35%\"><table width=\"100%\"><tr>";
                                echo "<td width=\"75%\"><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                                echo "<td width=\"25%\"><center> " . $valeur->telephone . " </center></td>";
                                echo "</tr></table> </td>";
                                echo "<td><table width=\"100%\"><tr>";
                                echo "<td width=\"30%\"><center> " . $valeur->dem_iep . " </center></td>";
                                echo "<td width=\"30%\"><center> " . $valeur->dem_dren . " </center></td>";
                                echo "<td width=\"40%\"><center> " . $valeur->dem_nomC . " " . $valeur->dem_prenomC . " </center></td>";
                                echo "</tr></table> </td>";
                                echo "<td width=\"14%\"><center> " . $valeur->statut_iep2 . " </center></td>";
                                $i++;
                            }
                            echo "</tr></table>";
                        }

                    ?>
                </div>
            </fieldset>
        </div>
    </div>

    <div style="text-align: left;padding: 3%;">
        <h3> Aider :</h3>
        &nbsp; &nbsp; &nbsp; Le processus de permutation implique directement trois entités : - le demandeur « A » et sa hiérarchie directe (son inspection et sa Direction Régionale de l’Enseignement National) ;
        - la personne favorable « B » à cet avis de permutation et sa hiérarchie directe (son inspection et sa Direction Régionale de l’Enseignement National) ;
        - la Direction des Ressources Humaines du MEN.
        Dans un ordre chronologique, sont détaillées ci-dessous les différentes étapes détaillées : 1- Tout enseignant du préscolaire ou du primaire peut mûrir l’idée de faire une permutation et entamer les démarches pour y parvenir.
        2- Le demandeur fait des affiches d’annonce de son avis de permutation.
        3- Le demandeur colle ses affiches dans l’inspection dans laquelle il souhaite aller et à la DRH du MEN. Il publie également son avis sur les réseaux sociaux et en parle autour de lui afin d’atteindre le plus grand nombre de personnes dans l’espoir de trouver un collègue favorable à son avis.
        4- L’avis peut-être consultée par toutes personnes se rendant dans les canaux dans lesquels elle a été publiée.
        5- Si l’offre n’attire personne, l’enseignant demandeur restera dans sa localité́. Par contre, si l’offre intéresse un collègue, ce dernier contacte le demandeur pour lui faire part de son intérêt et lui transmet les informations nécessaires afin que celui-ci entame les démarches auprès de son inspection. Il patiente jusqu’à la validation du dossier par le Directeur de la DREN de celui-ci et la réception du dossier de la part du demandeur.
        6- Ayant reçu les informations du collègue favorable à la permutation, le demandeur imprime deux exemplaires d’une fiche à renseigner.
        7- Le demandeur renseigne soigneusement les fiches imprimées.
        8- Il dépose par la suite cette fiche dans son inspection d’enseignement primaire.
        9- Dans cette inspection, le dossier est vérifié́ afin de s’assurer de sa conformité́ aux exigences demandées.
        10- À la suite de ces vérifications, l’inspecteur donne son accord ou pas pour la permutation.
        la publication de la liste des avis de permutation, les deux enseignants vérifient s’ils sont de cette liste. Si oui, chacun se rend à la DRH du MEN, sise à Abidjan Plateau pour retirer « l'acte de permutation » signé par le DRH.

        </p>
        <br>
    </div>
    </div>

    <?php
    include('views/footer.php');
    ?>
</body>

</html>