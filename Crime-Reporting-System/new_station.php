<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
.container{
    height: 100vh;
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:200px;
    margin-bottom: 200px;
   
}
.box{
    background-color:rgba(0,0,0,0.6);
    width: 500px;
    height: 750px;
    text-align: center;
    box-shadow: 0 0 10px 0 blue;
  
    
   /* margin-top: 100px;*/
}
form{
    margin-top: 50px;
    color: white;
    font-size: 20px;
}
input{
    margin-bottom: 30px;
    margin-top: 5px;
    height: 30px;
    width: 250px;
    font-size: 20px;        
}

#submit{
 border: 0;   
}

#submit:hover{
    color: white;
    background-color:rgb(60, 152, 189) ;
}

p{
   text-align:center;
   font-size:40px;
   color:rgb(167, 205, 241);
   margin-top: 40px;
   font-weight: bold;
}

    </style>
</head>


<?php

session_start();
if(!isset($_SESSION['x']))
    header("location:headlogin.php");
if(isset($_POST['s'])){
$con=mysqli_connect('localhost','root','','crime_portal');
if(!$con)
{
    die('could not connect: '.mysqli_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $loc=$_POST['location'];
    $p_name=$_POST['p_name'];
    $p_id=$_POST['p_id'];
    $p_pass=$_POST['p_pass'];
    $p_mob=$_POST['p_mob'];


$reg="insert into police_station values('$p_id','$p_name','$loc','$p_pass','$p_mob')";
 mysqli_select_db($con,"crime_portal");
    $res=mysqli_query($con,$reg);
    if(!$res)
        {
    $message1 = "User Already Exist";
    echo "<script type='text/javascript'>alert('$message1');</script>";
}
        
    else
{
    $message = "Police Station Added Successfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}
}
?>

<body>
    <div class="container">
        <div class="box">
            <p>Add New Station</p>
            <form method="post" id="myform" autocomplete="off">
                Location <br>
                <input type="text" name="location" required><br>
                Police Name <br>
                <input type="text" name="p_name" id="" required><br>
                Police Id <br>
                <input type="text" name="p_id" required><br>
                Password <br>
                <input type="text" name="p_pass" required><br>
                Mobile <br>
                <input type="text" name="p_mob" required maxlength="10" minlength="10" id="num" onblur="validateMobile()"><br>
                <input type="submit" value="Add" name="s" id="submit" onsubmit="clearform()">
            </form>
        </div>
    </div>
</body>
<script>
    function clearform(){
        document.getElementById("myform").reset();
    }
       
    function validateMobile(){
        var mobile=document.getElementById("num").value;
          var mobileRegex = /^[0-9]{10}$/;
          if (!mobileRegex.test(mobile)) {
            document.getElementById("num").value="";
            alert("Please enter a valid 10-digit mobile number");
          }
        }
</script>
</html>