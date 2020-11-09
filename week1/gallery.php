<?php

    $validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
    $dir    = 'images/';

    $errorMsg = '';
    $success = '';


    if(isset($_FILES['photo'])) {

        // tring  to upload a file
        $name = $_FILES['photo']['name'];
        $size = $_FILES['photo']['size'];
        $type = $_FILES['photo']['type'];
        $tmp_name = $_FILES['photo']['tmp_name'];

        if(!in_array($type, $validMimeTypes)) {
            $errorMsg = "Invalid file format";
        }

        if(!$errorMsg) {
            move_uploaded_file($tmp_name, $dir. $name);
            $success = "Uploaded";
        }
    
    }

    $images = [];
    if (!scandir($dir)){
        $error_msg = 'upload a picture';
    }
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
            $images[] = $image;
        } else {
                continue;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>iGallery</title>
    <style>
        
    </style>
</head>
<body>
    <header>
        <h1>iGallery</h1>
        <p>A simple way to share your <span>photos with the public</span></p>
    </header>

    <main>

        <section class='form-section'>
            <form action="" method="post", enctype="multipart/form-data">
                <p>Upload  new photo</p>
                <div class="input-group">
                    <div class="file-input">
                        <input type="file" name="photo" class="file" id="file">
                        <label for="file">Select a new file</label>
                    </div>
                    <button type="submit">Upload</button>
                </div>
                <div>
                    <?php if ($errorMsg): ?>
                        
                        <p class="message"><?php echo $errorMsg; ?></p>

                    <?php endif; ?>

                    <?php if ($success): ?>
                        
                        <p class="message"><?php echo $success; ?></p>

                    <?php endif; ?>
                </div>
            </form>
        </section>

        <section>

            <div class='upload-header'>
                <h2>Latest Photos</h2>
            </div>

            <div class="upload-group">

                <?php if (empty($images)): ?>
                    <p>No images found..<p>
                <?php else: ?>

                    <?php foreach ($images as $image) : ?>
                        <figure class= "image">
                            <img src='<?php echo "images/$image"; ?>' alt='<?php echo substr($image, 0, -4); ?>' height="200px"; width="200px"; id="myImg">
                        </figure>
                        <figure id="myModal" class="modal">

                        <!-- The Close Button -->
                        <span class="close">&times;</span>

                        <!-- Modal Content (The Image) -->
                        <img class="modal-content" id="img01">

                        </figure>
                    
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>

        </section>

    </main>

</body>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.querySelectorAll("#myImg");
    console.log(img);
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.forEach(element => {
            element.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
        }
    })

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
</html>