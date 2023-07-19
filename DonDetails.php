
<?php
           session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Donation Details</title>
	<link rel="stylesheet" type="text/css" href="css/DonDetails.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 		<<li><a href="DonorPage.html">Donor Details</a></li>
    <li><a href="DonLog.php">Donor Donation Log</a></li>
    <li class="active"><a href="DonDetails.php">Donation Details</a></li>
    <li><a href="SeekerRequest.php">Seeker Request</a></li>
    <li><a href="Logout.php">Logout</a></li>
    <li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>
	<div class="container">
<?php
           if(isset($_SESSION['adminid']))
           {

           	 $q=mysqli_query($con,"SELECT * from `ndonation`;");
          if(mysqli_num_rows($q)==0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Donation Camps for now!!</h2>
              <?php

          }
          else
          {
             echo "<table>";
             echo"<tr>";
              //table header--------------------
             echo "<th>"; echo "Donation ID";   echo "</th>";
             echo "<th>"; echo "Donation Name";   echo "</th>";
             echo "<th>"; echo "Donation City";   echo "</th>";
             echo "<th>"; echo "Donation-From Date ";   echo "</th>";
             echo "<th>"; echo "Donation-Till Date";   echo "</th>";
             echo "<th>"; echo "Contact Number";   echo "</th>";
             echo "<th>"; echo "Attend";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {
             	$nid=$row['nd_id'];
             	$name=$row['nd_name'];
             	$cty=$row['nd_city'];
              $id=$_SESSION['id'];
              $ddate=$row['nd_fdate'];
               echo "<tr>";
               echo "<td>";  echo $nid;  echo "</td>";
               echo "<td>";  echo $name;  echo "</td>";
               echo "<td>";  echo $cty;  echo "</td>";
               echo "<td>";  echo $ddate;  echo "</td>";
               echo "<td>";  echo $row['nd_tdate'];  echo "</td>";
               echo "<td>";  echo $row['nd_conno'];  echo "</td>";
               echo "<td>";  ?><form method="POST"><input type="submit" name="sub" value="Accept"></form> <?php echo"</td>";
               echo "</tr>";
                 if(isset($_POST['sub']))
                        {
                           $sql="INSERT INTO `ddonation` (dd_id,d_id,dd_name,dd_date,d_city) VALUES('$nid','$id','$name','$ddate','$cty')";
                             mysqli_query($con,$sql);
                             
                          }
             }
             echo"<table>";
          }

}
       
?>

	</div>
   </header>
</body>
</html>