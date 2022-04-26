<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Captcha</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container col-md-4" style="margin-top: 20px">
      <h2 class="text-primary text-center">Registration Page</h2>
      <hr />
      <form method="post" action="signup_action.php">
        <?php if (isset($_SESSION['status_err'])) {?>
        <div class="form-group alert alert-danger">
        <?php echo $_SESSION['status_err'];unset($_SESSION['status_err']); ?>
        </div>
        <?php }?>
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required />
        </div>
        <br />
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter Email ID" required />
        </div>
        <?php if (isset($_SESSION['email_err'])) {?>
        <div class="form-group">
        <small class="text-danger"><?php echo $_SESSION['email_err'];unset($_SESSION['email_err']); ?>
        </small>
        </div>
        <?php }?>
        <br />
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control"  placeholder="Enter Password" required />
        </div>
        <br />
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm Password" required />
        </div>
        <?php if (isset($_SESSION['pass_err'])) {?>
        <div class="form-group">
        <small class="text-danger"><?php echo $_SESSION['pass_err'];unset($_SESSION['pass_err']); ?>
        </small>
        </div>
        <?php }?>
        <br />
        <button class="btn btn-primary" name="submit">Submit</button>
        <br />
        <br />
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </body>
</html>
