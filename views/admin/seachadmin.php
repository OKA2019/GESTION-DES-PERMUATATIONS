
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> Administrateur </title>
        <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/seachcss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    <style>
        .connect
        {
            width: 30%;
            height: 180px;
            padding-top: 35px;
            margin-left: 35%;
            text-align: center;
            line-height: 50px;
            background-color: whitesmoke;
            border-radius: 20px;
            margin-bottom: 50px;
            box-shadow: 0px 2px 6px rgba(32,32,32,0.5);
        }
        button{
            width: 120px;
            height: 28px;
            font-size: 16px;
            background-color: green;
            color: white;
            font-weight: bold;
            border-radius: 20px;
        }
    </style>
    </head>
<body >
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="admin">Administrateur</label>

    <ul>
        <li><a  href="index.php?page=admin"> Accueil </a></li>
        <li><a href="index.php?page=permute"> permutation </a></li>
        <li><a class="active" href="#"> Recherche </a></li>
    </ul>
</nav>
    <div >
        <div style="text-align: center;margin-bottom: -20px;">
            <h3><br> Faire une recherche </h3>
            <div class="connect">
                <form action="" method="POST">
                    <label for=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reference :</label>
                    <input type="text" style=" height: 22px; width: 150px;" name="nom" required><br>
                    <label for=""> Dénominations: </label>
                    <select name="choix" id="choix" style=" height: 26px; width: 150px;" required>
                        <option value=""> ---------------------------- </option>
                        <option name="user">Enseignant</option>
                        <option name="user">Ecole</option>
                        <option name="user">IEP</option>
                        <option name="user">DREN</option>
                    </select><br>
                    <button type="submit" name="seach"> Valider </button>
                </form>
            </div>
        </div>
        <p>
            <!-- inclusion du fichier qui contient la liste des administrateur -->
            <?php

            if (isset($_POST['seach'])) 
            {
                $nom = $_POST['nom'];
                $ref = $_POST['choix'];

                    /** Appel de la class qui va générer le code de recherche */
                require_once 'controllers/Con_Admin/ConAdmin.php';
                if( $ref == "Enseignant")
                {
                    $ConAdmin->seachEnsei_admin($nom);
                }
                elseif( $ref == "Ecole")
                {
                    $ConAdmin->seachEcole_admin($nom);
                }
                elseif($ref=="IEP")
                {
                    $ConAdmin->seachIEP_admin($nom);
                }
                elseif($ref=="DREN")
                {
                     $ConAdmin->seachDren_admin($nom);
                }
            }
            ?>
        </p><br><br><br><br>
        <?php 
            include('views/footer.php');
        ?>
</div>
</html>