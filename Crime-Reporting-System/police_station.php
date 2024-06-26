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
            height: 100px;
            /* background-color: darkgray; */
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 15px;
            
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
        table{
            text-align:center;
            border: 0;
            margin: 0;
        }

        #add{
            background-color:darkgreen;
            color: #fff;
            padding: 10px;
        }
        #add:hover{
            background-color: rgb(18, 212, 18);
        }

        #rmv{
            background-color:darkred;
            color: #fff;
            padding: 10px;
        }

        #rmv:hover{
            background-color: rgb(224, 73, 73);
        }

        table {

border-collapse: collapse;
border: 1px solid grey;
margin: 100px;
padding: 15px;
}

th{
background-color:rgb(109, 9, 59);
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
    
$conn=mysqli_connect("localhost","root","","crime_portal");
if(!$conn)
{
    die("could not connect".mysqli_error());
}
mysqli_select_db($conn,"crime_portal");

if(!isset($_SESSION['x']))
header("location:adminlogin.php");

    $result=mysqli_query($conn,"SELECT*FROM police_station");
?>
<body>
    <nav>
        <a href="new_station.php" target="main1"><p id="add">ADD NEW STATION</p></a>&nbsp;<a href="remove_station.php" target="main1"><p id="rmv">REMOVE STATION</p></a>
    </nav>

   <div class="container">
    <div class="details">
        <table>
            <thead>
                <th>Police Id</th><th>Police Name</th><th>Password</th><th>Location</th><th>Mobile</th>
            </thead>
            <?php
                  while($row=mysqli_fetch_assoc($result)){
                ?>
        <tbody>
            <td> <?php echo $row['p_id'];?></td>
            <td><?php echo $row['p_name'];?></td>
            <td><?php echo $row['p_pass'];?></td>
            <td><?php echo $row['location'];?></td>
            <td><?php echo $row['p_mob'];?></td>
        </tbody>
                <?php
                    }
                ?>
                
        </table>
    </div>
   </div>
</body>
</html>