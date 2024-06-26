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
            font-family: 'Poppins',sans-serif;
        }

        .container{
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box{
            height: 300px;
            width: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0,0,0,0.4);
            border-radius: 10px;
        }

        form{
            text-align: center;
            color: white;
        }

        #ip{

            width: 180px;
            height: 30px;
            margin-bottom: 60px;
            margin-top: 20px;
            font-size: 20px;

        }

        #st{

            width: 150px;
            height: 30px;
            font-size: 20px;
            color: white;
            background-color:rgb(9, 54, 75);
            border: 0;
            
        }


        #st:hover{

            color: white;
            background-color:rgb(56, 165, 216);

        }

    </style>
    <?php
session_start();
if(!isset($_SESSION['x']))
    header("location:policelogin.php");

if(isset($_POST['s'])){

if($_SERVER["REQUEST_METHOD"]=="POST")
    
    $cid=$_POST['cid'];

$_SESSION['c_id']=$cid;
header("location:casedetails1.php");
}

?>
</head>


<body>
    <div class="container">
        <div class="box">

            <form method="post">
                <h1>Enter Complaint Id</h1>
                <input type="text" name="cid" id="ip"><br>
                <input type="submit" name="s" id="st" value="submit"><br>
            </form>        


        </div>
    </div>
   
</body>
</html>