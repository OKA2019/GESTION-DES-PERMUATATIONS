<?php
      
require 'bd_connexion.php';
        
$ensei = $user->query('SELECT*FROM personnel ');
$ensei = $ensei->fetchAll(PDO::FETCH_OBJ);


$iep = $user->query('SELECT*FROM iep ');
$iep = $iep->fetchAll(PDO::FETCH_OBJ);


$dren = $user->query('SELECT*FROM dren ');
$dren = $dren->fetchAll(PDO::FETCH_OBJ);



$drh = $user->query('SELECT*FROM drh_men ');
$drh = $drh->fetchAll(PDO::FETCH_OBJ);

$admin = $user->query('SELECT*FROM administrateur ');
$admin = $admin->fetchAll(PDO::FETCH_OBJ);



$dem = $user->query('SELECT*FROM enseig_demandeur ');
$dem = $dem->fetchAll(PDO::FETCH_OBJ);

$fav = $user->query('SELECT*FROM enseig_favorable ');
$fav = $fav->fetchAll(PDO::FETCH_OBJ);

$pris = $user->query('SELECT*FROM dossier_fav ');
$pris = $pris->fetchAll(PDO::FETCH_OBJ);


?>
