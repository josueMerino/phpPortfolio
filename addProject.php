<?php

/*Crear una clase que esté llamando a la conexión a la base de datos*/ 

use App\Models\Project;

if (!empty($_POST)) {
    $project = new Project();
    $project ->title = $_POST['project'];
    $project ->description = $_POST['description'];
    $project -> save();
    
    # code...
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Add Project</title>
</head>
<body>
    <nav>
    <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Add Project</a>
    <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="addJob.php">Add Job</a></li>
    </ul>
    </div>
    </nav>
    <div class="container">
    <form action="addProject.php" method="post">

    <label for="">Project</label>
    <input type="text" name="project"/><br/>

    <label for="">Description</label>
    <input type="text" name="description"/><br/>

    <center>
        <button class="btn waves-effect waves-light" type="submit" name="action">
        Submit
        <i class="material-icons right">send</i>
        </button>
    </center>
    </form>

    </div>
    
</body>
</html>
 