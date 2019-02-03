<?php

namespace App\Services;

use App\Constants\ErrorMessages;
use App\Models\ProjectVM;
use Framework\DAO;

class ProjectService extends DAO
{
    //we have to set specify the corresponding model for the table
    protected $table = "projects";


    public function addProject(ProjectVM $model)
    {
        $data = ['name' => $model->name,
            'client'=> $model->client];
        $this->new($data);
    }

    public function isNameValid($name): bool
    {
        if (!isset($name) || strlen($name) < 2) {
            $_SESSION["Errors"] .= ErrorMessages::Error;
            return false;
        }
        return true;
    }
    public function isClientValid($name): bool
    {
        if (!isset($name) || strlen($name) < 2) {
            $_SESSION["Errors"] .= ErrorMessages::Error;
            return false;
        }
        return true;
    }

    public function ValidateProjectForm(ProjectVM $model): bool
    {

        if ($this->isNameValid($model->name)&& $this->isClientValid($model->name)) {
            return true;
        }
        return false;
    }
    public function getAllProjects()
    {
        $result = $this->getAllByParams(["isDeleted" => 0]);

        return $result;
    }
    public function deleteProject(int $id)
    {
        $db = $this->newDbCon();
        $stmt = $db->prepare("UPDATE projects SET isDeleted=? WHERE id=?");
        $stmt->execute([1, $id]);
    }


}