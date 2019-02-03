<?php

namespace App\Services;

use App\Constants\ErrorMessages;
use App\Models\EventVM;
use Framework\DAO;

class EventService extends DAO
{
    //we have to set specify the corresponding model for the table
    protected $table = "events";


    public function addEvent(EventVM $model)
    {
        $data = ['name' => $model->name];
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

    public function ValidateEventForm(EventVM $model): bool
    {

        if ($this->isNameValid($model->name)) {
            return true;
        }
        return false;
    }
    public function getAllEvents()
    {
        $result = $this->getAllByParams(["isDeleted" => 0]);

        return $result;
    }
    public function deleteEvent(int $id)
    {
        $db = $this->newDbCon();
        $stmt = $db->prepare("UPDATE events SET isDeleted=? WHERE id=?");
        $stmt->execute([1, $id]);
    }


}