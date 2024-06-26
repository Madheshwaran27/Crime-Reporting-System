<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       *{
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
            box-sizing: border-box;
        }
        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body{
            background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(search1.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1{
            color: white;
            font-weight: bold;
        }

    </style>
</head>
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    $u_id=$_SESSION['u_id'];

    $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
    $q2=mysqli_fetch_assoc($result1);
    $u_name=$q2['u_name'];

    ?>
<body>
    <div class="container">
        <div class="box">
            <h1>Welcome&nbsp;<?php echo "$u_name" ?>
            </h1>
        </div>
    </div>
</body>
</html>