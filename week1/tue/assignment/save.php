<?php
    $errors = [];
    if(isset($_POST["add"])){
        $firstname = htmlspecialchars($_POST["firstname"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        if($firstname === ""){
            $errors[] = "Firstname is empty";
        }
        if($lastname === ""){
            $errors[] = "Lastname is empty";
        }

        if(!empty($errors)){
            foreach ($errors as $key => $error) {
                echo $error;
            }
        }

        if(empty($errors)){
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
    }
    
?>
<?php

?>