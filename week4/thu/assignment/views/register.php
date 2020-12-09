<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/scss/main.min.css" />
</head>
<body class="container--signin">
<form class="my-form" action="/auth/register" method="post">

    <?php include_once 'partials/flash-messages.php'?>

    <div class="signin--logo">
        <span>Logo</span>
    </div>

    <h2 class="signin--form-tile">Register</h2>
    <h6 class="signin-subtitle">Please enter your credentials to proceed.</h6>
    <div class="form-group">
        <label>Email address</label>
        <input type="text" name="email" class="form-control" placeholder="samplemail@mail.com">
    </div>

    <div class="form-group">
        <label>Your name</label>
        <input type="text" name="name" class="form-control" placeholder="Full name">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" >
    </div>
    <input type="submit" value="Register" class="btn btn-primary sign-btn">
    <span class="sign-up-text">
        <span>Have an account? </span>
        <a href="/auth/login">Login</a>
      </span>
</form>
</body>
</html>
