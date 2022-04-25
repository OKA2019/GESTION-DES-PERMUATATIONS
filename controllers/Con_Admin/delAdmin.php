<?php
session_start();

$matricule = $_GET['matricule'];
$matsession = $_SESSION['matricule'];

require 'ConAdmin.php';
$ConAdmin->del_admin($matsession,$matricule);

