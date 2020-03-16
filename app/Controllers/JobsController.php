<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
    
    public function getAddJobAction($request){
        $responseMessage = null;
        
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                            ->key('description', v::stringType()->notEmpty())
                            ->key('months', v::stringType()->notEmpty());

            try {
                //code...
                $jobValidator->assert($postData); // true
                $postData = $request->getParsedBody();
                $job = new Job();
                $job ->title = $postData['title'];
                $job ->description = $postData['description'];
                $job ->months = $postData['months'];
                $job -> save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                //throw $th;
                $responseMessage= $e->getMessage();
            }
            # code...
        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage'=>$responseMessage
        ]);
    }
}