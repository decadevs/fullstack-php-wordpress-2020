<?php 
$validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $errorMsg = '';
    if(isset($_FILES['photo'])) {

        // tring  to upload a file
        $name = clean($_FILES['photo']['name']);
        $type = clean($_FILES['photo']['type']);
    
        session_start();
        if($name === "") {
            $errorMsg = "You did not select a picture.";
            $_SESSION["message"] = $errorMsg;
        }else if(!in_array($type, $validMimeTypes)) {
            $errorMsg = "Invalid picture format";
            $_SESSION["message"] = $errorMsg;
        }
    
        if(!$errorMsg) {
            // good to upload
            move_uploaded_file($_FILES['photo']['tmp_name'], "./gallery/$name");
            $message = "Picture uploaded successfully";
            $_SESSION["message"] = $message;
        }
    }
  
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

        .submit:hover {
            cursor: pointer;
            background-color: darkblue;
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
            margin: 30px;
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
            padding: 15px;
            text-align: center;
        }

        .modal_box {
            display: flex;
            justify-content: space-around;
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
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
            background-color: red;
            height: 20px;
            width: 100px;
            text-align: center;
            padding: 5px;
            border-radius: 10px;
        }

        .close:hover {
            cursor: pointer;
        }

        .gallery-title {
            text-align: center;
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
                <form id="form" action="gallery.php" method="post" enctype="multipart/form-data">
                    <input class="file" type="file" name="photo">
                    
                    <button class="submit" type="submit">Upload</button>
                    <br><br>
                </form>
                <div class="message">
                    
                </div>
            </div>
            <hr>
        </div>
    </section>
    <h4 class="gallery-title">Latest Photos</h4>
    <div class="gallery">
        
    </div>
    <script>
    $(document).ready(function () {
        //  render pictures
        $.ajax({
                url: "gal.php",
                type: "GET",
                dataType: 'JSON',
                success: function(response){
                    let data = response[1].data;
                    data.forEach(picture => {
                        if (picture !== "." && picture !== "..") {
                            let image = `<img class="image" src="./gallery/${picture}" alt="image">`;
                            $(".gallery").append(image);
                        }
                    });
                }
            });

        // open a picture on a modal
        $('body').on('click','img',function(e){
            let imageSrc = $(e.target).attr('src');
            $('.modal_box').css("visibility", "visible");
            $('.modal_box').append(`<img class='modal-image' src='${imageSrc}' alt='${imageSrc}'>`).fadeIn();

            // lock scroll position
            var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
            ];
            var html = jQuery('html');
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        });

        // close an opened picture
        $('.close').on('click', function(){
            $('.modal_box').css("visibility", "hidden").fadeOut();

            // un-lock scroll position
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        });

        // Submit and render a picture
        $("#form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "gallery.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function() {
                $('form')[0].reset();
                $.ajax({
                url: "gal.php",
                type: "GET",
                dataType: 'JSON',
                success: function(response){
                    let message = response[0].message;
                    if (message === "Invalid picture format") {
                        $(".message").html(message).css("color", "red").delay(2000)
                        .queue(function (next) { 
                            $(this).html("");
                            next(); 
                        });
                    }else if (message === "Picture uploaded successfully") {
                        $(".message").html(message).css("color", "green").delay(2000)
                        .queue(function (next) { 
                            $(this).html("");
                            next(); 
                        });
                    }else{
                        $(".message").html(message).css("color", "red").delay(2000)
                        .queue(function (next) { 
                            $(this).html("");
                            next(); 
                        });
                    }

                    $(".gallery").empty();
                    let data = response[1].data;
                    data.forEach(picture => {
                        if (picture !== "." && picture !== "..") {
                            let image = `<img class="image" src="./gallery/${picture}" alt="image">`;
                            $(".gallery").append(image);
                        }
                    });
                }
            });
                }
            });
        }));
    });
    </script>
</body>
</html>