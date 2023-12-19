<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: merge3.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="test.js"></script>
    <link rel="stylesheet" href="pres.css">
    <script src="pres.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullname = $_POST["fullname"];
           $username = $_POST["username"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullname) OR empty($username) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE username = '$username'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Username already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, username, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullname, $username,  $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
  <div class="stars">
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
  </div>
    <div class="bx-book-content">
        <div class="image">
          <img src="uc2.png" width="70%"/>
      </div>
        <div class="content">
          <h2>University of Cebu</h2>
          <h2>University of Cebu</h2>
         </div>
      <div class="wrapper">
      <form action="register.php" method="post">
            <div class="input-box">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:" autocomplete="off">
            </div>
            <div class="input-box">
                <input type="text" class="form-control" name="username" placeholder="Username:"
                autocomplete="off">
            </div>
            <div class="input-box">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="input-box">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="input-box">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
      </form>
          <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
          </div>
      </br>
        <div><p>login<a href="login.php">Login Here:</a></p></div>
        </br>
            <h1 class="pasko"> Merry Christmas</h1>
          </div>
      </div>
</body>
</html>