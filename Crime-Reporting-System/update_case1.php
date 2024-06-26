<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    $c_id=$_SESSION['c_id'];
    $p_id=$_SESSION['p_id'];    
    
    $query="select c_id,type_crime,d_o_c,description,mob,u_addr from complaint natural join user where c_id='$c_id' and p_id='$p_id'";
    $result=mysqli_query($conn,$query);  
    
    if(isset($_POST['status'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $upd=$_POST['update'];
            $qu1=mysqli_query($conn,"insert into update_case(c_id,case_update) values('$c_id','$upd')");
        }
    }
    
    if(isset($_POST['close'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $up=$_POST['final_report'];
            $qu2=mysqli_query($conn,"insert into update_case(c_id,case_update) values('$c_id','$up')");
            $q2=mysqli_query($conn,"update complaint set pol_status='ChargeSheet Filed' where c_id='$c_id'");
           
        }
    }
     $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$c_id'");
    
    ?>

	<title>Incharge Homepage</title>
	
  <script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
        if(sta2=="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank FIeld Not Allowed");
        }
      }
    </script>
</head>
<body>
	
  <div style="padding:50px; margin-top:10px;">
   <table>
    <thead style="background-color: rgb(18, 66, 18); color: white;">
    <tr>
        <th>Complaint Id</th>
        <th>Type of Crime</th>
        <th>Date of Crime</th>
        <th>Description</th>
        <th>Complainant Mobile</th>
        <th>Complainant Address</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
    <tbody style="background-color: white; color: black;">
       <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>
        <td><?php echo $rows['d_o_c']; ?></td>
        <td><?php echo $rows['description']; ?></td>
        <td><?php echo $rows['mob']; ?></td>
        <td><?php echo $rows['u_addr']; ?></td>
      </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>
    
<div style="padding:50px; margin-top:8px;">
   <table class="table table-bordered">
        <thead class="thead-dark" style="background-color: rgb(18,66,18); color: white;">
    <tr>
      <th scope="col">Date Of Update</th>
      <th scope="col">Case Update</th>
    </tr>
       </thead>
      <?php
              while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
        
      <td><?php echo $rows1['d_o_u']; ?></td>
      <td><?php echo $rows1['case_update']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>

  <div style="width: 100%; height: 250px;"> 
    
    <div style="width: 50%;float: left;height: 250px; background-color: #dcdcdc"> 
     
     <form method="post">
    
      <h5 style="text-align: center;"><b>Complaint ID</b></h5>                 
      <input type="text" name="cid" style="margin-left: 47%; width: 50px;" disabled value="<?php echo "$c_id" ?>">
        
         
      <select class="form-control" style="align-content: center;margin-top: 20px; margin-left: 35%; width: 180px;" name="update">
          <option>Criminal Verified</option>
          <option>Criminal Caught</option>
          <option>Criminal Interrogated</option>
          <option>Criminal Accepted the Crime</option>
          <option>Criminal Charged</option>
      </select>

      <input class="btn btn-primary btn-sm" type="submit" value="Update Case Status" name="status" style="margin-top: 10px; margin-left: 40%;">
        
    </form>
    </div>     
     <div style="width: 50%;float: right;height: 250px; background-color: #dfdfdf;">
     <form method="post">
     <textarea name="final_report" cols="40" rows="5" placeholder="Final Report" style="margin-top: 20px;margin-left: 20px;" id="ciid" onfocusout="f1()" required></textarea>
     <div>
      <input  class="btn btn-danger" type="submit" value="Close Case" name="close" style="margin-left: 20px; margin-top: 10px; margin-bottom:20px;">
       </div> 
    </form>
  </div>

 </div>

</body>
</html>