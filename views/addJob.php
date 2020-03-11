

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Add Job</title>
</head>
<body>
<nav>
    <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Add Job</a>
    <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="/projects/add">Add Project</a></li>
    </ul>
    </div>
    </nav>
    <div class="container">
    <form action="/jobs/add" method="post">
        <label for="">Title:</label>
        <input type="text" name="title"><br/>

        <label for="">Description</label>
        <input type="text" name="description"><br/>

        <label for="">Months:</label>
        <input type="number" name="months" id=""><br/>

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