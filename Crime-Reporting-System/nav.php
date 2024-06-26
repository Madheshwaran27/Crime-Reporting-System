<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
    }

    nav{
        width: 100%;
        box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
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
        background-color: rgb(180, 165, 165);
        color: white;
    }
    

    .submenu{
        display: none;
    }
    .submenu ul li a{
        padding: 10px;
    }
    

    nav .menu ul li:hover .submenu{
        display: block;
        position: absolute;
        text-align: center;
        background-color:white;
        margin-left: 6px;
        width: 150px;
    }

    nav .menu ul li:hover .submenu ul{
        display: block;
        position: absolute;
        width: 168px;
        text-align: center;
        margin-top: 10px;
        background-color:rgb(180, 165, 165);
    }

    nav .menu ul li:hover .submenu ul li{

            text-align: center;
            width: 120px;
            padding: 10px 0;
    }

    nav .menu ul li:hover .submenu ul li a{
        padding: 10px;
        background-color:rgb(180, 165, 165);
        
    }



</style>
<body>
    
<nav>
    <div class="menu">
        <ul>
            <li class="title"><a href="#" class="title">CRIME REPORTING PORTAL</a></li>
           <li class="menus" style="margin: 30px;"><a href="#">User Login</a></li>
           <li style="margin: 30px;"><a href="#">Official Login</a>
        
            <div class="submenu">
                <ul>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Police</a></li>
                </ul>
            </div>
        
            </li>
           <li style="margin: 30px;"> <a href="#">Register</a></li>
        </ul>
    </div>
</nav>





</body>
</html>