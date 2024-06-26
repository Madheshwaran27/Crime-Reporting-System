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

        table {

                height: 50px;
                width:  80%;
                border-collapse: collapse;
                border: 1px solid grey;
                margin: 100px;
                padding: 20px;
                position: relative;
                left: 400px;
                top:200px;
                
                

        }

        th{
            background-color:rgb(117, 6, 84);
            color:white;
            text-align: center;
            border: 1px solid grey;
            padding: 15px;
            font-size: 20px;
        }
        tbody tr{
            text-align: center;
            border: 1px solid grey;
        }
        tbody tr td{
            border: 1px solid grey;
            padding: 15px;
            font-size: 18px;
        }

        tbody:nth-child(odd){
            background-color:#b6aeae;
        }

        .title{
            text-align: center;
            position: fixed;
            top: 40px;
            left: 200px;
            right: 200px;
        }
        


    </style>
</head>
<?php

session_start();
    if(!isset($_SESSION['x']))
        header("location:adminlogin.php");
    
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    

    
    $result=mysqli_query($conn,"SELECT * FROM complaint");



?>
<body>
    <div class="title">
        <h1>Complaint Details</h1>
    </div>
<div class="container">
        <table>
        <thead>
            <th>Complaint Id</th><th>User Id</th><th>User Name</th><th>User Mobile</th><th>Adhaar No</th><th>location</th><th>Type of crime</th><th>date of crime</th><th>description</th><th>status</th><th>police id</th><th>police name</th><th>police mobile</th>
        </thead>

                <?php
                  while($row=mysqli_fetch_assoc($result)){
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
            <td><?php echo $row['p_id'];?></td>
            <td><?php echo $row['p_name'];?></td>
            <td><?php echo $row['p_mob'];?></td>




        </tbody>
                <?php
                    }
                ?>
        </table>
</div>
</body>
</html>