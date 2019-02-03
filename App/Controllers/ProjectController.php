<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 2/2/2019
 * Time: 8:34 PM
 */

namespace App\Controllers;
use App\Constants\ErrorMessages;
use App\Models\ProjectVM;
use App\Services\ProjectService;
use Framework\BaseController;
use Framework\Mapper;

class ProjectController extends BaseController
{
    private $projectService;
    private $mapper;

    function __construct() {
        parent::__construct();

        $this->projectService = new ProjectService();
        $this->mapper = new Mapper();
    }


    public function projectGET()
    {
        if(isset($_SESSION["ProjectVM"]))
        {
            $this->smarty->assign('projectError', $_SESSION["ProjectVM"]);
            unset($_SESSION["ProjectVM"]);
        }

        if(isset($_SESSION["Errors"])) {
            $this->smarty->assign('session_errors', $_SESSION["Errors"]);
            unset($_SESSION["Errors"]);
        }

        $projectVM = $this->projectService->getAllProjects();
        $this->smarty->assign('projects', $projectVM);

        $this->smarty->display('Project\project.html');
    }

    public function projectPOST()
    {
        $projectVM = $this->mapper->populateWithPost(new ProjectVM());

        if ($this->projectService->ValidateProjectForm($projectVM)) {
            $this->projectService->addProject($projectVM);

        } else {
            $_SESSION['ProjectVM'] = $projectVM;
        }
        header("Location: /project");
    }
    public function deleteProject()
    {
        $this->projectService->deleteProject($_GET['id']);
        header("Location: /project");
    }

}