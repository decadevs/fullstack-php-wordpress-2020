<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/3/2020
 * Time: 9:54 PM
 */

if(array_key_exists('submit', $_POST)){

    if(file_exists("memberDb.json") && is_readable("memberDb.json")){
        //read content from the file
        $myFile = file_get_contents("memberDb.json");
        if(!$myFile){
            $output = array();
        }
        else{
            $output = json_decode($myFile, true);
        }
    }
    else{
        $output = array();
    }

    $firstName = Checker($_POST['firstName']) ;
    $lastName = Checker($_POST['lastName']);
    $myArray = ["firstName" => $firstName, "lastName" => $lastName];
    array_push($output, $myArray);
    //Open file in write only mode
    $openFile = fopen("memberDb.json", 'w');
    //Write to file
    fwrite($openFile, json_encode($output, JSON_PRETTY_PRINT));
    //close file
    fclose($openFile);

    function Checker($str){
        return htmlspecialchars(strip_tags($str));
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Member page</title>

    <style>
        #formDiv{
            margin: 100px auto !important; width: 30%;

        }
        #memberForm{
            border: #cccccc thin solid; padding-left: 60px; padding-bottom: 30px; padding-top: 30px;
            border-radius: 8px;
        }
        #memberForm input{width: 80%; margin-bottom: 10px}

    </style>

</head>
<body>

<div id="formDiv">
    <h1>Member Page</h1>
    <form method="post" id="memberForm" action="">
        <div form-group>
            <label for="firstName" >First Name</label>
            <input type="text" name="firstName" id="firstName" class="userName form-control" placeholder="First Name">
        </div>
        <div form-group>
            <label for="lastName" >Last Name</label>
            <input type="text" name="lastName" id="lastName" class="userName form-control" placeholder="Last Name">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>
