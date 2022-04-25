<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Administrateur </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/admincss.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <style>
        
    .fiel{
        width: 38%;
        border: 1px solid green;
        border-radius: 20px;
        padding: 2%;
    }
    .ref{
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
            <li><a class="active" href="../../index.php?page=admin""> Accueil </a></li>
            <li><a href="../../index.php?page=permute"> permutation </a></li>
            <li><a href="../../index.php?page=seachadmin"> recherche </a></li>
        </ul>
    </nav>
<center>

<p>

<?php
    
require '../../controllers/Con_Admin/ConAdmin.php';
$admin = $ConAdmin->listeadmin();
foreach($admin as $key => $valeur): ?>
    <?php if($valeur->matricule == $_GET['id']) : ?>

<br/>
<p>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <form action="../../controllers/Con_Admin/updateadmin.php?id=<?php echo $valeur->matricule; ?>" method="POST"><br> <br>
            <fieldset class="corps1">
                <legend>
                    <h3> Modifier vos informations </h3>
                </legend>
                    <div class="formu">
                        <fieldset class="fiel">
                            <legend>
                                <h3> Indentifant </h3>
                            </legend>
                            <table >
                                <tr>
                                    <td class="td1"> <label for=""> Matricule : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="matricule" value="<?php echo $valeur->matricule;  ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Nom : </label> </td>
                                    <td class="td2">
                                        <input type="text" value="<?php echo $valeur->nom;  ?>" name="nom" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Prénoms : </label> </td>
                                    <td class="td2">
                                        <input type="text" value="<?php echo $valeur->prenoms;  ?>" name="prenoms" required>
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
                                        <input type="text" value="<?php echo $valeur->adresse;  ?>" name="adresse" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> E-mail : </label> </td>
                                    <td class="td2">
                                        <input type="mail" value="<?php echo $valeur->mail;  ?>" name="mail" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1">
                                        <label for=""> Téléphone : </label>
                                    </td>
                                    <td class="td2">
                                        <input type="tel" value="<?php echo $valeur->telephone;  ?>" name="tel" required>
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
</p>
</center>
</body>
</html>
<?php endif ?>
<?php endforeach ?>




















