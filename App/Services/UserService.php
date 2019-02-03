<?php

namespace App\Services;

use App\Constants\ErrorMessages;
use App\Models\UserLoginVM;
use App\Models\UserVM;
use Framework\DAO;

class UserService extends DAO
{
    //we have to set specify the corresponding model for the table
    protected $table = "users";

    public function checkUser(UserLoginVM $model)
    {
        $result = $this->getByParams(["email" => $model->email]);

        if ($result && password_verify($model->password, $result->password)) {
            return $result;
        }
    }

    public function updateUser(UserVM $model)
    {
        $db = $this->newDbCon();
        $stmt = $db->prepare("UPDATE users SET firstname=?, lastname=?, username=?, birthday=?, gender=? WHERE email=?");
        $stmt->execute([$model->firstname, $model->lastname, $model->username, $model->birthday, $model->gender, $_SESSION["email"]]);
    }

    public function getByEmail(string $email)
    {
        $result = $this->getByParams(["email" => $email]);

        return $result;
    }

    public function emailExists(string $email)
    {
        $result = $this->getByParams(["email" => $email]);
        if ($result) {
            return true;
        }
        return false;
    }

    public function register(UserVM $model)
    {
        $password = password_hash($model->password, PASSWORD_DEFAULT);

        $data = ['email' => $model->email,
            'password' => $password,
            'username' => $model->username,
            'lastname' => $model->lastname,
            'firstname' => $model->firstname,
            'gender' => $model->gender,
            'birthday' => $model->birthday];
        $this->new($data);
    }

    public function isEmailTaken(string $email): bool
    {
        if ($this->emailExists($email) == false) {

            return false;
        }
        $_SESSION["Errors"] .= ErrorMessages::EMAIL_EXISTS;
        return true;
    }

    public function isNameValid($name): bool
    {
        if (!isset($name) || strlen($name) < 2) {
            $_SESSION["Errors"] .= ErrorMessages::INVALID_NAMES;
            return false;
        }
        return true;
    }

    public function isRepeatPasswordValid($password , $repeatPassword): bool
    {
        if (!isset($repeatPassword) || $password!==$repeatPassword) {
            $_SESSION["Errors"] .= ErrorMessages::INVALID_REPEATPASS;
            return false;
        }
        return true;
    }

    public function isGenderValid($gender): bool
    {
        if (!isset($gender) ) {
            $_SESSION["Errors"] .= ErrorMessages::INVALID_GENDER;
            return false;
        }
        return true;
    }

    public function isDateValid($date): bool
    {
        if (!isset($date) ) {
            $_SESSION["Errors"] .= ErrorMessages::INVALID_DATE;
            return false;
        }
        return true;
    }

    private function isEmailValid($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["Errors"] .= ErrorMessages::INVALID_EMAIL;
            return false;
        }
        return true;
    }

    private function isPasswordValid($password): bool
    {
        if (!isset($password) || strlen($password) < 6) {
            $_SESSION["Errors"] = ErrorMessages::INVALID_PASSWORD;
            return false;
        }
        return true;
    }

    public function ValidateRegisterForm(UserVM $model): bool
    {

        if ($this->isNameValid($model->firstname) &&
            $this->isNameValid($model->lastname) &&
            $this->isNameValid($model->username) &&
            $this->isPasswordValid($model->password) &&
            $this->isDateValid($model->birthday) &&
            $this->isGenderValid($model->gender) &&
            $this->isEmailValid($model->email) &&
            $this->isRepeatPasswordValid($model->password, $_POST["repeatpassword"]) ) {
                return true;
        }
        return false;
    }

    public function ValidateEditUserForm(UserVM $model): bool
    {
        if ($this->isNameValid($model->firstname) &&
            $this->isNameValid($model->lastname) &&
            $this->isNameValid($model->username) &&
            $this->isDateValid($model->birthday) &&
            $this->isGenderValid($model->gender)) {
            return true;
        }
        return false;
    }
}