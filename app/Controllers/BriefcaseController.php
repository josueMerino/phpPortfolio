<?php

namespace App\Controllers;

class BriefcaseController extends BaseController {
    public function accessBriefcase(){
        return $this->renderHTML('addBriefcase.twig');
    }
}

?>