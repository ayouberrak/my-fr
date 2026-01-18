<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return $this->render('users/index', ['users' => $users]);
    }
    
    public function show(Request $request)
    {
        // Assuming route params are handled or passed
        // For now, strict route handling in router might not pass params cleanly to method arguments automatically without reflection in router dispatch.
        // My Router implementation passes $request to the method.
        // I need to get ID from request->params if I added that feature.
        // My Router.php implementation: $this->request->setRouteParams($matches);
        // But Request class stores them. I can access them.
        
        // $id = $request->getRouteParam('id'); // Need to implement getRouteParam or access property
    }
}
