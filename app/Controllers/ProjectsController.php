<?php

namespace App\Controllers;

use App\Models\Project;
use Respect\Validation\Validator as v;

class ProjectsController extends BaseController{

    public function getAddProjectAction($request){
        $responseMessage = null;
        if (!empty($request -> getMethod() == 'POST')) {
            $postData = $request -> getParsedBody();
            $projectValidator = v::key('project', v::stringType()->notEmpty())
                                ->key('description', v::stringType()->notEmpty());

            try {
                $projectValidator->assert($postData); // true
                $postData = $request -> getParsedBody();
                $project = new Project();
                $project ->title = $postData['project'];
                $project ->description = $postData['description'];
                $project -> save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                //throw $th;
                $responseMessage = $e->getMessage();
            }
            
        
            # code...
        }
        return $this->renderHTML('addProject.twig',[
            'responseMessage'=>$responseMessage
        ]);
    }
    
}