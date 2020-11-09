<?php 
    $dir    = 'images';
    $files = scandir($dir);
    for ($i=0; $i<count($files); $i++)
    {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
            );

        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (in_array($ext, $supported_file)) {
            $filePath = "images/".$image;
            echo '<img src="'.$filePath.'" alt="flex-gallery" class="myImg"/>';

        } else {
            continue;
        }
    }




