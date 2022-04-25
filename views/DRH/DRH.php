
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> DRH </title>
        <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="views/css/drencss.css">
    <link rel="stylesheet" href="views/css/navbar.css">
    </head>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="admin"> Ressources humaines</label>

    <ul>
        <li><a class="active" href="#"> Accueil </a></li>
        <li><a href="index.php?page=permutedrh"> permutation </a></li>
        <li><a href="index.php?page=seachdrh"> Recherche </a></li>
    </ul>
</nav>
    <!-- corps du site (modifiable en fonction de la page)-->
    <div class="corps" id="corps">
        <div>
            <?php
            include('controllers/Con_Perm/Con_Permut.php');
            $date = $Con_Permut->recupdate();
            echo ' <marquee >La permutation de l\'année <b>', $date[1], '</b> sont ouvert du Code du <b>', $date[9], '</b> au <b>', $date[10], '</b>
                </marquee> ';

            ?>
        </div>
        <br><br><br>
        <div style="text-align:center; width:90%;margin-left:5%;">
                <h3> Liste des directions regionale </h3><br>
                <iframe src="views/DREN/listedren.php" frameborder="0">

                </iframe>
        </div>
        <div style="text-align: left;padding: 3%;">
            <h3 > Aider :</h3>

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
</html>