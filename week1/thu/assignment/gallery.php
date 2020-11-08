<?php 

$validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];

$errorMsg = '';
$success = '';

if(isset($_FILES['photo'])) {

    // tring  to upload a file
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];

    if(!in_array($type, $validMimeTypes)) {
        $errorMsg = "Invalid picture format";
    }

    if(!$errorMsg) {
        // good to upload
        move_uploaded_file($_FILES['photo']['tmp_name'], "./gallery/$name");
        $success = "Picture uploaded successfully";
    }
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>

    <style>
        .container{
            width: 100%;
            font-size: 15px;
        }

        .image {
            width: 300px;
            height: 300px;
        }

        .topdiv {
            display: flex;
            flex-direction: column;
            padding: 20px 0px;
            text-align: center;
        }


        label {
            display: block;
        }

        .formdiv {
            width: 70%;
            margin-top: 50px;
            align-self: center;
            text-align: left;
        }

        p, h4 {
            margin: 0px;
        }

        form {
            display: flex;
            justify-content: space-evenly;
        }

        .submit {
            height: 40px;
            width: 120px;
            border: none;
            border-radius: 8px;
            color: white;
            background-color: blue;
        }

        .file {
            display: flex;
            justify-content: column;
            height: 20px;
            width: 40vw;
            border: 2px solid #999;
            padding: 10px;
        }

        .phototitle {
            padding: 5px;
            margin: 0px 70px;
        }

        .gallery {
            margin: 40px;
            display: flex;
            /* justify-content: space-around; */
            flex-wrap: wrap;
            align-content: flex-start;
        }

        .image {
            margin: 20px;
        }

    </style>
</head>
<body class="container">
    <section>
        <div class="topdiv">
            <h1>iGallery</h1>
            <p>A simple way to share your</p>
            <p>photos with the public</p>
        
            <div class="formdiv">
                <h4 class="phototitle">Upload new photo</h4>
                <form action="gallery.php" method="post" enctype="multipart/form-data">
                <?php 
                echo $errorMsg;
                echo $success;
                ?> 
                    <input class="file" type="file" name="photo">
                    
                    <button class="submit" type="submit">Upload</button>
                    <br><br>
                </form>
            </div>
            <hr>
        </div>
    </section>
    <div class="gallery">
        <?php
            $pictures = scandir("./gallery", SCANDIR_SORT_NONE);
            foreach ($pictures as $picture) { 
                if ($picture !== "." && $picture !== "..") {
                    ?>
                <img class="image" src="<?php echo './gallery/' . $picture; ?>" alt="image" >
                <br><br>
            <?php }
            }
        ?>
    </div>
</body>
</html>