<?php
    $message = '';
    $error = '';
    if(isset($_POST["submit"])){
        if(empty($_POST["firstname"])){
            $error = "<h5 class='text-center'>Enter Firstname</h5>";
        }
        else if(empty($_POST["lastname"])){
            $error = "<h5 class='text-center'>Enter Lastname</h5>";
        }
        else {
            if(file_exists('database.json')){
                $current_data = file_get_contents('database.json');
                $old_data = json_decode($current_data, true);
                $new_data = array(
                    'firstname'     => strip_tags($_POST['firstname']),
                    'lastname'    => strip_tags($_POST['lastname']) 
                );
                array_push($old_data, $new_data);
                $final_data = json_encode($old_data, JSON_PRETTY_PRINT);
                if(file_put_contents('database.json', $final_data)){
                    $message = "<h5 class='text-center'>Successful</h5>";
                }
            } 
            else {
                $error = 'JSON file not exists';
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Task</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,900" rel="stylesheet">
        <style>

        #body {
        font-family: 'Nunito';
        background-color:  #5d8fc9;
        }

        #login-card{
            width:350px;
            border-radius: 25px;
            margin:150px auto;
        
        }

        #details{
            border-radius:30px;
            background-color: #ebf0fc;
            border-color: #ebf0fc;
            color: #9da3b0;
        }

        #button{
            border-radius:30px;

        }

        #btn{
        position: absolute; 
        bottom: -35px; 
        padding: 5px;
        margin: 0px 55px;
        align-items: center;
        border-radius: 5px"
        }

        #container{
            margin-top:25px;
        }

        .btn-circle.btn-sm { 
                    width: 40px; 
                    height: 40px; 
                    padding: 2px 0px; 
                    border-radius: 25px; 
                    font-size: 14px; 
                    text-align: center;
                    
                    margin: 8px;
                }
        </style>
    </head>

    <body id="body">

        <div id="login-card" class="card">
        <div class="card-body">
        <h2 class="text-center">Login form</h2>
        <br>
        <form action="" method="post" name="form1">
            <?php 
            if(isset($error)){
                echo $error;
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" id="details" placeholder="Enter firstname" pattern= "[A-Za-z]*" name="firstname">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" id="details" placeholder="Enter lastname" name="lastname" pattern= "[A-Za-z]*">
            </div>
            <!-- <button type="submit" id="button" class="btn btn-primary deep-purple btn-block ">Submit</button> -->
            <input type="submit" name="submit" id="button" class="btn btn-primary deep-purple btn-block "value="Submit">
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>
        </form>
        </div>
        <div>

    </body>
</html>





