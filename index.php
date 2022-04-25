<?php

/* Page pilote */
    $page = $_GET['page'] ?? '404' ;

    if($page == 'ensei' )
    {
        require 'views/ENSEI/ENSEI.php';
    }
    elseif($page == 'gestionieENSEI' )
    {
        require 'views/ENSEI/gestionENSEI.php';
    }
    elseif($page == 'permuteENSEI' )
    {
        require 'views/ENSEI/permuteENSEI.php';
    }
    elseif($page == 'resultatENSEI' )
    {
        require 'views/ENSEI/resultatENSEI.php';
    }
    elseif($page == 'seacheannonce')
    {
        require 'views/ENSEI/seachEnsei.php';
    }

    /* IEP */
    elseif($page == 'iep' )
    {
        require 'views/IEP/IEP.php';
    }
    elseif($page == 'permuteIEP' )
    {
        require 'views/IEP/permuteIEP.php';
    }
    elseif($page == 'seachIEP' )
    {
        require 'views/IEP/seach.php';
    }
    /* DREN */
    elseif($page == 'dren' )
    {
        require 'views/DREN/DREN.php';
    }
    elseif($page == 'gestionDREN' )
    {
        require 'views/DREN/gestionDREN.php';
    }
    elseif($page == 'permuteDREN')
    {
        require 'views/DREN/permuteDREN.php';
    }
    elseif($page == 'seachDREN')
    {
        require 'views/DREN/seachDREN.php';
    }
    
    /* DRH */
    elseif($page == 'drh')
    {
        require 'views/DRH/DRH.php';
    }
    elseif($page == 'permutedrh' )
    {
        require 'views/DRH/permutedrh.php';
    }
    elseif($page == 'seachdrh' )
    {
        require 'views/DRH/seachdrh.php';
    }

    /* Admin */
    elseif($page == 'admin')
    {
        require 'views/admin/admin.php';
    }
    elseif($page== 'addgest')
    {
        require 'views/admin/Addgest.php';
    }
    elseif($page == 'seachadmin' )
    {
        require 'views/admin/seachadmin.php';
    }

    elseif($page == 'permute')
    {
        require 'views/admin/gestionPermute.php';
    }
    elseif($page == 'ecole' )
    {
        require 'views/admin/ecoleadmin.php';
    }
    elseif($page == 'enseiadmin' )
    {
        require 'views/admin/enseiadmin.php';
    }
    elseif($page == 'iepadmin' )
    {
        require 'views/admin/iepadmin.php';
    }
    elseif($page == 'drenadmin' )
    {
        require 'views/admin/drenadmin.php';
    }
    elseif($page == 'drhadmin' )
    {
        require 'views/admin/drhadmin.php';
    }
    else
    {
        require 'views/accueil.php';
    }
