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
            font-family: 'Poppins',sans-serif;
        }

        .container{
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to Right,cadetblue,grey);
        }

        .box{
            height: 700px;
            width: 700px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input{
            margin-bottom: 20px;
        }
        form{
            font-size: large;
            text-align: center;
        }

        #btn{
            width: 75px;
            height: 25px;
        }
    </style>
    <?php
    if(isset($_POST['submit'])) {
        $p_id=$_POST['p_id'];
        $c_id=$_POST['c_id'];
        $des=$_POST['description'];
      $image = $_FILES['image']['tmp_name'];
      $name = $_FILES['image']['name'];
    //   $image=base64_encode($image);
      $image= addslashes(file_get_contents($image));
      $conn = mysqli_connect("localhost", "root", "", "crime_portal");
      mysqli_select_db($conn,"crime_portal");

      $query="INSERT INTO suspects (c_id,name,p_id,images,description) VALUES ('$c_id','$name','$p_id','$image','$des')";
      $result=mysqli_query($conn, $query);

        if($result){
            echo "<script>alert('Suspects Reported Successully')</script>";
        }

        else{
            echo "<script>alert('Failed')</script>";
        }
    }
    ?>
    
</head>
<body>
    <div class="container">
        <div class="box">
            
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h1 style="margin-bottom: 20px;">Report Suspects</h1>
        Enter Complaint Id <br>
        <input type="text" name="c_id"><br>
        Police Id <br>
        <input type="text" name="p_id"><br>
        Select image to upload <br>
        <input type="file" name="image" id="image"><br>
        Desrciption <br>
        <textarea name="description" id="" cols="30" rows="4" placeholder="tell us about suspects"></textarea><br>
        <input type="submit" name="submit" value="Upload" id="btn">
        </form>

        </div>
    </div>
</body>
</html>