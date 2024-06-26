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
        .nav-bar{
            width: 100%;
            height: 70px;
            background-color:  rgba(255,255,255,1);
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
            position: fixed;
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
      color:#2f2f2f;
        text-decoration: none;
        padding: 10px;
        border-radius: 10px;
    }

    .nav-bar ul li a:hover{
       color: #8f8e8e;
       
       
    }

    .dashboard{
        height: 100vh;
        width: 300px;
        display: flex;
        justify-content: center;
        background-color: #137c65;
        position: fixed;
        margin-top: 70px;
    }

    .dashboard ul{
        margin-top: 200px;
        width: 100%;
    }
    .dashboard ul li{
        margin-bottom: 50px;
        list-style: none;
        width: 100%;
        
    }
    .dashboard ul li a{
        text-decoration: none;
        color: white;
        font-weight: bold;
        display:block;
        width: 100%;
        padding: 10px;
        text-align:center;
    }
    .dashboard ul li a:hover{

        background-color: white;
        color:#137c65;

    }
    .main{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content{
       width: 100%;
       height: 90vh;
       margin-left: 300px;
       margin-top: 50px;
      
    }
    

    </style>
</head>
<?php
    session_start();
    
    
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
        ?>
<body>
   
    
<div class="nav-bar">
    <p><a href="home.php">CRIME REPORTING PORTAL</a></p>
    <ul>
        <li><a href="p_logout.php">LOGOUT</a>
        <li><a href="home.php">HOME</a></li>
        </li>
    </ul>
</div>
<div class="dashboard">
    <ul>
        <li><a href="new_complaint.php" target="main2">NEW COMPLAINTS</a></li>
        <li><a href="old_complaints.php" target="main2">OLD COMPLAINTS</a></li>
        <li><a href="update_case.php" target="main2">UPDATE A CASE</a></li>
        <li><a href="suspectsshow.php" target="main2">SUSPECTS</a></li>
    </ul>
</div>
        <div class="main">
            <div class="content">
                <iframe src="police1.php" name="main2" frameborder="0" width="100%" height="100%">
                </iframe>
            </div>
        </div>

</body>
</html>