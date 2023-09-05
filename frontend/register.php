<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
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
include("config.php");

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        $error = "All fields are required";
    } elseif ($password != $cpassword) {
        $error = "Password doesn't match";
    } elseif (strlen($username) < 3 || strlen($username) > 20) {
        $error = "Username must be 3 to 20 characters";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least six characters.";
    } else {
            $check_email="SELECT * FROM reguser WHERE email='$email' or username='$username'";
            $query= mysqli_query($con,$check_email);
            $result= mysqli_fetch_assoc($query);
            if($result > 0){
                $error= "Email already exist";
            }
            else{
              $pass= md5($password);
                $insert ="INSERT INTO reguser(username,email,password) VALUES ('$username','$email','$pass')";
                $sql= mysqli_query($con,$insert);
                if($sql){
                    
                    $success = "Successfully created an account";
                    header('location: login.php');
                }
            }
    
        }
}
?>


<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
    <div class="login_oueter">
      <div class="col-md-12 logo_outer">
       <span style= "color:gold; font-size:25px "><b>ETERNAL </b></span> <span style= "color:black; font-size:25px "><b>CAFE</b></span>
      </div>


     

      <form action=" " method="post" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          <h4 class="title my-3">Register </h4>
          <p style="color:red;">
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
              <input name="username" type="text" value="<?php 
              if(isset($error)){
                echo $email;
              }
                ?>" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
          </div>
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
              </div>
              <input name="email" type="text" value="<?php 
              if(isset($error)){
                echo $username;
              }?>" class="input form-control" id="username" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" />
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
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="cpassword" type="password" value="" class="input form-control" id="cpassword" placeholder="Confirm password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide1();">
                  <i class="fas fa-eye" id="show_eye1"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye1"></i>
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
            <p>Already have an account? <a href="./login.php">Login</a></p>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="signup">Register</button>
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
function password_show_hide1() {
  var y = document.getElementById("cpassword");
  var show_eye1 = document.getElementById("show_eye1");
  var hide_eye1 = document.getElementById("hide_eye1");
  hide_eye1.classList.remove("d-none");
  if (y.type === "password") {
    y.type = "text";
    show_eye1.style.display = "none";
    hide_eye1.style.display = "block";
  } else {
    y.type = "password";
    show_eye1.style.display = "block";
    hide_eye1.style.display = "none";
  }
}

</script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>