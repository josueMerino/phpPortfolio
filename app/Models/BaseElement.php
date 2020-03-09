<?php

namespace App\Models;

class BaseElement implements Printable 
{
    protected $title;
    public $description;
    public $visible = true;
    public $months;

    

    public function __construct($title, $description)
    {
        $this->setTitle($title);
        $this->description = $description;
    }

    public function setTitle($t){
        if ($t== '') {
            # code...
            $this->title = 'N/A';
        }
        else{
            $this->title = $t;
        }
        
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDurationAsString(){
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
      
        if ($years <= 0) {
          # code...
          return "$extraMonths months";
        }
        else if ($extraMonths <= 0) {
          # code...
          return "$years years";
        } 
        else {
          
          return "$years years $extraMonths months";
        }
        
      }

      public function getDescription(){
        return $this->description;
      }
}



?>