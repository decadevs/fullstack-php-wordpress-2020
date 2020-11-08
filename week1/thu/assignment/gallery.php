<?php

$directory = dirname(__FILE__).'/images';

if(isset($_FILES['photo'])){
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

    $errors = [];

    if($fileSize > 300000) $errors[] = "Please select a file less than 3mb";

    if(!array_key_exists($fileType, $allowedTypes)){
         $errors[] = "Please select a valid image";
    }

    if(!in_array(strtolower($extension), $allowedTypes)){
        $errors[] = "invalid file extension";
    }

    
    if(!file_exists($directory)){
        mkdir($directory);
    }

    if(!is_dir($directory)) $errors[] = $directory."is not a valid directory";

    if(!$errors){
        $destination = $directory.'/igallery'.time().'.'.$extension;
        if(!move_uploaded_file($fileTmpName, $destination)){
            die("could not upload your photo please try again");
        }

        $response = 'done';
    }
  

}

if(file_exists($directory)){

    $images = array_diff(scandir($directory, 1), array('..', '.'));
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igallery</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="upload.js"> </script>
</head>
<body>
<div id ="container">
<header>
<div class="topwrapper">
    <div class="logo"><h1> IGallery </h1></div>
    <div class="tagline">A simple way to share your photos with the public </div>

    <?if($errors):?>
        <ul>
            <? foreach($errors as $error): ?>
            <li> <?= $error ?></li>
            <? endforeach ?>
        </ul>
    <? endif ?>
</div>
</header>

<section id="upload">
    <form method = 'POST' action="?" enctype="multipart/form-data">
    <label id="title">Upload new photo </label><br />
    <label for="photo" id='file'>Select a new File</label>
    <input type="file" name="photo" id="photo" placeholder="Select a new File" accept="image/*"/>
    <input type="submit" id="submit" value="upload" />
    </form>
</section>

<section id="gallery">
    <? if($images): ?>
    <div class="gallerywrapper">
            <? foreach($images as $key => $image): ?>
                <div class="imgbox" onclick="showModal('<?=$image?>')"><img src='images/<?=$image?>' alt='<?=$image?>' /></div>
            <? endforeach ?>
    </div>
    <? endif ?>

    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            

        </div>
    </div>

</section>


</div>  
</body>
</html>