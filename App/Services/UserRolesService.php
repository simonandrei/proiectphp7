<?php

namespace App\Services;

use Framework\DAO;
use App\Constants\Roles;

class UserRolesService extends DAO
{
    protected $table = "userroles";

    public function getRoles(string $userId)
    {
        $results = $this->getByParams(["id_user" => $userId]);
        $roles = array();

        foreach ($results as  $value)
        {
            if($value===Roles::USER_ID)
            {
                $roles[]= Roles::USER;
            }
            else
            {
                $roles[]= Roles::ADMIN;
            }
        }

        return $roles;
    }

    public function add(string $user_id)
    {
        $data = ['id_user' => $user_id, 'id_role' => $roles[]= Roles::USER_ID];
        $this->new($data);
    }

}