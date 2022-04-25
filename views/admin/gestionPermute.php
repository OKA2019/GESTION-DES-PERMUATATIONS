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
            width: 42%;
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
            <li><a href="index.php?page=admin"> Accueil </a></li>
            <li><a class="active" href="#"> permutation </a></li>
            <li><a href="index.php?page=seachadmin"> recherche </a></li>
        </ul>
    </nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <div id="corps1">
            <form action="controllers/Con_Perm/addstatut.php" method="POST">
                <fieldset class="corps1">
                    <legend>
                        <h3> Disponibilités de la permutation </h3>
                    </legend>
                    <fieldset class="ref">
                        <legend>
                            <h3> Références </h3>
                        </legend>
                        <div style="width: 80%;display:flex;margin-left:10%;">
                            <div style="width:50%;display:flex;">
                                <label for=""> Année : </label>
                                <div style="width: 50%; float:right">
                                    <input type="number" name="annee" required>
                                </div>
                            </div>
                            <div style="width:50%;display:flex;">
                                <label for=""> Statut : </label>
                                <div style="width: 60%;">
                                    <select name="disponibilite" id="selection" required>
                                        <option value=""> ---------------------------- </option>
                                        <option name="disponibilite"> Activer </option>
                                        <option name="disponibilite"> Désactiver </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset> <br>
                    <div class="formu">
                        <fieldset class="fiel">
                            <legend>
                                <h3> Debut de permutation </h3>
                            </legend>
                            <table>
                                <tr>
                                    <td class="td1"> <label for=""> Enseignant : </label> </td>
                                    <td class="td2">
                                        <input type="date" name="debut_ensei" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Inspections : </label> </td>
                                    <td class="td2">
                                        <input type="date" name="debut_iep" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Directions regionale : </label> </td>
                                    <td class="td2">
                                        <input type="date" name="debut_dren" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Ressources Humaines : </label> </td>
                                    <td class="td2">
                                        <input type="date" name="debut_drh">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset class="fiel">
                            <legend>
                                <h3>Fin de permuattion</h3>
                            </legend>
                            <table>
                                <tr>
                                    <td class="td1">
                                        <label for=""> Enseignant : </label>
                                    </td>
                                    <td class="td2">
                                        <input type="date" name="fin_ensei" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1">
                                        <label for=""> Inspection : </label>
                                    </td>
                                    <td class="td2">
                                        <input type="date" name="fin_iep" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1">
                                        <label for=""> Direction régionale : </label>
                                    </td>
                                    <td class="td2">
                                        <input type="date" name="fin_dren" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1">
                                        <label for="">Ressources humaines : </label>
                                    </td>
                                    <td class="td2">
                                        <input type="date" name="fin_drh" required>
                                    </td>
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
    <div style="text-align:center"><br><br>
        <!-- inclusion du fichier qui contient la liste des administrateur -->
        <?php
        require_once 'controllers/Con_admin/ConAdmin.php';
        $statut = $ConAdmin->last_statut();
       echo "<h3> Informations de l'annee en cours </h3> ";
        echo "<br>
                <table width=\"94%\" style=\"margin-left:3%\">
                <tr height=\"50px\" style=\"color:white;background-color: green;\" >
                    <th> Annee </th><th> Statut </th><th> Début Enseigant </th><th> Fin Enseigant </th><th> Début IEP </th><th> Fin IEP </th>
                    <th> Début DREN </th><th> Fin DREN </th><th> Début DRH </th><th> Fin DRH </th>
                    </tr>
                    <tr height=\"40px\" style=\"background-color:#e1e1e1\">
                        <td>
                        " . $statut[6] . "
                        </td>
                        <td>
                        " . $statut[7] . "
                        </td>
                        <td>
                        " . $statut[8] . "
                        </td>
                        <td>
                        " . $statut[9] . "
                        </td>
                        <td>
                        " . $statut[0] . "
                        </td>
                        <td>
                        " . $statut[1] . "
                        </td>
                        <td>
                        " . $statut[2] . "
                        </td>
                        <td>
                        " . $statut[3] . "
                        </td>
                        <td>
                        " . $statut[4] . "
                        </td>
                        <td>
                        " . $statut[5] . "
                        </td>
                    </tr>
                </table>";

        ?>

    </div> <br> <br> <br>
    <?php
    include('views/footer.php');
    ?>

</body>

</html>