<!DOCTYPE html>
<html lang="fr">

<head>
    <title> DRH </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/drencss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
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

    <script>
        function signer() {
            var Accepter = document.getElementById('Accepter');
            if (Accepter) {
                if (confirm(" Voulez-vous accorder la demande " + Accepter.value + " de permutatiopns ?")) {
                    window.location = 'controllers/Con_Perm/Accepter_drh.php?numdoss=' + Accepter.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
        }

        function refus() {
            var Refuser = document.getElementById('Refuser');
            if (Refuser) {
                if (confirm(" Voulez-vous refuser la demande " + Refuser.value + " de permutatiopns?")) {
                    window.location = 'controllers/Con_Perm/Refuser_drh.php?numdoss=' + Refuser.value + '';
                } else {

                    alert(" Vous devrez traiter ce dossiers avant la date limite ");

                }
            }
        }
    </script>

</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="admin"> Ressources humaines </label>

        <ul>
            <li><a href="index.php?page=drh"> Accueil </a></li>
            <li><a class="active" href="#"> permutation </a></li>
            <li><a href="index.php?page=seachdrh"> Recherche </a></li>
        </ul>
    </nav>
    <div>
        <?php
        include('controllers/Con_Perm/Con_Permut.php');
        $date = $Con_Permut->recupdate();
        echo ' <marquee >La permutation de l\'année <b>', $date[1], '</b> sont ouvert du Code du <b>', $date[9], '</b> au <b>', $date[10], '</b>
                </marquee> ';

        ?>
    </div>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps"><br><br>
        <div class="permute">
            <!-- Liste des les demandes de permutations-->
            <fieldset class="deman">
                <legend>
                    <h3> Candidature de permutation </h3>
                </legend>
                <div style="width:100%;">
                    <?php
                    require_once 'controllers/Con_Perm/Con_Permut.php';
                    $PermdrhNT = $Con_Permut->PermdrhNT();

                    /** AFFICHAGE DE LA LISTES DES JOUEURS */
                    if (!empty($PermdrhNT)) {
                        /** Lecture des donnees de la BD  */
                        $i = 1;
                        echo " <h3> <br/><br/> Liste des dossiers traiter </h3> ";
                        echo "<table width=\"100%\" style=\"font-size:12px;text-align:center;\" ><tr height=\"55px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
                            <th> N° </th> <th>
                            <table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\" > DEMANDEURS </th></tr><tr><th width=\"34%\"> Noms </th><th width=\"33%\"> IEP </th><th width=\"33%\"> DREN </th></tr></table> </th>  
                            <th><table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\"> FAVORABLES </th></tr><tr><th width=\"34%\"> Noms </th><th width=\"33%\"> IEP </th><th width=\"33%\"> DREN </th></tr></table> </th><th> Actions </th></tr>";
                        foreach ($PermdrhNT as $key => $valeur) {
                            echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\">
                                <td><center> " . $i . " </center></td>";
                            echo "<td><center><table width=\"100%\"><tr>";
                            echo "<td width=\"34%\"><center> " . $valeur->fav_nom . " " . $valeur->fav_prenom . " </center></td>";
                            echo "<td width=\"33%\"><center> " . $valeur->dem_iep . " </center></td>";
                            echo "<td width=\"33%\"><center> " . $valeur->dem_dren . " </center></td>";
                            echo "</tr></table> </center></td>";
                            echo "<td></center><table width=\"100%\"><tr>";
                            echo "<td width=\"34%\"><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                            echo "<td width=\"33%\"> " . $valeur->fav_iep . "</td>";
                            echo "<td width=\"33%\"><center> " . $valeur->fav_dren . " </center></td>";
                            echo "</tr></table> <center> ";
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
                <div style="width:98%;margin-left:1%">
                    <div>
                        <?php
                        $PermdrhT = $Con_Permut->PermdrhT();

                        if (!empty($PermdrhT)) {
                            $i = 1;
                            echo " <h3> <br/><br/> Liste des dossiers traiter </h3> ";
                            echo "<table width=\"100%\" style=\"font-size:12px;text-align:center;\" ><tr height=\"55px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
                            <th> N° </th> <th>
                            <table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\" > DEMANDEURS </th></tr><tr><th width=\"34%\"> Noms </th><th width=\"33%\"> IEP </th><th width=\"33%\"> DREN </th></tr></table> </th>  
                            <th><table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\"> FAVORABLES </th></tr><tr><th width=\"34%\"> Noms </th><th width=\"33%\"> IEP </th><th width=\"33%\"> DREN </th></tr></table> </th><th> Statuts </th></tr>";
                            foreach ($PermdrhT as $key => $valeur) {
                                echo "<tr height=\"30px\" style=\"background-color:#e1e1e1\">
                              <td><center> " . $i . " </center></td>";
                                echo "<td><center><table width=\"100%\"><tr>";
                                echo "<td width=\"34%\"><center> " . $valeur->fav_nom . " " . $valeur->fav_prenom . " </center></td>";
                                echo "<td width=\"33%\"><center> " . $valeur->dem_iep . " </center></td>";
                                echo "<td width=\"33%\"><center> " . $valeur->dem_dren . " </center></td>";
                                echo "</tr></table> </center></td>";
                                echo "<td></center><table width=\"100%\"><tr>";
                                echo "<td width=\"34%\"><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
                                echo "<td width=\"33%\"> " . $valeur->fav_iep . "</td>";
                                echo "<td width=\"33%\"><center> " . $valeur->fav_dren . " </center></td>";
                                echo "</tr></table> <center> ";
                                echo "<td width=\"10%\"><center> " . $valeur->statut_drh . " </center></td>";
                                $i++;
                            }
                            echo "</tr></table>";
                        }
                        ?>
                    </div>
                </div>
            </fieldset><br />
        </div>
        <div style="text-align: left;padding: 3%;">
            <br><br>
            <h3> Aider :</h3>

            <p>
                <br><br>
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