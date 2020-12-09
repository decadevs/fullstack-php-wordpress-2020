<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signIn.css">
    <link rel="stylesheet" href="/css/scss/main.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;500&display=swap" rel="stylesheet">
    <title>Sign In</title>
  </head>

  <body class="container--signin">
    <form class="my-form">
      <div class="signin--logo">
        <span> Logo</span>
      </div>
      <h2 class="signin--form-tile">Sign in</h2>
      <h6 class="signin-subtitle">Please enter your credentials to proceed.</h6>
      <div class="form-group">
        <label>email address</label>
        <input type="text" name="email" class="form-control" placeholder="samplemail@mail.com">
        <small>Forgot password?</small>
      </div>
      <div class="form-group">
        <label>password</label>
        <input type="password" name="email" class="form-control">
      </div>
      <input type="submit" value="Sign In" class="sign-btn">
      <span class="sign-up-text">
        <span>Dont’ have an account? </span>
        <a href="/">Sign up</a>
      </span>
    </form>
  </body>

</html>