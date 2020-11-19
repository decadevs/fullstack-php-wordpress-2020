<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
    }

    require __DIR__ . '/settings.php';

    //Logout button
    if (array_key_exists('logout', $_POST)) {
        logout();
    }

    $con = con();

    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    $err = "";
    $success = "";
    $data = [];
    if(isset($_SESSION['id']) && $_POST){
        if(empty($_POST['title'] || empty($_POST['createPost']))){
            $err = "All fields are required";
        }

        if(empty($err)){
            $data['user_id'] = $_SESSION['id'];
            $data['title'] = clean($_POST['title']);
            $data['content'] = clean($_POST['createPost']);
            $outcome = create_post($con, $data);
        }

        if(!$outcome){$err = "Sorry, post fail try again later";}
        else{$success = "Post created successfully";}
    }

    include APP_PATH . '/includes/htmlhead.php'
?>
<body>
    <?php include APP_PATH . '/includes/header.php' ?>
    <section class="containers section">
        <?php
            if(!empty($err)){
                echo '<div class="alert alert-danger" role="alert">'. $err.'</div>';
            }
        if(empty($err) && $success){
            echo '<div class="alert alert-success" role="alert">'. $success.'</div>';
        }
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="title">Enter Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
            </div>

            <div class="form-group">
                <label for="Create Post">Create Post</label>
                <textarea class="form-control" id="Create Post" name="createPost" rows="3"></textarea>
            </div>
            <button type="submit" name="submitPost" class="btn btn-primary">Create Post</button>
        </form>
    </section>
</body>