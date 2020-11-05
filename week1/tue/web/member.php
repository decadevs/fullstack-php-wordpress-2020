<?php
    $message = "";
    $error = '';
    if(isset($_POST["submit"]))
    {
        
        if(empty($_POST["firstname"]))
        {
            $error = "<div class='error'>Enter your first name</div>";
        }
        else if(empty($_POST["lastname"]))
        {
            $error = "<div class='error'>Enter your last name</div>";
        }
        else
        {
            $new_data = array(
                'firstname' => $_POST["firstname"],
                'lastname' => $_POST["lastname"]
            );

            if(file_exists('database.json'))
            {
                $current_data = file_get_contents('database.json');
                $data_to_array = json_decode($current_data, true);
                $data_to_array[] = $new_data;
                $final_data = json_encode($data_to_array);

                if(file_put_contents('database.json', $final_data))
                {
                    $message = "<div class='success'>Data Saved Successfully</div>";

                }
            }
            else
            {
               
               $error = "<div class='error'>Database File not found</div>";

            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>

    <style>
        * {
        box-sizing: border-box;
        }

        .title-lead{
            text-align: center;
        }

        .error{
            font-weight: bold;
            padding: 15px;
            background-color: #f44336;
            color: white;
        
        }
        .success{
            font-weight: bold;
            padding: 15px;
            background-color: #6BBD5E;
            color: white;
        
        }

        input[type=text]{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        label {
        padding: 12px 12px 12px 0;
        font-weight: bold;
        display: inline-block;
        }

        input[type=submit] {
        color: #47A8F5;
        padding: 12px 50px;
        border: 2px solid #47A8F5;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
        height: 50px;
        font-size: 19px;
        }

        input[type=submit]:hover {
        background-color: #47A8F5;
        color: white;
        }

        .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 30px;
        margin: 50px;
        }

        .row{
            margin-bottom: 20px;
        }


    </style>
</head>
<body>

    <div class="container">
        <div class="title-lead">
            <h1>Entry Form</h1>
        </div>

    <form method="post">
        <div class="row">
            <?php
                if(isset($error)){
                    echo $error;
                }
                if(isset($message)){
                    echo $message;
                }
            ?>
        </div>

        <div class="row">
        <div class="">
            <label for="fname">First Name</label>
        </div>
        <div class="">
            <input type="text" id="fname" name="firstname" placeholder="Your first name..">
        </div>
        </div>

        <div class="row">
        <div class="">
            <label for="lname">Last Name</label>
        </div>
        <div class="">
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        </div>
        </div>
    
        <div class="row">
        <div class="">
            <input type="submit" name="submit" value="Submit">
        </div>
        </div>
        
    </form>
    </div>

        
</body>
</html>