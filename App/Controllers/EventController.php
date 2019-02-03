<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 2/2/2019
 * Time: 8:34 PM
 */

namespace App\Controllers;
use App\Constants\ErrorMessages;
use App\Models\EventVM;
use App\Services\EventService;
use Framework\BaseController;
use Framework\Mapper;

class EventController extends BaseController
{
    private $eventService;
    private $mapper;

    function __construct() {
        parent::__construct();

        $this->eventService = new EventService();
        $this->mapper = new Mapper();
    }


    public function eventGET()
    {
        if(isset($_SESSION["EventVM"]))
        {
            $this->smarty->assign('eventError', $_SESSION["EventVM"]);
            unset($_SESSION["EventVM"]);
        }

        if(isset($_SESSION["Errors"])) {
            $this->smarty->assign('session_errors', $_SESSION["Errors"]);
            unset($_SESSION["Errors"]);
        }

        $eventVM = $this->eventService->getAllEvents();
        $this->smarty->assign('events', $eventVM);

        $this->smarty->display('Event\event.html');
    }

    public function eventPOST()
    {
        $eventVM = $this->mapper->populateWithPost(new EventVM());

        if ($this->eventService->ValidateEventForm($eventVM)) {
            $this->eventService->addEvent($eventVM);

        } else {
            $_SESSION['EventVM'] = $eventVM;
        }
        header("Location: /event");
    }
    public function deleteEvent()
    {
        $this->eventService->deleteEvent($_GET['id']);
        header("Location: /event");
    }

}