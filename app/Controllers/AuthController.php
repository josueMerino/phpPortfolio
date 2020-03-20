<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {

    public function getLogin() {
        
        return $this->renderHTML('login.twig');
    }

    public function postLogin($request){
        $responseMessage = null;
        # Validation :v
        $postData = $request -> getParsedBody();
        $user = User::where('email', $postData['email'])->first();

        if($user)
        {
            if(password_verify($postData['password'], $user->password))
            {
                $_SESSION['userId'] = $user->id;
                return new RedirectResponse('/admin');
            } else
            {
                $responseMessage = 'Wrong';
            }
        } else
        {
            $responseMessage = 'Wrong';
        }
        
        return $this->renderHTML('login.twig',[
            'responseMessage' => $responseMessage
        ]);
    }

    public function getLogout() {
        unset($_SESSION['userId']);
        return new RedirectResponse('/');
        
    }

    public function getAddUserAction($request){
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