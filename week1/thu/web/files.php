<?php
$validMimeTypes = ['image/png', 'image/jpeg','image/jpg','image/gif'];
$errorMsg = "";

    if($_SERVER["REQUEST_METHOD"] === "POST" && $_FILES['image']){
        // echo "<pre>";
        // print_r($_FILES['image']['name']);
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r($_FILES['image']);
        // echo "</pre>";
        $type = $_FILES['image']['type'];
        $name = $_FILES['image']['name'];
        if(!in_array($type,$validMimeTypes)){
            $errorMsg = "Invalid file format";
        }
        if(!$errorMsg){
            var_dump($name);
            // var_dump($_FILES['image']['tmp_name']);
            $isUploaded = move_uploaded_file($_FILES['image']['tmp_name'], $name);
            if(!$isUploaded){
                die("Error in uploading");
            }
            die('file uploaded successfully');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handling Files</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <?= $errorMsg; ?>
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
