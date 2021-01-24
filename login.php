<?php
  include_once 'header.php'
 ?>

  <section class="text-center">
      <form class="form-signin" action="/onlyt/includes/login.inc.php" method="post">
        <img class="mb-4" src="/onlyt/assets/img/ot.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Login..." required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password..." required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="" value="remember-me"> Remember Me
          </label>

        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
      </form>

      <?php
        if ( isset($_GET["error"]) ) {

          if( $_GET["error"] === "none"){
            echo "<p>Login successful!</p>";
          }
          if( $_GET["error"] === "wronglogin"){
            echo "<p>Login or password incorrect!</p>";
          }

        }
      ?>

  </section>


<?php
  include_once 'footer.php'
?>
