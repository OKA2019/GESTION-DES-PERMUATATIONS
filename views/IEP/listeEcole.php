<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste IEP</title>
</head>
<body style="text-align:center;width:96%;margin-left:2%;background-color:rgba(255, 166, 0, 0.775)">
     <!-- inclusion du fichier qui contient la liste des administrateur -->
     <?php 
            include ('../../controllers/Con_IEP/ConIEP.php');
            $ConIEP->listeEcole();
        ?>
</body>
</html>