<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Administrateur </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/admincss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    <style>
        .fiel {
            width: 38%;
            border: 1px solid green;
            border-radius: 20px;
            padding: 2%;
        }

        .ref {
            width: 80%;
            text-align: center;
            margin-left: 10%;
            margin-right: 10%;
            border: 1px solid green;
            border-radius: 20px;
            padding: 2%;
        }

        .MEN {
            width: 250px;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            margin-bottom: 20px;
            float: center;
            text-align: center;
            line-height: 50px;
            background-color: whitesmoke;
            border-radius: 40px;
            box-shadow: 0px 2px 6px rgba(32, 32, 32, 0.5);
        }

        .dren {
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .liste {
            width: 120px;
            height: 80px;
            margin: 20px;
            padding-top: 30px;
            border-radius: 40px;
            background-color: green;
            background-position: center;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            opacity: 0.6;
            cursor: pointer;
        }

        .drh {
            padding: 12px 120px;
            border-radius: 40px;
            background-color: green;
            background-position: center;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            opacity: 0.6;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="admin"> Administrateur </label>

        <ul>
            <li><a class="active" href="#"> Accueil </a></li>
            <li><a href="index.php?page=permute"> permutation </a></li>
            <li><a href="index.php?page=seachadmin"> recherche </a></li>
        </ul>
    </nav>
    <fieldset class="MEN">
        <div class="dren">
            <a class="liste" href="index.php?page=enseiadmin">
                Instituteurs
            </a>
            <a class="liste" href="index.php?page=ecole">
                Ecoles
            </a>
        </div>
        <div class="dren">
            <a class="liste" href="index.php?page=iepadmin">
                IEP
            </a>
            <a class="liste" href="index.php?page=drenadmin">
                DREN
            </a>
        </div>
        <div>
            <a class="drh" href="index.php?page=drhadmin">
                DRH
            </a>
        </div>
    </fieldset>

    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <form action="controllers/Con_Admin/AddAdmin.php" method="POST"><br> <br>
            <fieldset class="corps1">
                <legend>
                    <h3> Ajouter un administrateur </h3>
                </legend>
                <div class="formu">
                    <fieldset class="fiel">
                        <legend>
                            <h3> Indentifant </h3>
                        </legend>
                        <table>
                            <tr>
                                <td class="td1"> <label for=""> Matricule : </label> </td>
                                <td class="td2">
                                    <input type="text" name="matricule" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1"> <label for=""> Nom : </label> </td>
                                <td class="td2">
                                    <input type="text" name="nom" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1"> <label for=""> Prénoms : </label> </td>
                                <td class="td2">
                                    <input type="text" name="prenoms" required>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset class="fiel">
                        <legend>
                            <h3> Coordonnées </h3>
                        </legend>
                        <table>
                            <tr>
                                <td class="td1"> <label for=""> Adresse : </label> </td>
                                <td class="td2">
                                    <input type="text" name="adresse" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1"> <label for=""> E-mail : </label> </td>
                                <td class="td2">
                                    <input type="mail" name="mail" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1">
                                    <label for=""> Téléphone : </label>
                                </td>
                                <td class="td2">
                                    <input type="tel" name="tel" required>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div class="formend">
                    <input type="reset" value="Annuler" class="Annuler">
                    <input type="submit" value="Envoyer" class="envoie">
                </div>
            </fieldset>
        </form>
    </div>
    <div style="text-align:center"><br><br><br>
        <!-- inclusion du fichier qui contient la liste des administrateur -->
        <?php
        require_once 'controllers/Con_admin/ConAdmin.php';
        $admin = $ConAdmin->listeadministateur();

        $i = 1;
        echo "<h3 style=\"font-size:20px\"> Liste des gestionnaires </h3><br/>";
        echo "<table border='0.5' width=\"98%\"><tr height=\"50px\" style=\"color:white;background-color: green;\" >
        <th> N° </th> <th> Nom et Prénoms </th><th> Adresse  </th> <th> E-Mail  </th><th> Contact  </th><th width=\"25%\"> Actions </th> </tr>";
        foreach ($admin as $key => $valeur) {
            echo "<tr height=\"40px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></h4></td>";
            echo "<td><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
            echo "<td><center> " . $valeur->adresse . " </center></td>";
            echo "<td><center> " . $valeur->mail . " </center></td>";
            echo "<td><center> " . $valeur->telephone . " </center></td>";
            echo "
            <td><table width=\"100%\"> <tr><th><a href=\" #\"  style=\"background: none; color: black;\" > Ajouter </a></th>
            <th><a href=\"views/admin/update.php?id=$valeur->matricule \" style=\"background: none; color: black;\" > Modifier </a></th>
            <th><a href=\"controllers/Con_admin/delAdmin.php?matricule=$valeur->matricule \"  style=\"background: none; color: black;\"> Supprimer </a></th>
            </tr>
            </table></td>";
            $i++;
        }
        echo "</tr></table>";
        ?>

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

    <?php
    include('views/footer.php');
    ?>

</body>

</html>