<?php

namespace App\Controllers;
use App\Services\UserService;
use App\Models\UserVM;
use App\Services\EventService;
use App\Models\EventVM;
use App\Services\ProjectService;
use App\Models\ProjectVM;
use App\Services\EntryService;
use App\Models\EntryVM;
use Framework\BaseController;
use Framework\Mapper;



class UserController extends BaseController
{
    private $userService;
    private $projectService;
    private $entryServices;
    private $eventService;
    private $mapper;

    function __construct()
    {
        parent::__construct();

        $this->entryServices = new EntryService();
        $this->userService = new UserService();
        $this->eventService = new EventService();
        $this->projectService = new ProjectService();
        $this->mapper = new Mapper();

    }

    public function indexGET()
    {
        $userVM = $this->userService->getByEMail($_SESSION["email"]);
        $this->smarty->assign('user', $userVM);

        $projectVM = $this->projectService->getAllProjects();
        $eventVM = $this->eventService->getAllEvents();
        $entryVM = $this->entryServices->getEntries($userVM->id_user);

        $this->smarty->assign('projects', $projectVM);
        $this->smarty->assign('events', $eventVM);
        $this->smarty->assign('entries', $entryVM);

        $this->smarty->display('user\show.html');
    }

}