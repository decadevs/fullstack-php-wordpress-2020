<?php 
    require __DIR__ . '/settings.php';
    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        $errorMsg = '';
        $post = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => 1
        );
        create_post($con, $post);
    }

    function clean($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $posts = get_posts($con);

    // $data = array(
    //     'name' => 'Olatunji',
    //     'password' => 'password',
    //     'email' => 'olatunji@gmail.com'
    // );
    // create_user($con, $data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiReader</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH . '/includes/header.php' ?>

<section class="container section">
    <div>
        <form id="form" action="index.php" method="post" enctype="multipart/form-data">
            <textarea class="post-title" placeholder="enter post title here..." name="title" id="title" cols="30" rows="10"></textarea>
            <textarea class="text-post" placeholder="enter post Content here..." name="content" id="content" cols="30" rows="10"></textarea>
            <input type="submit" value="Publish Post" class="btn">
        </form>
    </div>
    <?php foreach($posts as $post): ?>
    <div class="post">
        <h1 class="post-title"><a href="post.php?post_id=<?php __($post['id']) ?>"><?php __($post['title']) ?></a></h1>
        <p class="post-content"><?php __($post['content']) ?></p>
   
        <div class="post-meta">
            <div>Published on <?php __($post['created_at']) ?> by @<?php 
            $user_id = $post['user_id'];
            $user = get_user($con, $user_id);
            echo __($user['name']);
            ?> </div>
            <div>2 likes    <a href="post.php?post_id=<?php __($post['id']) ?>" ><?php
            $post_id = $post['id'];
            
            $comment_count = get_comment_count($con, $post_id);
            if ($comment_count['count'] < 2) {
                echo $comment_count['count'];
                echo " comment";
            }else{
                echo $comment_count['count'];
                echo " comments";
            }
            ?></a> </div>
        </div>
    </div>
    <?php endforeach; ?>

</section>
<script>
    $(document).ready(function () {
        //  render pictures
        // $.ajax({
        //         url: "gal.php",
        //         type: "GET",
        //         dataType: 'JSON',
        //         success: function(response){
        //             let data = response[1].data;
        //             data.forEach(picture => {
        //                 if (picture !== "." && picture !== "..") {
        //                     let image = `<img class="image" src="./gallery/${picture}" alt="image">`;
        //                     $(".gallery").append(image);
        //                 }
        //             });
        //         }
        //     });

        // // open a picture on a modal
        // $('body').on('click','img',function(e){
        //     let imageSrc = $(e.target).attr('src');
        //     $('.modal_box').css("visibility", "visible");
        //     $('.modal_box').append(`<img class='modal-image' src='${imageSrc}' alt='${imageSrc}'>`).fadeIn();

        //     // lock scroll position
        //     var scrollPosition = [
        //     self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
        //     self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
        //     ];
        //     var html = jQuery('html');
        //     html.data('scroll-position', scrollPosition);
        //     html.data('previous-overflow', html.css('overflow'));
        //     html.css('overflow', 'hidden');
        //     window.scrollTo(scrollPosition[0], scrollPosition[1]);
        // });

        // // close an opened picture
        // $('.close').on('click', function(){
        //     $('.modal_box').css("visibility", "hidden").fadeOut();

        //     // un-lock scroll position
        //     var html = jQuery('html');
        //     var scrollPosition = html.data('scroll-position');
        //     html.css('overflow', html.data('previous-overflow'));
        //     window.scrollTo(scrollPosition[0], scrollPosition[1])
        // });

        // Submit and render a picture
        // $("#form").on('submit',(function(e) {
        // e.preventDefault();
        // $.ajax({
        //     url: "index.php",
        //     type: "POST",
        //     data:  new FormData(this),
        //     contentType: false,
        //     cache: false,
        //     processData:false,
        //     success: function() {
        //         $('form')[0].reset();
        //         $.ajax({
        //         url: "gal.php",
        //         type: "GET",
        //         dataType: 'JSON',
        //         success: function(response){
        //             let message = response[0].message;
        //             if (message === "Invalid picture format") {
        //                 $(".message").html(message).css("color", "red").delay(2000)
        //                 .queue(function (next) { 
        //                     $(this).html("");
        //                     next(); 
        //                 });
        //             }else if (message === "Picture uploaded successfully") {
        //                 $(".message").html(message).css("color", "green").delay(2000)
        //                 .queue(function (next) { 
        //                     $(this).html("");
        //                     next(); 
        //                 });
        //             }else{
        //                 $(".message").html(message).css("color", "red").delay(2000)
        //                 .queue(function (next) { 
        //                     $(this).html("");
        //                     next(); 
        //                 });
        //             }

        //             $(".gallery").empty();
        //             let data = response[1].data;
        //             data.forEach(picture => {
        //                 if (picture !== "." && picture !== "..") {
        //                     let image = `<img class="image" src="./gallery/${picture}" alt="image">`;
        //                     $(".gallery").append(image);
        //                 }
        //             });
        //         }
        //     });
        //         }
        //     });
        // }));
    });
    </script>
</body>
</html>