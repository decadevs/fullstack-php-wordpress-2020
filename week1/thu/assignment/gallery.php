<?php 

$validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
$color = 'black';
$errorMsg = '';
$success = '';

if(isset($_FILES['photo'])) {

    // tring  to upload a file
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];

    if(!in_array($type, $validMimeTypes)) {
        $errorMsg = "Invalid picture format";
        $color = 'red';
    }

    if(!$errorMsg) {
        // good to upload
        move_uploaded_file($_FILES['photo']['tmp_name'], "./gallery/$name");
        $success = "Picture uploaded successfully";
        $color = 'green';
    }
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>
    <!-- Load jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <style>
        .container{
            width: 100%;
            font-size: 17px;
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
            flex-wrap: wrap;
            align-content: flex-start;
        }

        .image {
            margin: 20px;
        }

        .message {
            position: relative;
            height: 20px;
            width: auto;
            color: <?php echo $color ?>;
            padding: 15px;
            text-align: center;
        }

        .modal_box {
            display: flex;
            justify-content: space-around;
            visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: black;
        }

        .modal-image {
            position: absolute;
            align-self: center;
            width: 60%;
            height: 80%;
            z-index: 2;
        }

        .close {
            color: white;
            weight: bold;
            position: relative;
            left:  600px;
            top: 30px;
        }

    </style>
</head>
<body class="container">
    <section>
    <div class="modal_box"><span class="close">C L O S E</span></div>
        <div class="topdiv">
            <h1>iGallery</h1>
            <p>A simple way to share your</p>
            <p>photos with the public</p>
        
            <div class="formdiv">
                <h4 class="phototitle">Upload new photo</h4>
                <form action="gallery.php" method="post" enctype="multipart/form-data">
                    <input class="file" type="file" name="photo">
                    
                    <button class="submit" type="submit">Upload</button>
                    <br><br>
                </form>
                <div class="message">
                    <?php 
                        echo $errorMsg;
                        echo $success;
                    ?> 
                </div>
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
    <script>
        $('body').on('click','img',function(){
            let image = $('.gallery img').attr('src');
            $('.modal_box').css("visibility", "visible");
            $('.modal_box').append(`<img class='modal-image' src='${image}' alt='${image}'>`);

            var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
            ];
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        });

        $('.close').on('click', function(){
            $('.modal_box').css("visibility", "hidden");

            // un-lock scroll position
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        });
    </script>
</body>
</html>