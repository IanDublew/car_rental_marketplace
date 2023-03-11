<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MRKTPLC</title>
    <link rel="stylesheet" href="slick.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fixed.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
   
    .banner-area {
    margin: 50px auto;
    padding: 10px;
    max-width: 800px;
    text-align: center;
}


    .banner-text {
  color: white;
  padding: 80px;
  text-align: center;
}

.content {
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  width: 400px;
  padding: 30px;
  background-color: rgba(255,255,255,0.1);
  border-radius: 10px;
  box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.3);
}

h2 {
  margin-bottom: 20px;
  font-size: 20px;
}

form input {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
  background-color: rgba(255,255,255,0.2);
  color: white;
  font-size: 18px;
}

form input:focus {
  outline: none;
  background-color: rgba(255,255,255,0.3);
}

.banner-btn {
  background-color: crimson;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
}
.banner-btn:hover {
    background-color: black;
  }
.link {
  margin-top: 20px;
  text-align: center;
  font-size: 18px;
}

.link a {
  color: crimson;
  text-decoration: none;
}

.link a:hover {
  text-decoration: underline;
}

</style>
<body style="background-image: url('IMAGINE\ 2.jpg');" data-spy="scroll" data-target="#navbarResponsive" >

<?php
require_once('connection.php');

if(isset($_POST['change'])){
    $id = $_POST['email'];
    $pass = $_POST['pass'];
    $Pass = md5($pass);
    
    if(empty($id) || empty($pass)) {
        echo '<script>alert("Please fill in all fields")</script>';
    } else {
        // Check if email exists in the users table
        $query = "SELECT * FROM users WHERE EMAIL='$id'";
        $res = mysqli_query($con, $query);
        
        if($row = mysqli_fetch_assoc($res)) {
            // Email exists in users table, update password
            $query = "UPDATE users SET PASSWORD='$Pass' WHERE EMAIL='$id'";
            $res = mysqli_query($con, $query);
            
            session_start();
            echo '<script>alert("USER PASSWORD CHANGED SUCCESSFULLY")</script>';
            echo '<script>window.location.href = "forgotpassword.php";</script>';
            
        } else {
            // Check if email exists in the company table
            $query = "SELECT * FROM company WHERE EMAIL='$id'";
            $res = mysqli_query($con, $query);
            
            if($row = mysqli_fetch_assoc($res)) {
                // Email exists in company table, update password
                $query = "UPDATE company SET PASSWORD='$Pass' WHERE EMAIL='$id'";
                $res = mysqli_query($con, $query);
                
                session_start();
                echo '<script>alert("COMPANY PASSWORD CHANGED SUCCESSFULLY")</script>';
                echo '<script>window.location.href = "forgotpassword.php";</script>';
            } else {
                // Email does not exist in either table
                echo '<script>alert("INCORRECT EMAIL")</script>';
            }
        }
    }  
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <h2>MRKTPLC</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="about.php">ABOUT US</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="contact.php">CONTACT</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="adminlogin.php">SYSTEM ADMIN</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="single-banner">
                <div class="banner-text">
                    <h2>User|Company</h2>
                    <div class="content">
                        <div class="form">
                            <h2>Change Password:</h2>
                            <form method="POST"> 
                            <input type="email" name="email" placeholder="Enter Email Here">
                            <input type="password" id="pass" name="pass" placeholder="Enter New Password">
                            <input class="banner-btn" type="submit" value="Change" name="change"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

   <!--- Script Source Files -->

    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="slick.min.js"></script>
    <script>
        $('.banner-area').slick({
            autoplay: true,
            speed: 300,
            arrows: false,
            dots: true,
            fade: true
        })
    </script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->

  
</body>

</html>