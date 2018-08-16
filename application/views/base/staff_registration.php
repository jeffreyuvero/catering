<div class="container">
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Staff / Admin Registration</div>
    <div class="card-body">
      <!-- <form> -->
        <?php echo form_open('login/submit/'.'admin') ?>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="firstName"  name="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                <label for="firstName">First name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="lastName"  name="lastName" class="form-control" placeholder="Last name" required="required">
                <label for="lastName">Last name</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required">
            <label for="inputEmail">Email address</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <select class = "form-control" id="selectGroup" name="selectGroup">
              <!-- <option value="">Select Staff Status</option> -->
              <option value="1">Admin</option>
              <option value="2">Staff</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="password" id="confirmPassword" name="confirmPassword"class="form-control" placeholder="Confirm password" required="required">
                <label for="confirmPassword">Confirm password</label>
              </div>
            </div>
          </div>
        </div>
        <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
        <input type="submit" value="Register" class="btn btn-primary btn-block">
      </form>
      <div class="text-center">
        <!-- <a class="d-block small mt-3" href="<?php echo $site_url ?>">Login Page</a> -->
        <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
      </div>
    </div>
  </div>
</div>