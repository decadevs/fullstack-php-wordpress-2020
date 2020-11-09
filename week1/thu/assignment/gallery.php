<?php

$directory = dirname(__FILE__).'/images';

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

    <ul></ul>
</div>
</header>

<section id="upload">
    <form method = 'POST' action="" enctype="multipart/form-data">
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