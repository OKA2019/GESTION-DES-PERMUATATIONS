<?php

/** recupère le matricule et renvoie le resultat correspondant */
class Authen
{
    public function identification(string $matricule, string $userconnect)
    {
        require '../models/bd_authen.php';
        if ($userconnect == "Enseignant") {
            foreach ($ensei as $utilisateur) {
                if ($utilisateur->matricule == $matricule) {
                    session_start();
                    $_SESSION['mat_ensei'] = $utilisateur->matricule;
                    setcookie('mat_ensei', $matricule);
                    header('location:../index.php?page=ensei');
                }
            }
        } elseif ($userconnect == "IEP") {
            foreach ($iep as $connectiep) {
                if ($connectiep->Id_iep == $matricule) {
                    session_start();
                    $_SESSION['mat_iep'] = $matricule;
                    unset($_COOKIE['mat_iep']);
                    setcookie('mat_iep', $matricule);
                    header('location:../index.php?page=iep');
                }
            }
        } elseif ($userconnect == "DREN") {
            foreach ($dren as $connectdren) {
                if ($connectdren->Id_dren == $matricule) {
                    session_start();
                    $_SESSION['mat_dren'] = $matricule;
                    setcookie('mat_dren', $matricule);
                    header('location:../index.php?page=dren');
                }
            }
        } elseif ($userconnect == "DRH") {
            foreach ($drh as $valeur) {
                if ($valeur->Id_drh == $matricule) {
                    session_start();
                    $_SESSION['mat_drh'] = $matricule;
                    setcookie('mat_drh', $matricule);
                    header('location: ../index.php?page=drh');
                }
            }
        } elseif ($userconnect == "Admin") {
            foreach ($admin as $valeur) {
                if ($valeur->matricule == $matricule) {
                    session_start();
                    $_SESSION['matricule'] = $matricule;
                    setcookie('matricule', $matricule);
                    header('location: ../index.php?page=admin');
                }
            }
        }

        echo "<script type=\"text/javascript\">";
        echo " alert('ERREUR, Ce matricule n\'existe pas dans la base $userconnect');";
        echo "window.history.back();";
        echo "</script>";
    }
}
