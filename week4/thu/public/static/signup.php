<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/mysignin.css" />
</head>
<body class="container--signin">
    <form class="my-form" action="/auth/reg" method="post">
      <div class="signin--logo">
       <span> Logo</span>
      </div>
      <h2 class="signin--form-tile">Sign up</h2>
      <h6 class="signin-subtitle">Please enter your credentials to proceed.</h6>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="samplemail@mail.com">
        <small>Forgot password?</small>
      </div>
      <div class="form-group">
        <label>Your Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="******************">
      </div>
      <input type="submit" value="Sign up" class="btn btn-primary sign-btn">
      <span class="sign-up-text">
        <span>Dont’ have an account? </span>
        <a href="/auth/login">Sign in</a>
      </span>
    </form>
</body>
</html>