<?php

namespace App\Controllers;

use App\Models\Project;

class ProjectsController{

    public function getAddProjectAction($request){
        if (!empty($request -> getMethod() == 'POST')) {
            $postData = $request -> getParsedBody();
            $project = new Project();
            $project ->title = $postData['project'];
            $project ->description = $postData['description'];
            $project -> save();
        
            # code...
        }
        include '../views/addProject.php';
    }
    
}