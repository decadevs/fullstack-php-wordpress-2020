<?php

    $database = "database.json";
    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $firstname = trim(htmlspecialchars($_POST['first_name']));
        $lastname = trim(htmlspecialchars($_POST['last_name']));

        if(empty($firstname) || strlen($firstname) < 2) $errors[] = "first name cannot be empty or less than 2 characters";
        if(empty($lastname) || strlen($lastname) < 2)  $errors[] = "last name cannot be empty or less than 2 characters";
        
        if(empty($errors)){

            
            try{
                
                $userInfo = ['first_name' => $firstname, 'last_name' => $lastname];
                
                $dbContent = file_get_contents($database);
                $dbInArray = json_decode($dbContent);
                array_push($dbInArray, $userInfo);
                $newDbContent = json_encode($dbInArray, JSON_PRETTY_PRINT);
                
                file_put_contents($database, $newDbContent);
                
            }catch(Exception $e){
                echo 'wahala Dey Here:', $e->message();
            }
        }
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>week 1 assignment </title>
    <meta charset = "utf8" />


    <style>
    body{
        background: #2C3E4E;
    }
    main{
        background: #EC381F;
        padding: 20px;
        width: 500px;
        margin: 200px auto;
        border-radius: 10px;
    }
    header{
        width: 100%;
        text-align: center;
    }
    form{
        text-align: center;
    }
    .inputsection{
        width: 300px;
        height: 30px;
        font-size: 18px;
        font-weight: 700;
        padding: 20px;
        margin: 0 auto;
        color: #000;
    }

    button{
        width: 150px;
        height: 40px;
        font-size: 14px;
        font-weight: 500;
        margin-top: 50px;
        border-radius: 5px;
        background: #2C3E4E;
        color: #fff;
        border: 0;
    }

    input{
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        outline: none;

    }
    </style>


</head>
<body>
    <main>
        <header>
            <h2> Name Documentation page </h2>
            <? if(!empty($errors)): ?>
            <ul>
               <? foreach($errors as $error): ?>
               <li><?= $error ?></li>
               <? endforeach; ?>
            </ul>
            <? endif; ?>

        </header>
        <section>
            <form method = "POST" action="" >
                <div class="inputsection">
                    <label for="firstname">First Name: </label>
                    <input type="text" id="firstname" name="first_name" placeholder="firstname" />
                </div>

                <div class="inputsection">
                    <label for="lastname">Last Name: </label>
                    <input type="text" id="lastname" name="last_name" placeholder="lastname" />
                </div>
                
                <button> Submit </button>
            </form>
        </section>
    </main>
</body>
</html>