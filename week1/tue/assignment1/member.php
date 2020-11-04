<?php

$message = '';
$error = '';

if(isset($_POST["submit"])) {

    if(empty($_POST["firstname"])) {
        $error = "<label class='text-danger'>Enter your first name</label>";
    }
    else if(empty($_POST["lastname"])) {
        $error = "<label class='text-danger'>Enter your last name</label>";
    }
    else {
        if(file_exists('database.json')) {
            echo "DB File exists";
            $currentDataInFile = file_get_contents('database.json');
            $arrayData = json_decode($currentDataInFile, true);
            $newData = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname']
            );
            $arrayData[] = $newData;
            $result = json_encode($arrayData);
            if (file_put_contents('database.json', $result)) {
                $message = "<label class='text-success'>File Appended Successfully</label>";
            }
        }
        else {
            $error = 'Cannot find the JSON file';
        }
    }
}
?>
<!doctype html>
<html>
<head>
</head>
<body>
<div style="text-align: center;">
    <h1>Form</h1>
    <form name="form1" method="post" action="">
        <?php
            if(isset($error)) {
                echo $error;
            }
        ?>
        <p>
            <label for="firstname">First Name: </label>
            <input type="text" name="firstname" id="firstname" placeholder="Your first name" autofocus required>
        </p>
        <p>
            <label for="lastname">Last Name: </label>
            <input type="text" name="lastname" id="lastname" placeholder="Your last name" autofocus required>
        </p>
        <p style="text-align: center;">
            <input type="submit" name="submit" id="submit" value="Submit">
        </p>

        <?php
            if(isset($message)) {
                echo $message;
            }
        ?>
    </form>
</div>
</body>
</html>