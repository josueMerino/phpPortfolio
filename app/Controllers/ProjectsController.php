<?php

namespace App\Controllers;

use App\Models\Project;

class ProjectsController extends BaseController{

    public function getAddProjectAction($request){
        if (!empty($request -> getMethod() == 'POST')) {
            $postData = $request -> getParsedBody();
            $project = new Project();
            $project ->title = $postData['project'];
            $project ->description = $postData['description'];
            $project -> save();
        
            # code...
        }
        return $this->renderHTML('addProject.twig');;
    }
    
}