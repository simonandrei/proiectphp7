<?php

namespace App\Controllers;

use App\Services\EntryService;
use App\Models\EntryVM;
use Framework\BaseController;
use Framework\Mapper;



class EntryController extends BaseController
{
    private $entryServices;
    private $mapper;

    function __construct() {
        parent::__construct();

        $this->entryServices = new EntryService();
        $this->mapper = new Mapper();

    }

    public function entryGET()
    {
        if(isset($_SESSION["EntryVM"]))
        {
            $this->smarty->assign('entryError', $_SESSION["EntryVM"]);
            unset($_SESSION["EntryVM"]);
        }

        if(isset($_SESSION["Errors"])) {
            $this->smarty->assign('session_errors', $_SESSION["Errors"]);
            unset($_SESSION["Errors"]);
        }

        $entryVM = $this->entryService->getAll();
        $this->smarty->assign('entries', $entryVM);

        $this->smarty->display('user\show.html');
    }

    public function entryPost()
    {
        $entryVM = $this->mapper->populateWithPost(new EntryVM());

        if ($this->entryServices->ValidateEntryForm($entryVM)) {
            $this->entryServices->addEntry($entryVM);

        } else {
            $_SESSION['EntryVM'] = $entryVM;
        }

        header("Location: /user");
    }
    public function deleteEntry()
    {
        $this->entryServices->deleteEntry($_GET['id']);
        header("Location: /user");
    }


}