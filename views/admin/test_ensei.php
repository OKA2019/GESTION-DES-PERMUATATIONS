<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Administrateur </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/navbar.css">
    <style>
     
    .fiel{
        width: 42%;
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
    padding: 5%;
}   
#selection{
    width: 200px;
    height: 28px;
    text-align: center;
    border: 1px solid black;
    border-radius: 5px;
    justify-content: right;

}



.corps{
    width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
}


iframe{
    width: 90%; 
    height: 100%;
    margin: 0;
    border-radius: 40px;
}

marquee{
    width: 100%;
    direction:left;
    padding-top: 5px;
    height: 25px;
    background-color: orange;
    font-weight: bold;
    color:white;
}

#corps1{
    width: 100%;
    height: auto;
    margin-top: 20px;
    justify-content: stretch;
    border-radius: 20px;
}

.corps1{
    width: 70%;
    margin-left:15%;
    margin-right:15%;
    border-radius: 20px;
    background-color: rgba(207, 204, 204, 0.46);
    line-height: 40px;
}

input{
    width: 100%;
    background-position: right;
    height: 22px;
    border-radius: 5px;
}
.formu{
    width: 100%;
    display: flex;
    justify-content: space-around;
    border-radius: 20px;
    text-align: center;
    margin-bottom: 10px;
    
}
.td1{
    width: 30%;
    text-align: right;
}
.td2{
    width: 70%;
    float: right;
}
fieldset{
    border: 0px;
}

.formend{
    width: 60%;
    margin-left: 20%;
    display: flex;
    justify-content: space-between;

}
.Annuler, .envoie{
    width: 30%;
    height: 30px;
    margin-top: 15px;
    margin-bottom: 20px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 16px;
    color: white;
    cursor: pointer;
    
}
.Annuler{
    background-color: rgba(10, 10, 10, 0.644);
    border: 1px solid rgba(0, 0, 0, 0.508);
}
.envoie{
    background-color: green;
}

/*Fin du corps*/


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
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <form action="controllers/Con_ENSEI/avis.php" method="POST"><br> <br>
            <fieldset class="corps1">
                <legend>
                    <h3> Ajouter un Instituteur</h3>
                </legend>
                <div>
                    <div class="formu">
                        <fieldset class="fiel">
                            <legend>
                                <h3> Indentifant </h3>
                            </legend>
                            <table>
                                <tr>
                                    <td class="td1"> <label for=""> Nom : </label> </td>
                                    <td >
                                        <input type="text" name="nom" required class="td2">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Prénoms : </label> </td>
                                    <td >
                                        <input type="text" name="prenoms" class="td2" required>
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
                                <h3> Servives </h3> 
                            </legend>
                            <table >
                                <tr>
                                    <td class="td1"> <label for=""> Matricule : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="matricule" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Direction regionale : </label> </td>
                                    <td class="td2">
                                        <input type="text" name="matricule" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1"> <label for=""> Inspection : </label> </td>
                                    <td >
                                        <input class="td2" type="text" name="matricule" required>
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

    <div style="text-align: left;padding: 3%;">
        <br>
    </div>

    <?php
    include('views/footer.php');
    ?>

</body>

</html>