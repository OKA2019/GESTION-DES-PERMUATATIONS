<?php

//appel du fichier qui contient les permutations
require_once('controllers/Con_ENSEI/Ensei.php');
$listeAnnonce = $ConEnsei->listeAnnonce();


include_once 'controllers/Con_Perm/Con_Permut.php';
$perso_retenue = $Con_Permut->perso_retenue();

if (!empty($perso_retenue)) {
    $i = 1;
    echo " <h3> <br/><br/> Liste des permutations retenues pour l'année " . $perso_retenue[0]->anneePerm . "</h3> ";
    echo "<table width=\"100%\" style=\"font-size:12px;text-align:center;\" ><tr height=\"55px\" style=\"color:white;background: rgb(1, 140, 1);border-raduis:20px;\" >
    <th width=\"5%\"> N° </th><th> <table width=\"100%\"><tr> <th colspan=\"100%\"> Nom et Prénoms </th> </tr></table></th> 
    <th><table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\" > ORIGINES </th></tr><tr><th width=\"33%\"> IEP </th><th width=\"33%\"> DREN </th></tr></table> </th>  
    <th><table width=\"100%\"><tr height=\"30px\"><th colspan=\"100%\"> ACCUEIL </th></tr><tr><th width=\"50%\"> IEP </th><th width=\"50%\"> DREN </th></tr></table> </th></tr>";
    foreach ($perso_retenue as $key => $valeur) {
        echo "<tr style=\"background-color:#e1e1e1\">";
        echo "<td><center> " . $i . " </center></td>";

        echo "<td><center><table width=\"100%\"><tr height=\"40px\">";
        echo "<td width=\"34%\"><center> " . $valeur->nom  . " " . $valeur->prenoms  . " </center></td>";
        echo "</tr><tr height=\"40px\">";
        echo "<td width=\"34%\"><center> " . $valeur->fav_nom . " " . $valeur->fav_prenom . " </center></td>";
        echo "</tr>
        </table> <center> ";

        echo "<td><center><table width=\"100%\"><tr height=\"40px\">";
        echo "<td width=\"33%\"><center> " . $valeur->dem_iep . " </center></td>";
        echo "<td width=\"33%\"><center> " . $valeur->dem_dren . " </center></td>";
        echo "</tr><tr height=\"40px\">";
        echo "<td width=\"33%\"> <center>" . $valeur->fav_iep . "</center></td>";
        echo "<td width=\"33%\"><center> " . $valeur->fav_dren . " </center></td>";
        echo "</tr>";
        
        echo "</table> </center></td>";
        echo "<td></center><table width=\"100%\"><tr height=\"40px\">";
        echo "<td width=\"50%\"> " . $valeur->fav_iep . "</td>";
        echo "<td width=\"50%\"><center> " . $valeur->fav_dren . " </center></td>";
        echo "</tr><tr height=\"40px\">";
        echo "<td width=\"33%\"><center> " . $valeur->dem_iep . " </center></td>";
        echo "<td width=\"33%\"><center> " . $valeur->dem_dren . " </center></td>";
        echo "</tr>
        </table> <center> ";
        $i++;
    }
    echo "</tr></table>";
} elseif (!empty($listeAnnonce)) {

    $i = 1;
    echo "<h3 style=\"font-size:20px\"> Liste des avis de permutation </h3><br/>";
    echo "<table border='0.5' width=\"96%\" style=\"margin-left:2%\"><tr height=\"30px\" style=\"color:white;background-color: green;\" >
        <th> N° </th> <th> Nom et Prénoms </th><th> E-mails  </th><th> Contact </th><th> DREN souhaité </th><th> IEP souhaitée </th><th> Zone souhaitée </th> </tr>";
    foreach ($listeAnnonce as $key => $valeur) {
        echo "<tr height=\"35px\" style=\"background-color:#e1e1e1\"><td><center> " . $i . " </center></h4></td>";
        echo "<td><center> " . $valeur->nom . " " . $valeur->prenoms . " </center></td>";
        echo "<td><center> " . $valeur->mail . " </center></td>";
        echo "<td><center> " . $valeur->telephone . " </center></td>";
        echo "<td><center> " . $valeur->dren_souh . " </center></td>";
        echo "<td><center> " . $valeur->localite . " </center></td>";
        echo "<td><center> " . $valeur->zone . " </center></td>";
        $i++;
    }
    echo "</tr></table>";
}
