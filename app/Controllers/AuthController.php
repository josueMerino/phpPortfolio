<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class AuthController extends BaseController {

    public function getLogin($request) {
        $responseMessage = null;
        if (!empty($request -> getMethod() == 'POST')) {
            # code...
            $postData = $request -> getParsedBody();
            $userValidator = v::key('username', v::stringType()->noWhitespace())
                                ->key('email', v::stringType()->notEmpty())
                                ->key('password', v::stringType()->notOptional());
            
            try {
                $userValidator->assert($postData);

                $postData = $request -> getParsedBody();
                $user = new User();
                $user->username = $postData['username'];
                $user->email = $postData['email'];
                $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user-> save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                //throw $th;
                $responseMessage = $e->getMessage();
            }
            
        }
        return $this->renderHTML('login.twig',[
            'responseMessage'=>$responseMessage
        ]);
    }
}