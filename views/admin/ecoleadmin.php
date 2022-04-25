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
            width: 20%;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            margin-bottom: 50px;
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
        #active{
            background-color: orange;
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
            <li><a class="active" href="index.php?page=admin"> Accueil </a></li>
            <li><a href="index.php?page=permute"> permutation </a></li>
            <li><a href="index.php?page=seachadmin"> recherche </a></li>
        </ul>
    </nav>
    <fieldset class="MEN">
        <div class="dren">
            <a class="liste" href="index.php?page=enseiadmin">
                Instituteurs
            </a>
            <a class="liste" id="active" href="index.php?page=ecole">
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


    <?php
        require_once 'controllers/Con_IEP/ConIEP.php';
        $ConIEP->listeEcoleAll();

    ?>

<p><br> <br> <br></p>
    <?php
    include('views/footer.php');
    ?>
</body>

</html>