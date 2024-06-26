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

p{
   text-align:center;
   font-size:40px;
   color:rgb(167, 205, 241);
   margin-top: 40px;
   font-weight: bold;
}

.container{
    height: 100vh;
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:200px;
    margin-bottom: 200px;
   
}
.box{
    background-color:rgba(0,0,0,0.6);
    width: 500px;
    height: 850px;
    text-align: center;
    box-shadow: 0 0 10px 0 blue;
  
    
   /* margin-top: 100px;*/
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
textarea{
    resize: none;
    margin-bottom: 60px;
    margin-top:10px;
}
#slt{
    width: 150px;
    height: 30px;
    margin-top: 10px;
    margin-bottom: 30px;
    font-size: 18px;
    border-radius: 0;
    border: none;
}

#slt1{
    width: 150px;
    height: 30px;
    margin-top: 10px;
    margin-bottom: 30px;
    font-size: 18px;
    border-radius: 0;
    border: none;
}

select{
    text-align: center;
}

#submit{
 border: 0;   
}

#submit:hover{
    color: white;
    background-color:rgb(60, 152, 189) ;
}

#ip{
    color:black;
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
        
        $result=mysqli_query($conn,"SELECT a_no FROM user where u_id='$u_id' ");
        $q1=mysqli_fetch_assoc($result);
        $a_no=$q1['a_no'];
    
        $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result1);
        $u_name=$q2['u_name'];

        $result2=mysqli_query($conn,"SELECT mob FROM user where u_id='$u_id' ");
        $q3=mysqli_fetch_assoc($result2);
        $u_mob=$q3['mob'];
      
    
    
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
                
        $location=$_POST['location'];
        $type_crime=$_POST['type_crime'];
        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];
        
        $var=strtotime(date("Ymd"))-strtotime($d_o_c);

        $result3=mysqli_query($conn,"SELECT p_id,p_mob,p_name from police_station WHERE location='$location'");
        $q4=mysqli_fetch_assoc($result3);
        $p_id=$q4['p_id'];
        $p_mob=$q4['p_mob'];
        $p_name=$q4['p_name'];
        
        
    if($var>=0)
    {
          
     $comp="INSERT into complaint(u_id,u_name,u_mob,a_no,location,type_crime,d_o_c,description,pol_status,p_id,p_mob,p_name) values('$u_id','$u_name','$u_mob','$a_no','$location','$type_crime','$d_o_c','$description','Pending','$p_id','$p_mob','$p_name')";
        mysqli_select_db($conn,"crime_portal"); 
      $res=mysqli_query($conn,$comp);
      
      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
<body>
    <div class="container">
        <div class="box">
            <p>Log Complaint</p>
            <form method="post">
                Email<br>
                <input type="text" required disabled value=<?php echo"$u_id"; ?> id="ip"><br>
                Location of crime <br>
                <select name="location" id="slt1">
                <?php
                        $loc=mysqli_query($conn,"select location from police_station");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                                	<option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
                </select><br>
                Type of crime <br>
                <select name="type_crime" id="slt">
                    <option value="Murder">Murder</option>
                    <option value="Theft">Theft</option>
                    <option value="Robbery">Robbery</option>
                    <option value="Kidnapping">Kidnapping</option>
                    <option value="Assault">Assault</option>
                </select><br>
                Date of crime <br>
                <input type="date" name="d_o_c" required><br>
                Description <br>
                <textarea name="description" id="" cols="40" rows="8" required placeholder="&nbsp;Give more details of the incident here "></textarea><br>
                <input type="submit" name="s" value="Submit" id="submit">
            </form>
        </div>
    </div>
   
</body>
</html>