<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'includes/connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    // $sql = "Select * from admin where username='$username' AND password='$password'";
    $sql = "Select * from admin where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
            // echo "<pre>";
            // print_r($row);
            // exit ;
                    if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: dashboard.php");
            } 
            else{
                echo $showError = "Invalid Credentials";
                
            }
        }
    } 
    else{
        echo $showError = "Invalid Credentials";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acharya Result portal</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body>
  <div class="navbar">
    <img src="images/acharya-logo-h-1.png" alt="">
    <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="find-result.php" >Results</a>
            <button class="login_popup">Login</button>
            
        </nav>
  </div>

  <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username"required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password"  name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p><a href="#" class="register-link"></a></p>
                </div>
                
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox">I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
                
            </form>
        </div>
    </div>
    <!-- <div id="f2">
      <div id="f22" class="1">
         <div style="font-size : 30px ;border-bottom:solid gray 3px;padding:25px">
            For Students
         </div>
         <div style="padding-top:80px">
            <label for="click" style="font-size:25px">Search your result : </label>
            <div class="col-sm-6">
               <a href="find-result.php" style="border:solid ForestGreen 2px ; padding:10px ; font-size:20px ; background-color:ForestGreen; color:white;text-decoration:none">Click here</a>
            </div>
         </div>
      </div> 
    </div> -->


    <!-- <div id="f1">
      <div id="f11" class="1">
      <form action="" method="post">
      <div style="font-size : 30px ;border-bottom:solid gray 3px;padding:25px">
            Admin Login
         </div>
            <div  style="padding-top:45px">
                <label for="username" style="font-size:20px">Username</label>
                <input type="text" id="username" name="username"  required style="padding:7px; width : 400px; margin-left : 20px;font-size:17px">
            </div><br><br>
            <div style="padding-top:7px">
                <label for="password" style="font-size:20px">Password</label>
                <input type="password" id="password" name="password" required style="padding:7px; width : 400px; margin-left : 20px;font-size:15px">
            </div><br> 
         
            <div>
                <button type="submit" style="border:solid ForestGreen 2px ; padding:7px ; font-size:20px ; background-color:ForestGreen; color:white; width : 100px;">Login</button>
            </div>
        </form>
      </div>
        
    </div> -->
    <div class="clearfix"></div>

    <script src="js/app.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>