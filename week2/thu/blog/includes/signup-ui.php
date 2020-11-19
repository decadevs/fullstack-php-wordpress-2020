<!-- modal login -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body">
          <div class="login">
            <div class="login-triangle"></div>
            
            <h2 class="login-header">Create Account</h2>

            <form  method='post' action="signup.php" class="login-container">
                <p><input name='username' type="text" placeholder="Username"></p>
                <p><input name='email' type="email" placeholder="Email"></p>
                <p><input name='password' type="password" placeholder="Password"></p>
                <p><input class="login-control" type="submit" value="Join"></p>
                <p><input class="login-control" type="button" value="Cancel"  data-dismiss="modal"></p>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>