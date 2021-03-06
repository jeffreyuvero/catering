<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo $base_url ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo $base_url ?>assets/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo $base_url ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/fontawesome/css/fontawesome.min" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Trats Catering Services and Events Planning</div>
        <div class="card-body">
          <img src="http://localhost/catering/assets/logo.jpeg" height="250" width="350px">
          <!-- <form> -->
            <?php echo form_open('login/login'); ?>

            <br>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail"class="form-control" placeholder="Email address or username" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword"  name="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <!-- temporary commented -->
            <!-- <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
             --></div>
           <!--  <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
           <input type="submit" value="Login"  class="btn btn-primary btn-block"   />
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo $site_url ?>/login/registration">Register an Account</a>
            <!-- temporary commented -->
            <a class="d-block small" href="forgot-password.html">
              <!-- Forgot Password? -->
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
