<?php

          $con= mysqli_connect("localhost","root","","blooddonation");
          session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Donor Status</title>
	<link rel="stylesheet" type="text/css" href="css/DonDetails.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 	<li><a href="HospitalPage.php">Hospital Details</a></li>
   <li><a href="BloodStock.php">Blood Stock</a></li>
   <li><a href="HSDonor.php">Search Donor</a> 
   <li><a href="GiveBlood.php">Give Blood</a></li>
     <li class="active"><a href="HSDStatus.php">Search Donor Status</a> 
     <li ><a href="DCR.php">Donation Camp</a> 
     <li><a href="Logout.php">Logout</a></li>
   <li><a href="ContactPage.html">Contact</a></li>
  </ul>
 	</ul>
 </div>
	<div class="container">
    <h1>Search Donor Status</h1>
<?php
           if(isset($_SESSION['adminid']))
           { $id=$_SESSION['id'];

           	 $q=mysqli_query($con,"SELECT s.s_id,s.d_id,d.d_name,d.d_city,d.d_bloodgroup,d.d_conno,d.d_email,s.status from `donor` d ,`searchdonor` s WHERE s.d_id=d.d_id AND s.s_id='$id'");
          if(mysqli_num_rows($q)==0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Donor Respond Yet!!</h2>
              <?php

          }
          else
          {
             echo "<table>";
             echo"<tr>";
              //table header--------------------
             echo "<th>"; echo "Donor ID";   echo "</th>";
             echo "<th>"; echo "Donor Name";   echo "</th>";
             echo "<th>"; echo "Donor City";   echo "</th>";
             echo "<th>"; echo "Donor BloodGroup";   echo "</th>";
             echo "<th>"; echo "Contact Number";   echo "</th>";
             echo "<th>"; echo "Donor e-Mail Address";   echo "</th>";
             echo "<th>"; echo "Status";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {

               echo "<tr>";
               echo "<td>";  echo $row['d_id'];  echo "</td>";
               echo "<td>";  echo $row['d_name'];  echo "</td>";
               echo "<td>";  echo $row['d_city'];  echo "</td>";
               echo "<td>";  echo $row['d_bloodgroup'];  echo "</td>";
               echo "<td>";  echo $row['d_conno'];  echo "</td>";
               echo "<td>";  echo $row['d_email'];  echo "</td>";
               echo "<td>";  echo $row['status'];  echo "</td>";

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