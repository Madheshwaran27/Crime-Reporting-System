<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal list</title>
    <style>
         *{
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
            box-sizing: border-box;
        }
        .criminal{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .title{
            position:fixed;
            top: 40px;
            left: 400px;
            right: 400px;
        }

        table {

                height: 50px;
                width:  80%;
                border-collapse: collapse;
                border: 1px solid grey;
                margin: 100px;
                padding: 20px;
                
                

        }

        th{
            background-color:green;
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
    </style>
</head>

<body>
<div class="title">
        <h1>Suspects Details</h1>
    </div>

    <div class="criminals">
   
        <table>
            <thead>
                <th>Complaint Id</th><th>Description</th><th>Image</th>

            </thead>
            <tbody>
            <?php

session_start();


if(!isset($_SESSION['x']))
    header("location:policelogin.php");
    $p_id=$_SESSION['p_id'];    

// Connect to the database
$servername = "localhost";
$username = "root";;
$password = "";
$dbname = "crime_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Retrieve the criminal details and images from the database
$sql = "SELECT * FROM suspects WHERE p_id='$p_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_array()) {
  
?>
                <tr>
                    <td><?php echo $row['c_id']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['images']).'"height="100" width="100"/>';?></td>
                </tr><br>
            </tbody>
        </table>
    </div>
</body>
<?php
    }
} else {
    echo "No criminals found.";
}

// Close the database connection
$conn->close();
?>

</html>