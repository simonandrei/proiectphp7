<?php
namespace App\Guards;

use Framework\Guard;
use App\Constants\Roles;

class Admin implements Guard
{
    public function handle(array $params = null)
    {
        if(session_status() != PHP_SESSION_ACTIVE) {
        session_start();
            }

        if (!isset($_SESSION['email']))
            $this->reject();

        if (!isset($_SESSION['roles']))
            $this->reject();

        $roles = $_SESSION['roles'];
        $isAdmin =0;
        foreach ($roles as  $role)
        {
            if($role== Roles::ADMIN)
            {
                $isAdmin =1;
            }
        }
        if($isAdmin==0)
        {
            $this->reject();
        }
    }

    public function reject()
    {
        header("Location:/login");
        die();
    }
}
