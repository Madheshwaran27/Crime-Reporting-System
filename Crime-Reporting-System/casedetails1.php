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
    $query="select c_id,type_crime,d_o_c,description,mob,u_addr from complaint natural join user where c_id='$c_id'";
    $result=mysqli_query($conn,$query); 
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
    <thead style="background-color: rgb(78, 14, 64); color: white;">
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
        <thead class="thead-dark" style="background-color: rgb(58, 5, 49); color: white;">
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
</body>
</html>