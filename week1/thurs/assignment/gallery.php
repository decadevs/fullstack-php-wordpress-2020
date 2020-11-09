<?php

  if(isset($_POST["submit"])) {
    
      $ext='';
      //use exif to check mime type
      $mime_type = exif_imagetype($_FILES['imgFile']['tmp_name']);
      
      switch ($mime_type) {
        case IMAGETYPE_JPEG:
          $ext= 'jpg';
          break;
        case IMAGETYPE_PNG:
          $ext= 'png';
          break;
        case IMAGETYPE_GIF:
          $ext= 'gif';
          break;
        default:
          echo 'This is not an image';
          return;
      }

    // move file to a new place with a new name
    if (isset($_FILES['imgFile'])) {
      move_uploaded_file(
          $_FILES['imgFile']['tmp_name'],
          sprintf('./uploads/%s.%s',
              sha1_file($_FILES['imgFile']['tmp_name']),
              $ext
          )
    );
    echo "Successfully Uploaded";
  }
  }

?>

 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="gallery.css">
</head>
<body>
  <div class="container">
    <form method="POST" name="form1" enctype="multipart/form-data">
    <h1> iGallery </h1>
    <p> A simple way to share your <br> photos with the public </p>
    <div class="upload-container">
      <div class="upload-mini-container">
        <label class="upload-label" for="image">Upload new photo</label>
        <div class="upload">
              <input type="file" accept="image/*" name="imgFile" id="image" placeholder="Select a new file" autofocus required>
              <button class="upload-btn" name="submit" id="submit" type="submit">Upload</button>
            </div>
        </div>
      </div>
      <div>
      <p class="latest-photos">Latest Photos</p>
      <div class="img-container">
        <?php
          // get files from the directory and then display them
            $dirname = "./uploads/*";
            $files = glob($dirname);
              for ($i=0; $i<count($files); $i++) {
                $image = $files[$i];
                echo 
                '<div class="img-wrapper">
                <a href="'.$image .'" data-lightbox="'.random_int(1,1000).'">
                <img class="imgs" src="'.$image .'" alt="an image of a dog" />
                </a>
                </div>';
                    
              }
        ?>
      </div>
      </div>
    </form>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
</body>
</html>