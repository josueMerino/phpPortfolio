<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UserController {

    public function getAddUserAction($request){
        include ('../views/addUser.twig');
    }
}