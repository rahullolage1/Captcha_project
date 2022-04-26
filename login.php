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
    <div class="container col-md-4" style="margin-top:20px">
      <h2 class="text-primary text-center">Login Page</h2>
      <hr />
      <form method="post" action="login_action.php">
        <?php if (isset($_SESSION['status'])) {?>
        <div class="form-group alert alert-success">
        <?php echo $_SESSION['status'];unset($_SESSION['status']); ?>
        </div>
        <?php }?>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" />
        </div>
        <br />
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" />
        </div>
        <br />
          <div class="row">
            <div class="form-group col-6">
            <label>Enter Captcha</label>
            <input type="text" class="form-control" name="captcha" id="captcha">
            </div>
            <div class="form-group col-6">
            <label>Captcha Code</label>
            <img src="captcha.php" alt="PHP Captcha">
            </div>
          </div>
        <br />
        <button class="btn btn-primary" name="submit">Submit</button>
        <br />
        <br />
        <p>Have no account? <a href="signup.php">Register here</a></p>
      </form>
    </div>
  </body>
</html>
