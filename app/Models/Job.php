<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Job extends Model {

    protected $table = 'jobs';

    public function getDurationAsString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
      
        if ($years <= 0) {
          # code...
          return "Job duration: $extraMonths months";
        }
        else if ($extraMonths <= 0) {
          # code...
          return "Job duration: $years years";
        } 
        else {
          
          return "Job duration: $years years $extraMonths months";
        }
        
      }

    

}

/*public function __construct($title, $description){
        $newTitle = 'Job: '. $title;
        $this->title = $newTitle;
    }*/ 

?>