<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Core\Service;

class UserService extends Service
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
    
    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }
}
