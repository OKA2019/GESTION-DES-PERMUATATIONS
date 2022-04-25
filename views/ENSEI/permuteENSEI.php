<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Permutation Enseignant </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/enseigncss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    <style>
        .connect {
            width: 350px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            padding: 30px;
            text-align: center;
            line-height: 30px;
            background-color: whitesmoke;
            border-radius: 20px;
            margin-bottom: 50px;

        }
    </style>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="admin"> Enseignant </label>

        <ul>
            <li><a href="index.php?page=ensei"> Accueil </a></li>
            <li><a class="active" href="#"> permutation </a></li>
            <li><a href="index.php?page=seacheannonce"> Recherche </a></li>
        </ul>
    </nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <div>
            <?php
            include('controllers/Con_Perm/Con_Permut.php');
            $date = $Con_Permut->recupdate();
            echo ' <marquee >La permutation de l\'année <b>', $date[1], '</b> sont ouvert du Code du <b>', $date[3], '</b> au <b>', $date[4], '</b>
                </marquee> ';

            ?>
        </div>


        <div> <br> <br>
            <!-- inclusion du fichier qui contient la liste des administrateur -->
            <?php
            $code = $Con_Permut->CodeDossier();

            if (!empty($code[0]) and $code[1] == true) {

                echo ' 
                    <div style="text-align: center;margin-bottom: -70px;">
                                    <div class="connect">
                                        Votre demande de permutation a été prise en compte. Merci, de transpermetre le code du dossier à la personne favorable !
                                        <br><br>
                                        Code du dossier : <b>', $code[0], '</b>
                                    </div>
                    </div> ';
            } else {
            ?>
        </div>

        <div id="corps1">
            <div>
                <form action="controllers/Con_ENSEI/demande.php" method="POST">
                    <legend>
                        <h3> DEMANDE DE PERMUTATION </h3>
                        <h4> ANNEE SCOLAIRE 2020 / 2021 </h4> <br>
                        <i style="font-weight: normal;text-align:left;">
                            <b> NB : </b>
                            Tout demande validée ne peut être annulée
                        </i>
                    </legend>

                    <fieldset class="corps1">
                        <div>
                            <i> Tout les champs sont obligatoires </i>
                            <div class="formu">
                                <fieldset class="fiel1">
                                    <legend>
                                        <h3> Vos Indentifants </h3>
                                    </legend>
                                    <table>
                                        <tr>
                                            <td class="td1"> <label for=""> Matricule<span style="color:red">*</span> : </label> </td>
                                            <td class="td2">
                                                <input type="text" name="matricule" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1"> <label for=""> Nom<span style="color:red">*</span> : </label> </td>
                                            <td class="td2">
                                                <input type="text" name="nom" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1"> <label for=""> Prénoms<span style="color:red">*</span> : </label> </td>
                                            <td class="td2">
                                                <input type="nom" name="prenoms" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1"> <label for=""> Fonction <span style="color:red">*</span> </label> </td>
                                            <td class="td2">
                                                <input type="text" name="fonction" required>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset class="fiel2">
                                    <legend>
                                        <h3> Vos Coordonnés administratifs </h3>
                                    </legend>
                                    <table>
                                        <tr>
                                            <td class="td1"> <label for=""> Direction regionnale<span style="color:red">*</span> </label> </td>
                                            <td class="td2">
                                                <input type="text" name="region" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1"> <label for=""> Inspection <span style="color:red">*</span> </label> </td>
                                            <td class="td2">
                                                <input type="text" name="inspection" required>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset class="fiel3">
                                    <legend>
                                        <h3> Administration souhaité </h3>
                                    </legend>
                                    <table>
                                        <tr>
                                            <td class="td1"> <label for=""> Direction regionnale<span style="color:red">*</span> </label> </td>
                                            <td class="td2">
                                                <input type="text" name="regionshou" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1"> <label for=""> Inspection <span style="color:red">*</span> </label> </td>
                                            <td class="td2">
                                                <input type="text" name="inspectionshou" required>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="formend">
                                <input type="reset" value="annuler" class="Annuler">
                                <input type="submit" value="valider" class="envoie">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        <?php }  ?>
        <div>
            <form action="controllers/Con_ENSEI/favorable.php" method="POST">
                <legend>
                    <h3>
                        <br><br><br> REPONSE A UNE DEMANDE DE PERMUTATION
                    </h3>
                    <h4> ANNEE SCOLAIRE 2020 / 2021 </h4> <br>
                    <i style="font-weight: normal;text-align:left;">
                        <b> NB : </b>
                        Tout demande validée ne peut être annulée
                    </i>
                </legend>

                <fieldset class="corps1">
                    <div>
                        <i> Tout les champs sont obligatoires </i>
                        <div class="formu">
                            <fieldset class="fiel1">
                                <legend>
                                    <h3> Vos Indentifants </h3>
                                </legend>
                                <table>
                                    <tr>
                                        <td class="td1"> <label for=""> Matricule<span style="color:red">*</span> : </label> </td>
                                        <td class="td2">
                                            <input type="text" name="matricule" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td1"> <label for=""> Nom<span style="color:red">*</span> : </label> </td>
                                        <td class="td2">
                                            <input type="text" name="nom" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td1"> <label for=""> Prénoms<span style="color:red">*</span> : </label> </td>
                                        <td class="td2">
                                            <input type="nom" name="prenoms" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td1"> <label for=""> Fonction <span style="color:red">*</span> </label> </td>
                                        <td class="td2">
                                            <input type="text" name="fonction" required>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset class="fiel2">
                                <legend>
                                    <h3> Vos Coordonnés administratifs </h3>
                                </legend>
                                <table>
                                    <tr>
                                        <td class="td1"> <label for=""> Direction regionnale<span style="color:red">*</span> </label> </td>
                                        <td class="td2">
                                            <input type="text" name="region" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td1"> <label for=""> Inspection <span style="color:red">*</span> </label> </td>
                                        <td class="td2">
                                            <input type="text" name="inspection" required>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset class="fiel3">
                                <legend>
                                    <h3> Completer le dossier </h3>
                                </legend>
                                <table>
                                    <tr>
                                        <td class="td1"> <label for=""> Code du dossier <span style="color:red">*</span> </label> </td>
                                        <td class="td2">
                                            <input type="text" name="codedoss" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td1"> <label for="">Consentement<span style="color:red">*</span> </label> </td>
                                        <td class="td2">
                                            <select name="choix" id="choix" style=" height: 26px; width: 150px;" required>
                                                <option value=""> ---------------------------- </option>
                                                <option name="choix"> Accepter </option>
                                                <option name="choix"> Réfuser </option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                        <div class="formend">
                            <input type="reset" value="annuler" class="Annuler">
                            <input type="submit" value="valider" class="envoie">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>


        </div>

        <div style="text-align: left;padding: 3%;">
            <br><br>
            <h3> Condition :</h3>
            <p>
                <br><br>
                &nbsp; &nbsp; &nbsp; Le processus de permutation implique directement trois entités : - le demandeur « A » et sa hiérarchie directe (son inspection et sa Direction Régionale de l’Enseignement National) ;
                - la personne favorable « B » à cet avis de permutation et sa hiérarchie directe (son inspection et sa Direction Régionale de l’Enseignement National) ;
                - la Direction des Ressources Humaines du MEN.
                Dans un ordre chronologique, sont détaillées ci-dessous les différentes étapes détaillées : 1- Tout enseignant du préscolaire ou du primaire peut mûrir l’idée de faire une permutation et entamer les démarches pour y parvenir.
                2- Le demandeur fait des affiches d’annonce de son avis de permutation.
                3- Le demandeur colle ses affiches dans l’inspection dans laquelle il souhaite aller et à la DRH du MEN. Il publie également son avis sur les réseaux sociaux et en parle autour de lui afin d’atteindre le plus grand nombre de personnes dans l’espoir de trouver un collègue favorable à son avis.

            </p>
        </div>
    </div>
    <!-- inclusion du fichier qui contient la liste des administrateur -->

    <br /><br />
    <?php
    include('views/footer.php');
    ?>
</body>

</html>