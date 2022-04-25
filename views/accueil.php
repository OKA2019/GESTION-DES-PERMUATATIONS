
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/stye.css">
    <title>Accueil permuatation</title>
    <style>
        *{
    margin:0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    background-color: rgba(250, 249, 249, 0.755);
}
.corps{
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 10px;
    padding-bottom: 50px;
    font-size: 14px;
}
.header{
    width: 100%;
    display: flex;
    justify-content: space-between;
    text-transform: uppercase;

}

.body{
    width: 520px;
    float: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    padding-bottom: 20px;
    display: flex;
    flex-direction: column;
    text-align: center;
    text-align: center;
    border-radius: 40px;

}

.bordure{
    width: 80%;
    margin: 40px;
    border-radius: 40px;
    border: 2px solid rgba(21, 255, 0, 0.439);
}

.corps2{
    margin: 1px;
    padding-top: 40px ;
    border-radius: 40px;
    background-color: rgba(255, 169, 9, 0.678);

}
.connect{
    text-align: center;
    line-height: 50px;
    font-weight: bold;
}

.avatar{
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 30px;
}

input, select{
    border-radius: 4px;
    text-align: center;
}

.envoie{
    width: 50%;
    height: 35px;
    border-radius: 25px;
    background-color: green;
    margin-top: 25px;
    margin-bottom: 45px;
    font-weight: bold;
    font-size: 18px;
    text-transform: uppercase;
    color: white;
}

@media (max-width: 800px)
{
    .corps{
        width: 96%;
        margin-left: 2%;
        margin-right: 2%;

    }
.body{
    width: 420px;
    float: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    padding-bottom: 20px;
    display: flex;
    flex-direction: column;
    text-align: center;
    text-align: center;
    border-radius: 40px;
    background-position: center;

}

    .bordure{
        width: 96%;
        margin-top: 15px;
        margin-left: 2%;
        margin-right: 2%;
        border-radius: 40px;
        border: 2px solid rgba(21, 255, 0, 0.439);
    }

}

    </style>
</head>
<body>
    <div class="corps">
        <div class="header">
            <div>
                <h3> <br><br><br> <br> permutation IEP</h3>
            </div>
            <div style="text-align: center;">
                <img src="views/img/armoirie.png" style="width: 120px;height: 120px;" alt="">
                <h5> Union – Discipline - Travail <h5>
                 Ministère de l’Enseignement <br> 
                 Supérieur et de l'Alphabetisation 
                
            </div>
        </div>
        <div class="body">
            <div style="text-align: center;margin-bottom: -20px;margin-top:40px">
                <h2> Mon espace de permutation </h2>
            </div>
            <div class="bordure" style="background:rgba(255, 166, 0, 0) url('views/img/armoirie.png') ;background-repeat: no-repeat;background-position: center;">
                <div class="corps2">
                    <div class="photo">
                        <img src="views/img/conn1.jpg" class="avatar" alt="">
                    </div>
                    <div class="connect">
                        <form action="controllers/authentification.php" method="POST">
                            <label for=""> &nbsp;&nbsp;&nbsp; Matricule :</label>
                            <input type="text" style=" height: 22px; width: 150px;" name="matricule" required><br>
                            <label for=""> Utilisateurs :</label>
                            <select name="choix" id="choix" style=" height: 26px; width: 150px;" required>
                                <option value=""> ---------------------------- </option>
                                <option name="user"> Enseignant </option>                         
                                <option name="user"> IEP </option>
                                <option name="user"> DREN</option>
                                <option name="user"> DRH </option>
                                <option name="user"> Admin </option>
                            </select><br>
                            <button type="submit" class="envoie"> Connexion </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>