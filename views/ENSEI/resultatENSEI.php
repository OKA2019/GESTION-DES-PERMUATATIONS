<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> Permutation Enseignant </title>
        <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/enseigncss.css">
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
        <li><a href="index.php?page=ENSEI" > Accueil </a></li>
        <li><a href="index.php?page=permuteENSEI"> permutation </a></li>
        <li><a class="active" href="#"> resultats </a></li>
        <li><a href="index.php?page=seacheannonce"> recherche </a></li>
    </ul>
</nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
         <div >
            <marquee >
                La permutation de l'année 2021 sont ouvert du 17/06/2021 au 17/10/2021
            </marquee>
        </div>
        <br/><br/>
        <!-- inclusion du fichier qui contient la liste des administrateur -->
        <?php 
        session_start();

            $matricule = $_SESSION['matricule'];
                    require_once 'controllers/Con_admin/ConAdmin.php';
                    $ConAdmin->pronosticUser($matricule);
                ?>
                <br/><br/>

            <br/><br/><br/>
            <!-- inclusion du fichier qui contient la liste des administrateur -->
            <?php 
                require_once 'views/DRH/perso_retenu-perm.php';
            ?>
             <br> <br>
    </div>
    <footer>
        <h2> NOS CONTATCS </h2>
        les referencs de la DREN et de la DRH
    </footer>
</body>
</html>