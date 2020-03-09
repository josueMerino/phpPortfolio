<?php


use App\Models\{Job, Project};


$jobs = Job::all();

$projects = Project::all();

function printElement($job){
  //contenido de la función
  /*if ($job->visible == false) {
    # code...
    return;
  }*/


  echo '<li class="work-position">';
  echo '<h5>'.$job->title.'</h5>';
  echo '<p>'.$job->description.'</p>';
  echo '<p>'.$job->getDurationAsString().'</p>';
  echo '<strong>Achievements:</strong>';
  //echo '<p>'.$totalMonths.'</p>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';
  echo '<ul>';

}

  



?>