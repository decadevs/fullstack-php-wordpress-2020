<?php

$directory = dirname(__FILE__).'/images';


    $filename = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $fileSize = $_FILES['photo']['size'];

    ['extension' => $extension] = pathinfo($filename);

    $response = 0;

    $allowedTypes = [
        'image/png' => 'png', 
        'image/jpeg' => 'jpeg', 
        'image/jpg'  => 'jpg', 
        'image/gif' => 'gif'
    ];

    $error = '';

    if($fileSize > 300000) $error = "Please select a file less than 3mb";

    if(!array_key_exists($fileType, $allowedTypes)){
         $error = "Please select a valid image";
    }

    if(!in_array(strtolower($extension), $allowedTypes)){
        $error = "invalid file extension";
    }

    
    if(!file_exists($directory)){
        mkdir($directory);
    }

    if(!is_dir($directory)) $error = $directory."is not a valid directory";

    if(!$error){
        $destination = $directory.'/igallery'.time().'.'.$extension;
        if(!move_uploaded_file($fileTmpName, $destination)){
            die("could not upload your photo please try again");
        }

        $response = 1;
    }else{

        echo $error;
        exit;
    }

  echo $response;
  exit;



