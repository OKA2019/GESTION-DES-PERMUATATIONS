<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Permutation Enseignant </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/admincss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="admin"> Enseignant </label>

        <ul>
            <li><a class="active" href="#"> Accueil </a></li>
            <li><a href="index.php?page=permuteENSEI"> permutation </a></li>
            <li><a href="index.php?page=seacheannonce"> recherche </a></li>
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
        <div id="corps1">
            <div>
                <form action="controllers/Con_ENSEI/avis.php" method="POST">
                    <fieldset class="corps1">
                        <legend>
                            <h3> Faire une Annonce de permutation </h3>
                        </legend>
                        <div>
                            <div class="formu">
                                <fieldset class="fiel1">
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
                                        <tr>
                                            <td class="td1"> <label for=""> E-Mail : </label> </td>
                                            <td class="td2">
                                                <input type="email" name="mail">
                                            </td>
                                        </tr>
                                        <td class="td1"> <label for=""> Téléphone : </label> </td>
                                        <td class="td2">
                                            <input type="tel" name="tel" required>
                                        </td>
                                        </tr>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset class="fiel1">
                                    <legend>
                                        <h3>Faite votre choix</h3>
                                    </legend>
                                    <table>
                                        <tr>
                                            <td class="td1">
                                                <label for=""> Localité́ : </label>
                                            </td>
                                            <td class="td2">
                                                <input type="text" name="local" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1">
                                                <label for=""> Zone : </label>
                                            </td>
                                            <td class="td2">
                                                <input type="text" name="zone" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1">
                                                <label for=""> DREN : </label>
                                            </td>
                                            <td class="td2">
                                                <input type="text" name="dren" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td1">
                                                <label for=""> IEP : </label>
                                            </td>
                                            <td class="td2">
                                                <input type="text" name="iep">
                                            </td>
                                        </tr>
                                        <td class="td1">
                                            <label for=""> Ecole : </label>
                                        </td>
                                        <td class="td2">
                                            <input type="text" name="ecole">
                                        </td>
                                        </tr>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="formend">
                                <input type="reset" value="Annuler" class="Annuler">
                                <input type="submit" value="Envoyer" class="envoie">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div style ="width:80%;margin-left:10%;margin-right:10%; font-size:12px"> <br> <br>
            <!-- inclusion du fichier qui contient la liste des avis de permuations ou les resultas des demandes de permutations -->
            <?php
                require_once 'perso_retenu-perm.php';
            ?>
        </div>
    </div>
    <div style="text-align: left;padding: 3%;">
        <h3> Aider :</h3>
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
    <?php
    include('views/footer.php');
    ?>
</body>

</html>