<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
    }
        
.container{
    height: 100vh;
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    
   
}
.box{
    background-color:rgba(0,0,0,0.6);
    width: 400px;
    height: 350px;
    text-align: center;
  
    
   /* margin-top: 100px;*/
}

p{
   text-align:center;
   font-size:40px;
   color:rgb(167, 205, 241);
   margin-top: 40px;
   font-weight: bold;
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

    </style>
</head>
<?php

session_start();
    

if(!isset($_SESSION['x']))
header("location:adminlogin.php");


if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","","crime_portal");
if(!$conn)
{
    die("could not connect".mysqli_error());
}
mysqli_select_db($conn,"crime_portal");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$cm_id = $_POST['cm_id'];

$query2 = "DELETE FROM criminal WHERE cm_id='$cm_id'";

if(mysqli_query($conn,$query2)){

    echo "<script type=text/javascript>alert('Removed')</script>";

}

}

}




?>
<body>
    <div class="container">
        <div class="box">
            <form method="post">
                <p>Delete Criminal</p><br>
                Enter Criminal Id <br>
                <input type="text" name="cm_id"><br>
                <input type="submit" name="submit" value="Remove" id="submit">
            </form>
        </div>
    </div>
</body>
</html>