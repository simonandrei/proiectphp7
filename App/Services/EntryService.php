<?php

namespace App\Services;

use App\Constants\ErrorMessages;
use App\Models\EntryVM;
use Framework\DAO;

class EntryService extends DAO
{
    //we have to set specify the corresponding model for the table
    protected $table = "entries";


    public function addEntry(EntryVM $model)
    {
        $data = ['id_user' => $model->id_user,
            'id_event' => $model->id_event,
            'description' => $model->description,
            'id_project' => $model->id_project,
            'date' => $model->date,
            'time_start' => $model->time_start,
            'time_finish' => $model->time_finish];
        $this->new($data);
    }
    public function isDescriptionValid($description): bool
    {
        if (!isset($description) || strlen($description) < 2) {
            $_SESSION["Errors"] .= ErrorMessages::Error;
            return false;
        }
        return true;
    }

    public function ValidateEntryForm(EntryVM $model): bool
    {

        if ($this->isDescriptionValid($model->description)) {
            return true;
        }
        return false;
    }
    public function getAllEntries()
    {
        $result = $this->getAll();

        return $result;
    }
    public function deleteEntry(int $id)
    {
        $db = $this->newDbCon();
        $stmt = $db->prepare("Delete From entries WHERE id=?");
        $stmt->execute([$id]);
    }
    public function getEntries(int $id_user)
    {
        $query ="SELECT E.id, E.description, E.date, E.time_start, E.time_finish, EV.name as evname,P.name as pname FROM entries AS E
                 INNER JOIN projects AS P ON P.id = E.id_project
                 INNER JOIN events AS EV ON EV.id = E.id_event
                 WHERE E.id_user=?
                 ORDER BY E.date,E.time_start";

        $db = $this->newDbCon();
        $stmt = $db->prepare($query);
        $stmt->execute([$id_user]);
        $rez = $stmt->fetchAll();
        return $rez;
    }
}
