<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <!-- Bootstrap 4 CSS CDN -->
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<style>
    body{
        background: linear-gradient(skyblue, purple);
    }
.login_oueter {
    width: 360px;
    max-width: 100%;
}
.logo_outer{
    text-align: center;
}
.logo_outer img{
    width:120px;
    margin-bottom: 40px;
}
</style>  

</head>
<body>
<?php
session_start();
include('./config.php');

if (isset($_POST['signin'])) {
    $username_email = mysqli_real_escape_string($con , $_POST['username']);
    $password = mysqli_real_escape_string($con , $_POST['password']);

    $sql_fetch_user = "SELECT * FROM reguser WHERE username='$username_email' OR email='$username_email'";
    $result_fetch_user = mysqli_query($con , $sql_fetch_user);

    if (mysqli_num_rows($result_fetch_user) == 1) {
        $user_data = mysqli_fetch_assoc($result_fetch_user);
        $hashed_password = $user_data['password'];

        if (password_verify($password, $hashed_password)) {
            // Password is correct, the user is authenticated.
            // You can store user information in session or cookies and redirect to a logged-in page.
            session_start();
            $_SESSION['id'] = $user_data['id']; // Assuming your user table has a column 'user_id'.
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];

            header("Location: ./index.php"); // Redirect to the logged-in page
            exit();
        } else {
            $error= "Invalid Password .Please try again ";
        }
    } else {
        $error= "Username or Email not found. Please Check username or email address";
    }
}
?>


<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
    <div class="login_oueter">
      <div class="col-md-12 logo_outer">
       <span style= "color:gold; font-size:25px "><b>ETERNAL </b></span> <span style= "color:black; font-size:25px "><b>CAFE</b></span>
      </div>
      <form action="" method="post" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Login For Access</h4>
        <p>
          <?php
      if(isset($error)){
        echo $error ;
      }
      ?>
    </p>
    <p style="color:red;">
      <?php
      if(isset($sucess)){
        echo $sucess ;
      }
      ?>
      </p>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group form-check text-left">
              <input type="checkbox" name="remember" class="form-check-input" id="remember_me" />
              <label class="form-check-label" for="remember_me">Remember me</label>
            </div>
          </div>
          <div class="col-sm-12 pt-3 text-right">
            <p>Already registered <a href="register.php">Register</a></p>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="signin">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

</script>

     
  </body>
</html>