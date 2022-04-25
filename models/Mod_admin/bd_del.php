<?php

if($_SESSION['matricule'] != $matricule )
{
    $del = "DELETE FROM `administrateur` WHERE `administrateur`.`matricule` = $matricule ";
    $deladmin = $user->exec($del);
}