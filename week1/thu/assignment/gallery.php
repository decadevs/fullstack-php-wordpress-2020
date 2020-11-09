<?php

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$errorMsg = '';
$success = '';

$validMimeTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

if (isset($_FILES['photo'])) {
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];

    if (!in_array($type, $validMimeTypes)) {
        $errorMsg = "Invalid file format";
    }

    if (!$errorMsg) {
        //Proceed with file upload

        $img_file_path = "./img";

        move_uploaded_file($_FILES['photo']['tmp_name'], "./img/$name");
        $success = "uploaded successfully";
    }


    // die($type);

    // echo "<pre />";
    // print_r($_FILES);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="header-section">
            <h2>iGallery</h2>
            <p>A simple way to share your photos with the public</p>
        </header>

        <div class="header-section">
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                echo $errorMsg;
                echo $success;
                ?>
                <input type="file" name="photo">
                <button type="submit">Upload</button>
            </form>
        </div>


        <div class="gallery header-section">
            <h3>Latest Photos</h3>
            <div class="parent">
                <?php
                $dirname = "./img";
                $photos = scandir($dirname, SCANDIR_SORT_NONE);
                $ignore = array(".", "..");
                foreach ($photos as $photo) {
                    if (!in_array($photo, $ignore)) {
                ?>
                        <img class="child" id="myImg" src="<?php echo $dirname . "/" . $photo; ?>" alt='photo'>

                <?php
                    }
                }
                ?>

                <div id="myModal" class="modal">
                    <span class="modal-close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

            </div>
        </div>

    </div>

    <script src="app.js"></script>
</body>

</html>