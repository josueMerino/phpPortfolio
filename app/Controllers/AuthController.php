<?php

namespace App\Controllers;

use App\Models\User;
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
        if($user){
            if(password_verify($postData['password'], $user->password)){
                return new RedirectResponse('/admin');
            } else {
                $responseMessage = 'Wrong';
            }
        } else{
            $responseMessage = 'Wrong';
        }
        
        return $this->renderHTML('login.twig',[
            'responseMessage' => $responseMessage
        ]);
    }

}