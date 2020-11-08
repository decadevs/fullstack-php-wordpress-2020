<?php 

$validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];

$errorMsg = '';
$success = '';


if(isset($_FILES['photo'])) {

    // tring  to upload a file
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];

    if(!in_array($type, $validMimeTypes)) {
        $errorMsg = "Invalid file format";
    }

    if(!$errorMsg) {
        // good to upload
        move_uploaded_file($_FILES['photo']['tmp_name'], $name);
        $success = "Uploaded";
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
            width: 800px;
            padding: 100px;
            font-size: 24px;
        }
    </style>
</head>
<body class="container">

<form action="files.php" method="post" enctype="multipart/form-data">
<?php 
echo $errorMsg;

echo $success;
?>
    <input type="file" name="photo" id="">
    

    <button type="submit">Upload</button>
</form>
    
</body>
</html>
