<?php 
    require __DIR__ . '/settings.php';
    require APP_PATH . '/includes/auth.php';

    session_start();

    if (! isLoggedIn()) {

        die('unauthorised');
    }

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = ['title'=> clean($_POST['title']), 'content'=> clean($_POST['content']), 'user_id' => clean($_SESSION['user_id'])];

        create_post($con, $data);
        redirect('/');
    }

?>

<?php require APP_PATH . '/includes/header.php' ?>


<section class="container section" >
    
</section>
<section class="container section">
    <form method="POST" action="new_post.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Post Title" name="title" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-outline-*" id="button">Create</button>
    </form>
</section>

<?php require APP_PATH . '/includes/footer.php' ?>