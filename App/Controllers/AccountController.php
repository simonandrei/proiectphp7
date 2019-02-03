<?php

namespace App\Controllers;

use App\Constants\ErrorMessages;
use App\Models\UserLoginVM;
use App\Models\UserVM;
use App\Services\UserService;
use App\Services\UserRolesService;
use App\Constants\Roles;
use Framework\BaseController;
use Framework\Mapper;

class AccountController extends BaseController
{
    private $userRolesService;
    private $userService;
    private $mapper;

    function __construct() {
        parent::__construct();

        $this->userRolesService = new UserRolesService();
        $this->userService = new UserService();
        $this->mapper = new Mapper();
    }

    public function loginGET()
    {
        if(isset($_SESSION["Errors"])) {
            $this->smarty->assign('session_errors', $_SESSION["Errors"]);
            unset($_SESSION["Errors"]);
        }

        $this->smarty->display('Account\login.html');

    }

    public function loginPOST()
    {
        $userVM = $this->mapper->populateWithPost(new UserLoginVM());
        $result = $this->userService->checkUser($userVM);

        if ($result) {
            $roles = $this->userRolesService->getRoles($result->id_user);

            $_SESSION['roles'] = $roles;
            $_SESSION['email'] = $userVM->email;

            header("Location: /user");

        } else {
            $_SESSION["Errors"] = ErrorMessages::INVALID_CREDENTIALS;
            header("Location: /login");
        }
    }

    public function registerGET()
    {
        if(isset($_SESSION["UserVm"]))
        {
            $this->smarty->assign('user', $_SESSION["UserVm"]);
            unset($_SESSION["UserVm"]);
        }

        if(isset($_SESSION["Errors"])) {
            $this->smarty->assign('session_errors', $_SESSION["Errors"]);
            unset($_SESSION["Errors"]);
        }

        $this->smarty->display('Account\register.html');
    }

    public function registerPOST()
    {
        $userVM = $this->mapper->populateWithPost(new UserVM());

        if ($this->userService->ValidateRegisterForm($userVM) && !$this->userService->isEmailTaken($userVM->email)) {
            $this->userService->register($userVM);
            $id=($this->userService->getByEmail($userVM->email))->id_user;
            $this->userRolesService->add($id);

            $_SESSION['email'] = $userVM->email;
            $_SESSION["roles"] = array(0  => Roles::USER);

            header("Location: /user");

        } else {
            $_SESSION['UserVm'] = $userVM;
            header("Location: /register");
        }
    }

    public function logout()
    {
        session_start();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }
        $_SESSION = array();

        session_destroy();

        header("Location: /");
    }

}