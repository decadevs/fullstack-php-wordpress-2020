<?php 

$validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg','image/jpg', 'image/gif'];

if(isset($_FILES['photo'])) {

    // tring  to upload a file
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];

    if(!in_array($type, $validMimeTypes)) {
        echo "Invalid file format";
    }
    else {
        // good to upload
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$name);
        echo "Image uploaded Successfully";
    }
 
}else{
    echo "Error uploading file";
}
