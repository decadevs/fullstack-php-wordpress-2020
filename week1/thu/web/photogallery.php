<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/7/2020
 * Time: 11:42 AM
 */
if(isset($_FILES['photofile'])){

    $imageType = ["image/png", "image/jpg", "image/jpeg", "image/gif"];
    $errorMsg = "";
    define('PATHS', 'photos/');
    define('MAXSIZE', 1000000);
    $fileName = $_FILES['photofile']['name'];
    $errValue = $_FILES['photofile']['error'];

    //Check if the user upload image
    if($errValue === 4){
        $errorMsg = "Kindly upload picture \n";
    }
    else{
        if(!in_array($_FILES['photofile']['type'], $imageType)){
            $errorMsg .= "Only images with the following extensions are allow .jpg, .jpeg, .gif, .png\n";
        }
        elseif($_FILES['photofile']['size'] > MAXSIZE){
            $errorMsg .= $fileName." is too large, maximum size allow is 1MB\n";
        }
        elseif($errValue === 7){
            $errorMsg .= "Cannot write to file\n";
        }
        elseif($errValue === 0 && empty($errorMsg)){
            ini_set('date.timezone', 'Africa/Lagos');
            $result = move_uploaded_file($_FILES['photofile']['tmp_name'], PATHS.date('d-m-Y-his').'_'.str_replace(' ', '_',$fileName));
            if($result){$success = $fileName." upload successfully";}
            else{$errorMsg .= "Something went wrong picture can't be uploaded, try again\n";}
        }
        else{$errorMsg .= "Something went wrong picture can't be uploaded, try again\n";}
    }


}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/gallery.css">

    <title>Gallery</title>
</head>
<body>

<div class="container">
    <h1>Photo Gallery</h1>
    <div class="message">
        <?php
        if(!empty($errorMsg)){echo '<div class="alert alert-danger" role="alert">'. nl2br($errorMsg).'</div>';}
        if(empty($errorMsg) && !empty($success)){echo '<div class="alert alert-success" role="alert">'. $success.'</div>';}
        ?>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="photofile">Upload your picture</label>
                <input type="file" class="photo" id="photofile" name="photofile">
            </div>
            <button type="submit" name = "submit" class="btn btn-primary">Upload Picture</button>
        </form>
    </div>

    <div class="showPhoto">
        <?php
            //if(isset($_FILES['photofile'])){
                //Check if the directory exist
                define('PHOTO_DIR', 'photos/');
                if(file_exists(PHOTO_DIR)){
                    $validImages = array();
                    $fileContent = scandir(PHOTO_DIR, 1);
                    $fileType = ["png", "jpg", "jpeg", "gif"];
                    foreach($fileContent as $item){
                        $fileInfo = pathinfo($item);
                        if(array_key_exists('extension', $fileInfo) && in_array(strtolower($fileInfo['extension']), $fileType)){
                            $validImages[] = $item;
                            //echo $item;
                        }
                    }

                    if($validImages){
                        foreach($validImages as $theImage){
                            $rawInfo = pathinfo($theImage);
                            $modelInfo = $rawInfo['filename'];
                            $characterIndex = strpos($modelInfo, '_');
                            $modelName = substr($modelInfo, $characterIndex + 1);
                            echo '<div class="imgDisplay"><div class="contentwrapper"><div class="wrappers"><img src="'.PHOTO_DIR.$theImage.'" alt="'.str_replace("_", " ", $modelName).'"></div><div class="wrappers">'.str_replace("_", " ", $modelName).'</div></div></div>';
                        }
                    }
                }
                else{echo 'Sorry photo gallery cannot be display now, try again later';}
            //}
        ?>
    </div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>