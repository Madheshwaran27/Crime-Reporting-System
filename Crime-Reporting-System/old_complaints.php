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
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
         nav{
            width: 100%;
            height:70px;
            background-color: darkgray;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        a{
            text-decoration: none;
           font-weight: bold;
            margin: 100px;
            width: 200px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* table{
            text-align:center;
        } */

        .title{
            position:fixed;
            top: 40px;
            left: 400px;
            right: 400px;
        }

        table {

        border-collapse: collapse;
        border: 1px solid grey;
        margin: 100px;
        padding: 15px;
        position: relative;
        left: 150px;
    }

    th{
    background-color:rgb(34, 112, 76);
    color:white;
    text-align: center;
    border: 1px solid grey;
    padding: 10px;
    font-size: 20px;
    }
    tbody tr{
    text-align: center;
    border: 1px solid grey;
    }
    tbody tr td{
    border: 1px solid grey;
    padding: 10px;
    font-size: 18px;
    }

    tbody:nth-child(odd){
    background-color:#b6aeae;
    }

       
    </style>
</head>
<?php

session_start();
$p_id=$_SESSION['p_id'];

$conn=mysqli_connect("localhost","root","","crime_portal");
if(!$conn)
{
    die("could not connect".mysqli_error());
}
mysqli_select_db($conn,"crime_portal");

if(!isset($_SESSION['x'])){
header("location:policelogin.php");
}
else{


$result=mysqli_query($conn,"SELECT location FROM police_station WHERE p_id ='$p_id'");

$q1=mysqli_fetch_assoc($result);

$loc=$q1['location'];

$result1=mysqli_query($conn,"SELECT c_id,u_id,u_name,u_mob,a_no,location,type_crime,d_o_c,description,pol_status FROM complaint WHERE p_id='$p_id'AND pol_status='ChargeSheet Filed'");

?>
<body>
    <div class="title">
        <h1>Old Complaints</h1>
    </div>
<div class="container">
    <div class="details">
        <table>
            <thead>         
                <th>Complaint Id</th><th>User Id</th><th>User Name</th><th>Mobile</th><th>Adhaar No</th><th>Location</th><th>Type Of Crime</th><th>Date</th><th>Description</th><th>Police_Status</th>
            </thead>
            <?php
                  while($row=mysqli_fetch_assoc($result1)){
                ?>
        <tbody>
            <td> <?php echo $row['c_id'];?></td>
            <td><?php echo $row['u_id'];?></td>
            <td><?php echo $row['u_name'];?></td>
            <td><?php echo $row['u_mob'];?></td>
            <td><?php echo $row['a_no'];?></td>
            <td><?php echo $row['location'];?></td>
            <td><?php echo $row['type_crime'];?></td>
            <td><?php echo $row['d_o_c'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['pol_status'];?></td>

        </tbody>
                <?php
                    }
                }
                ?>
                
        </table>
        
    </div>
   </div>
</body>
</html>