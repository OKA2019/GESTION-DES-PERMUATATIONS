<!DOCTYPE html>
<html>
    <head>
        <title> jeu SUCAF-CI </title>
        <meta charset="UTF-8" >
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link rel="stylesheet" href="../css/stylegest.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
* {
    padding: 0;
    margin: 0;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
}

.infos {
    text-align: center;
}

div {
    padding-top: 2%;
}

#hist_cour {
    width: 80%;
    text-align: center;
    border: 1px solid #9FC6FF;
    margin: 10px 10%;
    font-size: 14px;
}

nav {
    background: #0082e6;
    height: 80px;
    width: 100%;
    font-weight: bold;
}

label.admin {
    color: white;
    font-size: 35px;
    line-height: 80px;
    padding: 0 100px;
    font-weight: bold;
}

nav ul {
    margin-right: 40px;
    float: right;
}

nav ul li {
    display: inline-block;
    line-height: 80px;
    margin: 0 30px;
}

nav ul li a {
    color: white;
    font-size: 17px;
    text-transform: uppercase;
    padding: 7px 13px;
    border-radius: 20px;
}

a.active,
a:hover {
    background: #1b9bff;
    transition: -5s;
}

.checkbtn {
    font-size: 30px;
    color: white;
    float: right;
    line-height: 80px;
    margin-right: 20px;
    cursor: pointer;
    display: none;
}

#check {
    display: none;
}

#tab2 {
    width: 550px;
    margin-left: auto;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 35px;
    border: 1px solid #9FC6FF;
    text-align: center;
    position: relative;
    font-size: 14px;
}


/*Si l'ecran est de l'utilisateeur est inferieur ou égal à 150px */

@media (max-width: 1050px) {
    body {
        background-position: fixed;
        font-size: 14px;
    }
    #tab2 {
        width: 460px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #9FC6FF;
        text-align: center;
        position: relative;
        padding-bottom: 5px;
        font-size: 14px;
    }
    .checkbtn {
        display: block;
    }
    ul {
        position: fixed;
        width: 100%;
        background: #2c3e50;
        top: 80px;
        left: -100%;
        text-align: center;
        transition: all .5s;
        height: 100%;
    }
    nav ul li {
        display: block;
        margin: 50px 0;
        line-height: 30px;
    }
    nav ul li a {
        font-size: 20px;
    }
    a:hover,
    a.active {
        background: none;
        color: #0082e6;
    }
    #check:checked~ul {
        left: 0;
    }
}

/*  boutton 
 */

.envoi {
    width: 75px;
    height: 25px;
    font-size: 16px;
    color: #FFFFFF;
    background: #e72ae7;
    font-weight: bold;
    border-radius: 10px;
    margin-top: 30px;
    margin-bottom: 25px;
}

.annuler {
    width: 75px;
    height: 25px;
    font-size: 16px;
    color: #FFFFFF;
    background: #4d3b4d;
    font-weight: bold;
    border-radius: 10px;
    margin-top: 30px;
    margin-bottom: 25px;
}
    </style>

    </head>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="admin"> Admin pronostic </label>
    <ul>
        <li><a href="index.php?page=admin"> Accueil </a></li>
        <li><a class="active" href="#"> Gestion </a></li>
        <li><a href="index.php"> Pronostic </a></li>
    </ul>
</nav>