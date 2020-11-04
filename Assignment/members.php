<?php

    $database = "database.json";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];

        $userInfo = ['first_name' => $firstname, 'last_name' => $lastname];
        

        try{

            $dbContent = file_get_contents($database);
            $dbInArray = json_decode($dbContent);
            array_push($dbInArray, $userInfo);
            $newDbContent = json_encode($dbInArray, JSON_PRETTY_PRINT);

            file_put_contents($database, $newDbContent);

        }catch(Exception $e){
            echo 'wahala Dey Here:', $e->message();
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>week 1 assignment </title>
    <meta charset = "utf8" />
</head>
<body>
<main>
<header>
    <h2> Name Documentation page </h2>
</header>
<section>
    <form method = "POST" action="" >
    <div>
        <label for="firstname">First Name: </label>
        <input type="text" id="firstname" name="first_name" placeholder="firstname" />
    </div>

    <div>
        <label for="lastname">Last Name: </label>
        <input type="text" id="lastname" name="last_name" placeholder="lastname" />
    </div>
    <button> Submit </button>
    </form>
</section>
</main>
</body>
</html>