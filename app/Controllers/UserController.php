<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UserController extends BaseController {

    public function getAddUserAction($request) {
        $responseMessage = null;
        if (!empty($request -> getMethod() == 'POST')) {
            # code...
            $postData = $request -> getParsedBody();
            $userValidator = v::key('username', v::stringType()->notEmpty())
                                ->key('email', v::stringType()->notEmpty())
                                ->key('password', v::stringType()->notEmpty());
            
            try {
                $userValidator->assert($postData);

                $postData = $request -> getParsedBody();
                $user = new User();
                $user->username = $postData['username'];
                $user->email = $postData['email'];
                $user->password = $postData['password'];
                $user-> save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                //throw $th;
                $responseMessage = $e->getMessage();
            }
            
        }
        return $this->renderHTML('addUser.twig',[
            'responseMessage'=>$responseMessage
        ]);
    }
}