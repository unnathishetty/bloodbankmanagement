<?php

          $con= mysqli_connect("localhost","root","","blooddonation");
          session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blood Request Status</title>
	<link rel="stylesheet" type="text/css" href="css/DonDetails.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
<li><a href="SeekerPage.html">Seeker Details</a></li>
    <li><a href="SSDonor.php">Search Donor</a></li>
    <li><a href="SDStatus.php">Search Donor Status</a></li>
    <li><a href="SeekerRB.php">Request Blood</a></li>
    <li class="active"><a href="RBStatus.php">Request Blood Status</a></li>
    <li><a href="Logout.php">Logout</a></li>
    <li><a href="ContactPage.html">Contact</a></li>
  </ul>
 	</ul>
 </div>
	<div class="container">
    <h1>Blood Request Status</h1>
<?php
           if(isset($_SESSION['adminid']))
           { $id=$_SESSION['id'];

           	 $q=mysqli_query($con,"SELECT * from `reqblood`  WHERE r_id='$id'");
          if(mysqli_num_rows($q)==0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Donor Request Yet!!</h2>
              <?php

          }
          else
          {
             echo "<table>";
             echo"<tr>";
              //table header--------------------
             echo "<th>"; echo "Request ID";   echo "</th>";
             echo "<th>"; echo "Hospital ID";   echo "</th>";
             echo "<th>"; echo  "Requested Blood for";   echo "</th>";
             echo "<th>"; echo "Requested BloodGroup";   echo "</th>";
             echo "<th>"; echo  "Requested Blood Quantity";   echo "</th>";             
             echo "<th>"; echo " City";   echo "</th>";
             echo "<th>"; echo "Status";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {

               echo "<tr>";
               echo "<td>";  echo $row['r_id'];  echo "</td>";
               echo "<td>";  echo $row['h_id'];  echo "</td>";
               echo "<td>";  echo $row['r_pname'];  echo "</td>";
               echo "<td>";  echo $row['r_bloodgroup'];  echo "</td>";
               echo "<td>";  echo $row['r_quantity'];  echo "</td>";
               echo "<td>";  echo $row['r_city'];  echo "</td>";
               echo "<td>";  echo $row['r_status'];  echo "</td>";

               echo "</tr>";
    
             }
             echo"<table>";
          }

}
       
?>

	</div>
   </header>
</body>
</html>