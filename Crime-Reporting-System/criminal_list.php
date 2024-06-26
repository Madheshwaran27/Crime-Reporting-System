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
            font-family: 'Poppins',sans-serif;
            box-sizing: border-box;
        }
        .criminal{
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
                
                

        }

        th{
            background-color:blue;
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
    <div class="head">
        <h1>Criminal Database</h1>
        <ul>
            <li><a href="Add_criminal.php" target="main1">Add Criminal</a></li>
            <li><a href="removecriminal.php" target="main1">Remove Criminal</a></li>
        </ul>
    </div>

    <div class="criminals">
   
        <table>
            <thead>
                <th>Criminal Id</th><th>Name</th><th>Address</th><th>Mobile</th><th>Photo</th>
                <?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crime_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the criminal details and images from the database
$sql = "SELECT * FROM criminal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
      
?>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo $row['cm_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"height="100" width="100"/>';?></td>
                </tr><br>
            </tbody>
        </table>
    </div>
</body>
<?php
    }
} 


// Close the database connection
$conn->close();
?>

</html>