<?php

namespace App\Controllers;



class UserController extends BaseController {

    public function getAddUserAction() {
        
        return $this->renderHTML('addUser.twig');
    }
}