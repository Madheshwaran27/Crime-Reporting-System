<!DOCTYPE html>
<html>
<head>

<?php

   
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $u_id=$_POST['email'];
        $_SESSION['u_id']=$u_id;
        $result=mysqli_query($conn,"SELECT u_id,u_pass FROM user where u_id='$name' and u_pass='$pass' ");
       
          
   
        
        if(!$result || mysqli_num_rows($result)==0)
        {
          $message = "Id or Password not Matched.";
          echo "<script type='text/javascript'>alert('$message');</script>";
          
             
        }
        else 
        {
          header("location:user.php");
          
        }
    }                
} 
?> 
	
    <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
          var x2=sta2.indexOf(' ');
var x3=sta3.indexOf(' ');
    if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }

}
    </script>
    <style>
      *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family:'Poppins',sans-serif;

        }
        body{
           
            background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(policeday.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        .nav-bar{
            width: 100%;
            height: 70px;
            background-color:white;
            box-shadow: 0 0 10px 0 rgba(255,255,255,0.5);
        }

        .nav-bar ul li{
            font-size: 18px;
            float:right;
            width: 12rem;
            height:70px;
            list-style:none ;
            text-align: center;
            margin-top: -69px; 
            font-weight: 300;
            margin-right: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
        p{
            font-size: 28px;
            color:rgb(255, 255, 255);
            font-weight: bolder;
            height:70px;
            width: 35rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .nav-bar p a{
          text-decoration: none;
          color:blue;
        }
        
       
    .nav-bar ul li a{
        color:black;
        text-decoration: none;
        padding: 10px;
        border-radius: 10px;
        font-weight: bold;
    }

    .nav-bar ul li a:hover{
       color: rgb(14, 110, 173);
       
    }
    .container{
            height: 80vh;
            width:100%;
            display: flex;
            justify-content: center;
            align-items: center;
    }
    .form{
      height: 500px;
      width: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form label{
      color: #fff;
      margin-top: 300px;
    }

    form{
      font-size: 30px;
      text-align: center;
      margin-top: 50px;
    }
    input{
      height: 30px;
      width: 400px;
      font-size: 20px;
      margin-bottom: 20px;
    }
    button{
      height: 30px;
      width: 100px;
      font-size: 20px;
      margin-top: 30px;
      font-weight: bold;
      border: 0;
    }
    button:hover{
      background-color: rgb(14, 110, 173);
      color: #fff;
    }


    footer{
            
            height: 58px;
            width: 100%;
            background-color: rgba(0,0,0,0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        footer .about a{
            text-decoration: none;
            color:white;
        }
    </style>
    
	<title>User Login</title>
</head>
<body>
  
<div class="nav-bar">
  <p><a href="home.php">CRIME REPORTING PORTAL</a></p>
  <ul>
      <li><a href="userlogin.php">USER LOGIN</a></li>
      <li><a href="home.php">HOME</a></li>
  </ul>
</div>
<div class="container">
<div class="form">
  <form method="post">
    <label for="exampleInputEmail1">
      User&nbsp;&nbsp;Id
    </label><br>
    <input type="text" name="email" id="exampleInputEmail1" placeholder="&nbsp;email" required onfocusout="f1()"><br>
    <label for="exampleInputPassword1">
      Password
    </label><br>
    <input type="password" name="password" id="exampleInputPassword1"placeholder="&nbsp;password" required onfocusout="f1()"><br>
    <button type="submit" onclick="f1()" name="s">Login </button>
  </form>
</div>
</div>
 
<footer>
  <div class="about">
     <a href=""> &copy;&nbsp;<b>Crime Reporting Portal 2023</b></a>
  </div>
</footer>
</body>
</html>