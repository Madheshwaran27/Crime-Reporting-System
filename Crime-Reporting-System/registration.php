 <!DOCTYPE html>
<html>

<?php

if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u_name=$_POST['uname'];
        $u_age=$_POST['age'];
        $u_id=$_POST['email'];
        $u_pass=$_POST['upwd1'];
        $u_addr=$_POST['address'];
        $a_no=$_POST['aadhaar_no'];
        $gen=$_POST['gender'];
        $mob=$_POST['mobile'];
       // $password=md5($u_pass);
       $reg="insert into user values('$u_name','$u_age','$u_id','$u_pass','$u_addr','$a_no','$gen','$mob')";
        mysqli_select_db($con,"crime_portal");
        $res=mysqli_query($con,$reg);
        if(!$res)
        {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        $message = "User Registered Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}

?>

<style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            background-image: url(policeday.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
        .nav-bar{
            width: 100%;
            height: 70px;
            background-color:  rgba(255,255,255,1);
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.5);
            position:fixed;
            margin-top: -200px;
        }

        .nav-bar ul li{
            font-size: 18px;
            float:right;
            width: 12rem;
            height:70px;
            list-style:none ;
            text-align: center;
            margin-top: -69px; 
            /*padding-top: 30px;*/
            font-weight: 300;
            margin-right: 30px;
            
            display: flex; 
            justify-content: center;
            align-items: center;
            
           
        }
        p{
            font-size: 28px;
            color:rgb(255, 255, 255);
            font-weight: bolder;
            height:70px;
            width: 35rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
            

        .nav-bar p a{
          text-decoration: none;
          color: rgb(16, 19, 211);
        }
        
       
    .nav-bar ul li a{
      color:black;
        text-decoration: none;
        padding: 10px;
        border-radius: 10px;
        font-weight: 600;
    }

    .nav-bar ul li a:hover{
       color: blue;
       
       
    }
        .container{
            height: 100vh;
            width:100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 200px;
        }
        .box{
            background-color:rgba(0,0,0,0.6);
            width: 500px;
            height: 950px;
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
            margin-bottom: 20px;
            margin-top: 5px;
            height: 30px;
            width: 250px;
            font-size: 20px;        
        }

        textarea{
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            resize: none;
        }
        #num{
            width:160px;
        }
        #slt{
            width: 80px;
            text-align: center;
            height: 30px;
            border:none;
            font-size: 20px;
        }
        #mob{
            margin-right: 35px;
            margin-left: 55px;
        }
        #ip{
            margin-top: 40px;
            /* border-radius: 20px;*/
            border: 0;
            width:180px;
        }
        #ip:hover{
            color: #fff;
            background-color: green;
            box-shadow: 0 0 5px 0 #2f2f2f;
        }
        #reg{
            margin-bottom:40px;
            color:lightgreen;
            font-size:30px;
            font-weight:bold;
        }

</style> 
    
<head>
<title>User Registration</title>

</head>
<body>
    
<div class="nav-bar">
        <p><a href="home.php">CRIME REPORTING PORTAL</a></p>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="userlogin.php">USER LOGIN</a></li>
        </ul>
    </div>
          <div class="container">
            <div class="box">
                <form  method="post">
                    <h3 id="reg">Registration</h3>
                    <label for="Your Name">
                        Your Name
                    </label><br>
                    <input type="text" name="uname" id="u_name" onblur="validateName()" required><br>
                    <label for="Age">
                        Age
                    </label><br>
                    <input type="text" name="age" id="u_age" maxlength="3" onblur="validateAge()" required><br>
                    <label for="address">
                        Address
                    </label><br>
                    <textarea name="address" id="u_addr" cols="30" rows="5" onblur="validateAddress()" required></textarea><br>
                    <label for="email">
                        Email Id
                    </label><br>
                    <input type="text" name="email" id="u_email" onblur="validateEmail()" required><br>
                    <label for="Adhaar No">
                        Adhaar No
                    </label><br>
                    <input type="text" name="aadhaar_no" id="u_aadh" maxlength="12" minlength="12" onblur="validateAadhr()" required><br>
                    <label for="Gender">
                        Gender
                    </label>
                    <label for="Mobile" id="mob">
                        Mobile
                    </label><br>
                    <select name="gender" id="slt">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    
                    <input type="text" id="num" name="mobile" maxlength="10" minlength="10"  onblur="validateMobile()" required><br>
                    <label for="password">
                        Password
                    </label><br>
                    <input type="password" name="upwd1" placeholder="&nbsp;mininum 6 characters" id="u_pwd" onblur="validatePassword()" required><br>
                    <label for="Re-password">
                        Confirm Password
                    </label><br>
                    <input type="password" name="upwd2" id="u_pwd1" onblur="validatePassword1()" required><br>
                    <input type="submit" name="s" value="Register" id="ip">
                </form>
            </div>
        </div>
          <script>
       
            
        function validateName() {
          var u_name = document.getElementById('u_name').value;
          var nameRegex = /^[a-zA-Z]+$/;
          if(!nameRegex.test(u_name)) {
            document.getElementById("u_name").value="";
            alert("Name must contain only alphabets");
          }
        }

        function validateAge(){
            var u_age = document.getElementById('u_age').value;
            var ageRegex = /^[0-9]{2}$/;
            if(!ageRegex.test(u_age)){
            document.getElementById('u_age').value="";
            alert("please enter age properly");

            }
        }
    

    function validateAddress(){
        var address=document.getElementById("u_addr").value;
        if(address.length<=5){
            document.getElementById("u_addr").value="";
            alert("please provide valid address");
    
        }
    }
    function validateEmail(){
           var email=document.getElementById("u_email").value;
          var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if (!emailRegex.test(email)) {
            document.getElementById("u_email").value="";
            alert("Please enter a valid email address");
          }
        }
    
    function validateAadhr() {
          var adhaar=document.getElementById("u_aadh").value;
         var adhaarRegex = /^[0-9]{12}$/;
          if (!adhaarRegex.test(adhaar)) {
            document.getElementById("u_aadh").value="";
            alert("Please enter a valid 12-digit Aadhaar number");
          }
        }
        
    function validateMobile(){
        var mobile=document.getElementById("num").value;
          var mobileRegex = /^[0-9]{10}$/;
          if (!mobileRegex.test(mobile)) {
            document.getElementById("num").value="";
            alert("Please enter a valid 10-digit mobile number");
          }
        }
        
        
    function validatePassword(){
        var password=document.getElementById("u_pwd").value;
        if (password == "" && password < 6) {
            document.getElementById("u_pwd").value="";
          alert("Invalid password");
        }
    }

    function validatePassword1(){
        var password=document.getElementById("u_pwd").value;
        var confirm_password=document.getElementById("u_pwd1").value;
        if(confirm_password!=password){
            document.getElementById("u_pwd1").value="";
            alert("please enter password correctly");
        }
    }

       
    </script>
</body>
</html>