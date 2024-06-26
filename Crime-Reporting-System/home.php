<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRIME REPORTING PORTAL</title>
  <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family:'Poppins',sans-serif;

        }
        body{
           
            background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(policeman.jpg); 
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
        nav{
        width: 100%;
        box-shadow: 0 0 10px 0 rgba(255,255,255,0.5);
        background-color: white;
    }

    nav .menu ul{
        list-style: none;
        display: inline-flex;
       
    }

    nav .menu ul li{
        width:180px;
        /*height: 50px;*/
        margin: 20px;
        font-size: 18px;
        text-align: center;
        border-radius: 10px;
        /*
        display: flex;
        justify-content: center;
        align-items:center ;
        */
    } 
    nav .menu ul li a{
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        padding: 10px 20px;
        
    }
    
    nav .menu ul .title{
        width: 35rem;
        color: blue;
        font-weight: bolder;
        font-size: 28px;
        text-align: center;
    }
    nav .menu ul .title:hover{
        background-color: white;
        color: blue;
    }

    nav .menu ul .menus{
        margin-left: 150px;
    }

    nav .menu ul li :hover{
        background-color:rgb(0, 127, 136);
        color: white;
    }
    

    .submenu{
        display: none;
    }
    
    

    nav .menu ul li:hover .submenu{
        display: block;
        position: absolute;
        background-color:white;
        width: 150px;
        
    }

    nav .menu ul li:hover .submenu ul{
        display: block;
        position: absolute;
        margin-top: 10px;
        background-color: #fff;
    }

    nav .menu ul li:hover .submenu ul li{
            border-radius: 0;
            padding: 10px 40px;
            margin-top: 30px;
            background-color:white;
            text-align: center;
           
    }

    nav .menu ul li:hover .submenu ul li a{
        padding: 10px 60px;
        margin-left: -40px;
        
        
    }
/*        .nav-bar{
            width: 100%;
            height: 70px;
            background-color:  rgba(255,255,255,1);
            box-shadow: 0 0 10px 0 rgba(255,255,255,0.5);
        }

        .nav-bar ul li{
            font-size: 18px;
            float:right;
            width: 12rem;
            height:70px;
            list-style:none ;
            text-align: center;
            margin-top: -69px; 
            /*padding-top: 30px;
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
            */
    .container{
            height: 78vh;
            width:100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box{
            width: 500px;
            height: 500px;
            padding-top: 140px;
            text-align: center;
        }
        button{
            height: 40px;
            width: 150px;
          /*  margin-left: 200px; */
            margin-top: 30px;
            font-size: 25px;
            border: 0;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
        }
        
        
        button:hover{
            background-color: #075b8b;
           
            /*transition: 0.5s;*/
           
            
        }
       button a{
            text-decoration: none;
            text-align: center;
            color: black;
            
        }
        button a:hover{
             color: white;
        }
        .container .box h1{
          color: #fff;
        }
        

        footer{
            
            height: 58px;
            width: 100%;
            background-color: rgba(0,0,0,0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        footer .about b{
            text-decoration: none;
            color:white;
        }

        
    
    </style>
 
</head>
<body>

   
<nav>
    <div class="menu">
        <ul>
            <li class="title"><a href="home.php" class="title">CRIME REPORTING PORTAL</a></li>
           <li class="menus" style="margin: 30px;"><a href="userlogin.php">User Login</a></li>
           <li style="margin: 30px;"><a href="#">Official Login</a>
        
            <div class="submenu">
                <ul>
                    <li><a href="adminlogin.php">Admin</a></li>
                    <li><a href="policelogin.php">Police</a></li>
                </ul>
            </div>
        
            </li>
           <li style="margin: 30px;"> <a href="registration.php">Register</a></li>
        </ul>
    </div>
</nav>

<!--
<div class="nav-bar">
        <p><a href="home.php">CRIME REPORTING PORTAL</a></p>
        <ul>
            <li><a href="registration.php">REGISTER</a></li>
            <li><a href="official_login.php">OFFICIAL LOGIN</a>
            </li>
            <li><a href="userlogin.php">USER LOGIN</a></li>
        </ul>
    </div>
    -->

<div class="container">
    <div class="box">
        <h1>NEED TO REPORT A CRIME ?</h1><br>
            <h1>Sign up bellow</h1><br>
        <button> <a href="registration.php"  style="padding: 5px 30px;">sign up</a></button> <br>
    </div>
</div>

<footer>
    <div class="about">
      <b> &copy;&nbsp;Crime Reporting Portal 2023</b>
    </div>
</footer>

</body>

</html>