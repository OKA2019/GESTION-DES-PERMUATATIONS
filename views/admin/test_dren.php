<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Administrateur </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/admincss.css">
    <link rel="stylesheet" href="views/css/admincss2.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    <style>
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
            <li><a  href="index.php?page=admin"> Accueil </a></li>
            <li><a href="index.php?page=permute"> permutation </a></li>
            <li><a href="index.php?page=enseiadmin"> Instituteur </a></li>
            <li><a href="index.php?page=iepadmin"> IEP </a></li>
            <li><a class="active" href="#"> DREN </a></li>
            <li><a href="index.php?page=drhadmin"> DRH </a></li>
        </ul>
    </nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <form action="controllers/Con_ENSEI/avis.php" method="POST"><br> <br>
            <fieldset class="corps1">
                <legend>
                    <h3> Ajouter d'une direction régionale </h3>
                </legend>
                <div>
                    <div class="formu">
                        <fieldset class="fiel">
                            <legend>
                                <h3> Directions </h3>
                            </legend>
                            <table>
                                <tr>
                                    <td class="td1"> <label for=""> Identifiant : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="iden">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> MEN : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="men" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Nom : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="nom" required>
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
                        <fieldset class="fiel">
                            <legend>
                                <h3> Responsable </h3>
                            </legend>
                            <table>
                                <tr>
                                    <td class="td1"> <label for=""> Matricule : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="iden" required>
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
                </div>
            </fieldset>
        </form>
    </div>


    <div style="text-align: left;padding: 3%;">
        <br>
    </div>

    <?php
    include('views/footer.php');
    ?>

</body>

</html>