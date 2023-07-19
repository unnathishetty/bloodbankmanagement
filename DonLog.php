<?php

          $con= mysqli_connect("localhost","root","","blooddonation");
          session_start();
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
 		<li><a href="DonorPage.html">Donor Details</a></li>
    <li class="active"><a href="DonLog.php">Donor Donation Log</a></li>
    <li><a href="DonDetails.php">Donation Details</a></li>
    <li><a href="SeekerRequest.php">Seeker Request</a></li>
    <li><a href="Logout.php">Logout</a></li>
    <li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>
	<div class="container">
<?php
           if(isset($_SESSION['adminid']))
           { $id=$_SESSION['id'];

           	 $q=mysqli_query($con,"SELECT * from `ddonation` WHERE d_id='$id' ");
          if(mysqli_num_rows($q)==0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Donation Done Yet!!</h2>
              <?php

          }
          else
          {
             echo "<table>";
             echo"<tr>";
              //table header--------------------
             echo "<th>"; echo "Donation ID";   echo "</th>";
             echo "<th>"; echo "Donation Name";   echo "</th>";
             echo "<th>"; echo "Donation Date";   echo "</th>";
             echo "<th>"; echo "Donation City";   echo "</th>";
             echo "<th>"; echo "Attend";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {

               echo "<tr>";
               echo "<td>";  echo $row['dd_id'];  echo "</td>";
               echo "<td>";  echo $row['dd_name'];  echo "</td>";
               echo "<td>";  echo $row['dd_date'];  echo "</td>";
               echo "<td>";  echo $row['d_city'];  echo "</td>";
               echo "<td>";  echo "<b>Attended!</b>"; echo"</td>";
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