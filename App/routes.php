<?php

$routes = [
    '/' => ['controller' => 'HomeController', 'action' => 'index'],

    '/login' => ['controller' => 'AccountController', 'action' => 'loginGET'],
    '/login/' => ['controller' => 'AccountController', 'action' => 'loginGET'],
    '/login/post' => ['controller' => 'AccountController', 'action' => 'loginPOST'],

    '/register' => ['controller' => 'AccountController','action' => 'registerGET'],
    '/register/' => ['controller' => 'AccountController','action' => 'registerGET'],
    '/register/post' => ['controller' => 'AccountController', 'action' => 'registerPOST'],

    '/logout' => ['controller' => 'AccountController', 'action' => 'logout'],
    '/logout/' => ['controller' => 'AccountController', 'action' => 'logout'],

    '/user' => ['controller' => 'UserController','action' => 'indexGET', 'guard' => "Authenticated"],
    '/user/' => ['controller' => 'UserController','action' => 'indexGET', 'guard' => "Authenticated"],

    '/event' => ['controller' => 'EventController', 'action' => 'eventGET', 'guard' => "Authenticated"],
    '/event/' => ['controller' => 'EventController', 'action' => 'eventGET', 'guard' => "Authenticated"],
    '/event/post' => ['controller' => 'EventController', 'action' => 'eventPOST', 'guard' => "Authenticated"],
    '/event/delete?id={id}' => ['controller' => 'EventController', 'action' => 'deleteEvent', 'guard' => "Authenticated"],

    '/project' => ['controller' => 'ProjectController', 'action' => 'projectGET', 'guard' => "Authenticated"],
    '/project/' => ['controller' => 'ProjectController', 'action' => 'projectGET', 'guard' => "Authenticated"],
    '/project/post' => ['controller' => 'ProjectController', 'action' => 'projectPOST', 'guard' => "Authenticated"],
    '/project/delete?id={id}' => ['controller' => 'ProjectController', 'action' => 'deleteProject', 'guard' => "Authenticated"],

    '/user/add' => ['controller' => 'EntryController', 'action' => 'entryGET', 'guard' => "Authenticated"],
    '/user/add/post' => ['controller' => 'EntryController', 'action' => 'entryPOST', 'guard' => "Authenticated"],
    '/user/delete?id={id}' => ['controller' => 'EntryController', 'action' => 'deleteEntry', 'guard' => "Authenticated"]
    ];
