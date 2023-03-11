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
 
    /* Set background color to black and text color to white */
    body {
        background-color: black;
        font-family: Arial, sans-serif;
    }

    /* Set font and text color for headings */
    h1 {
        font-size: 24px;
        color: white;
    }

    /* Style form submit button */
    .btn {
        background-color: crimson;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 20px;
    }

    /* Style box container */
    .box {
        background-color: black;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px white;
        padding: 20px;
        text-align: center;
        margin: 50px auto;
        max-width: 600px;
    }

    /* Style box content */
    .content {
        margin-top: 20px;
    }
    .firstname, .lastname {
  font-size: 15px;
  color: crimson;
  margin-top: 10px;
  text-align: center;
}
</style>

</style>
<body  data-spy="scroll" data-target="#navbarResponsive">


<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    }
    else{
    $sql2="select * from users where EMAIL='$email'";
    $name2 = mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
    $car_id=$rows['CAR_ID'];
    $sql3="select * from cars where CAR_ID='$car_id'";
    $name3 = mysqli_query($con,$sql3);
    $rows3=mysqli_fetch_assoc($name3);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="cardetails.php">
            <h2>MRKTPLC</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li  class="nav-item">
                    <a class="nav-link"  href="bookingstatus.php">BOOKINGS</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="index.php">LOG OUT</a>
                </li>
                <li>
                </li>
            </ul>
        </div>
    </nav>
   
    <div class="box">
         <div class="content">
             <h1>CAR NAME : <?php echo $rows3['CAR_NAME']?></h1><br>
             <h1>NO OF DAYS : <?php echo $rows['DURATION']?></h1><br>
             <h1>BOOKING STATUS : <?php echo $rows['BOOK_STATUS']?></h1><br>
             
         </div>
     </div>
                <?php 
                }
                ?>
    
        <!--- Script Source Files -->
        <script src="jquery-3.3.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
  <!--- End of Script Source Files -->
</body>

</html>
