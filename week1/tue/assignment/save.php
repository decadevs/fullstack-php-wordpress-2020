<?php

    // $member = [
    //     'last_name' => 'latest name',
    //     'first_name' => 'latest_firstname'
    // ];
    if(isset($_POST["add"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $member = [
            'last_name' => $firstname,
            'first_name' => $lastname
        ];

        $filename = getcwd().'/database.json';
        $inp = file_get_contents($filename);
        echo $inp;
            // print_r($inp, "what\n");
            // echo $inp."how?";
        if($inp === ""){
            echo "yes";
            $tempArray = [];
            array_push($tempArray, $member);
            $jsonData = json_encode($tempArray);
            file_put_contents($filename, $jsonData);
        }else{

            // $inp = file_get_contents($filename);
            // print_r($inp);
            // echo "<br/>\n";
            $tempArray = json_decode($inp);
            array_push($tempArray, $member);
            $jsonData = json_encode($tempArray);
            echo "<br/>\n";
            print_r($jsonData);
            file_put_contents($filename, $jsonData);
        }
    }
    // $filename = getcwd().'/database.json';
    // print_r($filename);

   
    // $inp = file_get_contents('database.json');
    // // print_r($inp, "what\n");
    // // echo $inp."how?";
    // if($inp === 'false'){
    //     echo "yes";
    //     $tempArray = [];
    //     array_push($tempArray, $member);
    //     $jsonData = json_encode($tempArray);
    //     file_put_contents('database.json', $jsonData);
    // }else{
    //     $tempArray = json_decode($inp);
    //     print_r($tempArray, "check\n");
    //     array_push($tempArray, $member);
    //     $jsonData = json_encode($tempArray);
    //     file_put_contents('database.json', $jsonData);
    // }

?>
