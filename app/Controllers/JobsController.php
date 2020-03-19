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
                            ->key('months', v::intVal()->between(1, 48));

            try {
                //code...
                $jobValidator->assert($postData); // true
                $postData = $request->getParsedBody();
                
                $files = $request->getUploadedFiles();
                $logo = $files['logo'];
                
                if ($logo->getError() == UPLOAD_ERR_OK) {
                    # code...
                    $fileName = $logo->getClientFilename();
                    $dirFile = "uploads/$fileName";
                    $logo->moveTo($dirFile);
                }
                $job = new Job();
                $job ->title = $postData['title'];
                $job ->description = $postData['description'];
                $job ->months = $postData['months'];
                $job ->image = $dirFile;
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