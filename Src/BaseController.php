<?php

namespace Framework;

require('C:/xampp/htdocs/proiectphp/Smarty/Smarty.class.php');

use App\Services\SlideShowService;
use Smarty;
use App\Constants\Roles;
use App\Resources\Resources;

class BaseController
{

    protected $smarty;
    private $resources;

    public function __construct()
    {

        $_SESSION["Errors"] = false;

        $this->smarty = new Smarty();
        $this->resources = new Resources();
        $this->smarty->template_dir = 'C:\xampp\htdocs\proiectphp\App\Views';
        $this->smarty->compile_dir = 'C:\xampp\htdocs\proiectphp\Smarty\template_c';
        $this->smarty->cache_dir = 'C:\xampp\htdocs\proiectphp\Storage\cache';
        $this->smarty->caching = false;
        $this->smarty->left_delimiter = '{{';
        $this->smarty->right_delimiter = '}}';

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }


        if(isset($_SESSION['roles'])) {

            $roles = $_SESSION['roles'];
            $isAdmin =0;
            foreach ($roles as  $role)
            {
                if($role== Roles::ADMIN)
                {
                    $isAdmin =1;
                }
            }

            if($isAdmin == 1)
            {
                $this->smarty->assign("adminUser",true);

            }
            $this->smarty->assign("isLoggedIn",true);
        }

        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

    }
}