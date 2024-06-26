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
    
      $image = $_FILES['image']['tmp_name'];
      $cm_name=$_POST['cm_name'];
      $cm_addr=$_POST['cm_addr'];
      $cm_mob=$_POST['cm_mob'];
      $image= addslashes(file_get_contents($image));
    //   <!-- $image=base64_encode($image); -->
      $conn = mysqli_connect("localhost", "root", "", "crime_portal");
      mysqli_select_db($conn,"crime_portal");

      $query="INSERT INTO criminal (name,address,mobile,photo) VALUES ('$cm_name','$cm_addr','$cm_mob','$image')";
      $result=mysqli_query($conn, $query);

        if($result){
            echo "<script>alert('Criminal Added')</script>";
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
        <h1 style="margin-bottom: 20px;">Add Criminals</h1>
         Name<br>
        <input type="text" name="cm_name"><br>
        Address <br>
        <textarea name="cm_addr" id="" cols="30" rows="5"></textarea> <br>
        Mobile <br>
        <input type="text" name="cm_mob" maxlength="10" minlength="10"> <br>
        Select image to upload <br>
        <input type="file" name="image" id="image"><br>
        <input type="submit" name="submit" value="Upload" id="btn">
        </form>

        </div>
    </div>
</body>
</html>