<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }

        .container{
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right,cadetblue,lightgrey);
        }

        table{
            border-collapse: collapse;
            height: 450px;
            width: 450px;
            text-align: center;
            box-shadow: 0px 0px 10px 0px rgba(0,255,255,0.5);
            
        }

        
        th,td{
            padding-top: 30px;
        }
        td{
            border-bottom: 1px dashed black;
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

        $query="SELECT*FROM user WHERE u_id='$u_id'";
        $result=mysqli_query($conn,$query);
        $q1=mysqli_fetch_assoc($result);
        $u_name=$q1['u_name'];
        $u_age=$q1['u_age'];
        $u_pass=$q1['u_pass'];
        $u_addr=$q1['u_addr'];
        $a_no=$q1['a_no'];
        $mob=$q1['mob'];
        $gen=$q1['gen'];

?>
<body>
<div class="container">
   <table>
    <tr>
        <th colspan="2"><h1>My Profile</h1></th>
    </tr>
    <tr>
    <th>Name</th><td><?php echo"$u_name"; ?></td>
    </tr>
    <tr>
    <th>Age</th><td><?php echo"$u_age"; ?></td>
    </tr>
    <tr>
    <th>Address</th><td><?php echo"$u_addr"; ?></td>
    </tr>
    <tr>
    <th>Aadhaar No</th><td><?php echo"$a_no"; ?></td>
    </tr>
    <tr>
    <th>Gender</th><td><?php echo"$gen"; ?></td>
    </tr>
    <tr>
    <th>Mobile</th><td><?php echo"$mob"; ?></td>
    </tr>
    <tr>
    <th>User Id</th><td><?php echo"$u_id"; ?></td>
    </tr>
    <tr>
    <th>Password</th><td><?php echo"$u_pass"; ?></td>
    </tr>
   </table> 
</div>    
</body>
</html>