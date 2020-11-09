<?php 

$valid_image_extension = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

$errorMsg = '';
$success = '';

$target_dir = 'images/';

if(isset($_FILES['photo']) && is_dir($target_dir)) {

    $type = $_FILES['photo']['type'];
    $target_file = $target_dir . $_FILES['photo']['name']; 

    if(!in_array($type, $valid_image_extension)) {
        $errorMsg = "Invalid file format";
    }

    if(!$errorMsg) {
        
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
        
        $success = "Uploaded";
    }
 
}

$photo_files = array_diff(scandir($target_dir), array('..','.'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
    
    <style>
        body{
            width: 100%;
            margin: 20px;
            font-size: 24px;
    
        }
        h4, .container{
            text-align: center
        }
        .form{
            display:flex;
            flex-direction: column;
            margin-left: 20%;
            padding-left: 20px;
        }
        .label{
           display: flex; 
        }

        button {
            cursor: pointer;
            width: 150px;
            opacity: 0.9;
            border-radius: 10px;
            text-align: center;
        
            
        }
       
        button:hover {
            opacity: 1;
            text-transform: uppercase;
        }
        .photo_grid{
            width: 80%;
            margin: auto;
            border:5px solid #8f8698;
            display:flex;
            justify-content: space-evenly;
            align-items:start;
            flex-wrap:wrap;
            
        }
            
        img  {
            width:250px;
            height:250px;
            float: left;
            border: 2px solid #fcf;
            border-radius: 5px;
            -webkit-transition: -webkit-transform .15s ease;
            -moz-transition: -moz-transform .15s ease;
            -o-transition: -o-transform .15s ease;
            -ms-transition: -ms-transform .15s ease;
            transition: transform .15s ease;
            position: relative;
        }

        img:hover  {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -o-transform: scale(1.05);
            -ms-transform: scale(1.05);
            transform: scale(1.05);
            z-index: 0;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 5;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            
        }

        .modalImage {

            position: relative;
            background-color: #fefefe;
            left: 30%;
            top: 20%;
            width: 50%;
            height: 50%;
            max-width: 500px;
            border: 1px solid red;
            animation-name:zoom; 
            animation-duration:0.6s;
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }


        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: rgb(255, 0, 0);
            cursor: pointer;
        }
        

    </style>
</head>
<body>
    <div class="container">
        <h1>iGallery</h1>
        <p>A simple way to share your photos with the public</p>
    </div>

    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <h5>Upload  new photo</h5>
            <div class="label">
            <?php 
            echo $errorMsg;
            
            echo $success;
            ?>
            <input type="file" name="photo" id="">
            
            

            <button type="submit">Upload</button>
            </div>
    </form>
    <h4>Latest Photos</h4>
    <div class="photo_grid">
        <?php foreach($photo_files as $key): ?>
            <div class="photo">
                <img class="images" src=<?php echo ($target_dir.$key); ?>>
            </div>
            
        <?php endforeach; ?>
    </div>
    <div class="modal">
    <span class="close">×</span>
    <img class="modalImage" id="img01" />
    </div>
    
    <script>
        let modalEle = document.querySelector(".modal");
        let modalImage = document.querySelector(".modalImage");
        Array.from(document.querySelectorAll(".images")).forEach(item => {
        item.addEventListener("click", event => {
            modalEle.style.display = "block";
            modalImage.src = event.target.src;
            
        });
        });
        document.querySelector(".close").addEventListener("click", () => {
        modalEle.style.display = "none";
        });
    </script>
</body>
</html>