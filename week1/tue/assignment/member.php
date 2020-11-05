<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = ($_POST["first-name"]);
    $new_first = filter_var($first_name, FILTER_SANITIZE_STRING);

    $last_name = ($_POST["last-name"]);
    $new_last = filter_var($last_name, FILTER_SANITIZE_STRING);
    $new_array=array("first name"=>$new_first, "last name"=>$new_last);


    $database="database.json";
    $data= json_encode($new_array, JSON_PRETTY_PRINT);
    if(file_get_contents($database)){
    $content=file_get_contents($database);
    $to_array=json_decode($content, true);
    array_push($to_array, $new_array);
    $to_json=json_encode($to_array, JSON_PRETTY_PRINT);
    file_put_contents($database,$to_json);


    }else{
    file_put_contents($database,$data);

    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
    <metacharset="utf-8">
    <style>
        body, html {
    height: 50%;
    background-image: url("bulb-background.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }

    * {
    box-sizing: border-box;
   
    }

    .container {
    margin: 60px auto;
    max-width: 500px;
    padding: 100px;
    margin-top: 90px;
    padding-top: 90px;
    background-color: white;
    border-radius: 50px;
    justify-content: space-between;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, .4);
    flex-wrap: wrap;

    }

    input[type=text] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus {
    background-color: #ddd;
    outline: none;
    }

    button {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 90px;
    opacity: 0.9;
    border-radius: 30px;
    text-align: center;
    font-family: fantasy;
    }

    button:hover {
    opacity: 1;
    text-transform: uppercase;
    }

    .error{
    color:red;
    }

</style>
</head>
<body>
        <form method="post" class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            First Name: <input type="text" name="first-name" pattern="[A-Za-z]*" required>
            
            <br>
            Last Name: <input type="text" name="last-name" pattern="[A-Za-z]*" required>
            
            <br>
            <button type="submit" >Submit</button>
            <p><strong>Note:</strong> Pls ensure to enter only alphabeths.</p>
        </form>
</body>
