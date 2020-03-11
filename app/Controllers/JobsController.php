<?php

namespace App\Controllers;

use App\Models\Job;

class JobsController{
    
    public function getAddJobAction($request){
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $job = new Job();
            $job ->title = $postData['title'];
            $job ->description = $postData['description'];
            $job ->months = $postData['months'];
            $job -> save();
    
            # code...
        }

        include '../views/addJob.php';
    }
}