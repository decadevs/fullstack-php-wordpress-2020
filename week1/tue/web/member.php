<?php

$width = "400";

if (isset($_POST["submit"])) {
  if(file_exists("database.json")) {
    $dataInFile = file_get_contents("database.json");
    $arrayOfData = json_decode($dataInFile, true);
      $newData = [
        "firstname" =>  $_POST["firstname"],
        "lastname" =>  $_POST["lastname"]
      ];
    $arrayOfData[] = $newData;
    $result = json_encode($arrayOfData);
      if (file_put_contents("database.json", $result)) {
      $message = "<script type='text/javascript'>alert('Data successfully updated');</script>";
      }
  } 
  else {
    $error = "Cannot find the JSON file";
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
        .container {
            width: <?php echo $width . "px;" ?>
            margin: 100px auto;
            text-align: left;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }        
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        input[type=submit] {
          width: 100%;
          background-color: #2ea44e;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
  <h1>Member Form</h1>
    <form class="form" name="form1" method="post" action="">
        <p>
          <label for="firstname">First Name: </label>
          <input type="text" name="firstname" id="firstname" placeholder="Your name..." autofocus required>
        </p>
        <p>
          <label for="lastname">Last Name: </label>
          <input type="text" name="lastname" id="lastname" placeholder="Your last name..." autofocus required>
        </p>
        <p style="text-align: center;">
          <input type="submit" name="submit" id="submit" value="Submit">
        </p>
    <?php
        if(isset($message)) {
           echo $message;
        } else {
          echo $error;
        }
    ?>
    </form>
</div>
</body>
</html>