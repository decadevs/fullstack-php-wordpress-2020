<?php
require __DIR__ . '/settings.php';
    $con = con();
    
    if(!$con) {
        die_with_error("Error connecting to Database Server");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user']['id'];

        if(strlen($title) < 5) $errors[] = "Title must be atleast 5 characters long";

        if(strlen($content) < 20) $errors[] = "Please provide enough content";

       if(!$errors){
           $data = array("title"=>$title, "content"=>$content, "user_id"=>$user_id);

           create_post($con, $data);
           redirect("/index.php");
       
       }

       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php __($post['title']) ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include APP_PATH.'/includes/header.php' ?>

<section class="container section">

<form method="POST" action="" id="login-form">
<Label> Make a blog post - Please make it interesting </Label><br />

<?php if($errors){
    foreach($errors as $error){
        __('<span class="error">'.$error.'</span><br />');
    }
}?>

<div class="input-section">
    <input  type="text" name="title" placeholder="Post Title" required/>

</div>

<textarea placeholder="Enter post details here" name="content">
</textarea>

<button name="submit"> post </button>
<form>

</section>
</body>
</html>