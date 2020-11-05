<?php

    if(isset($_POST["add"])){
        $firstname = mysqli_escape_string($_POST["firstname"]);
        $lastname = mysqli_escape_string($_POST["lastname"]);
        $member = [
            'last_name' => $firstname,
            'first_name' => $lastname
        ];

        $filename = 'database.json';
        $inp = file_get_contents($filename);
        if($inp === ""){
            $tempArray = [];
            array_push($tempArray, $member);
            $jsonData = json_encode($tempArray);
            file_put_contents($filename, $jsonData);
        }else{
            $tempArray = json_decode($inp);
            array_push($tempArray, $member);
            $jsonData = json_encode($tempArray);
            file_put_contents($filename, $jsonData);
        }
    }
    
?>
