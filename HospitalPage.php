<?php
           session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hospital Page</title>
	<link rel="stylesheet" type="text/css" href="css/HospitalPage.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 		<li class="active"><a href="HospitalPage.php">Hospital Details</a></li>
 		<li><a href="BloodStock.php">Blood Stock</a></li>
 		<li><a href="HSDonor.php">Search Donor</a>	
 	  <li><a href="GiveBlood.php">Give Blood</a></li>
    <li><a href="HSDStatus.php">Search Donor Status</a> 
    <li><a href="DCR.php">Donation Camp</a> 
    <li><a href="Logout.php">Logout</a></li>
 		<li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>
   <?php
    if(isset($_SESSION['adminid']))
    {
      echo"<br><br><br><br>";
      echo "<br><h1>WELCOME ".$_SESSION['Name']."..</h1>";
    ?>
    <div class="container">
    <?php
    $id=$_SESSION['id'];
    $q=mysqli_query($con,"SELECT *  FROM `hospital` WHERE h_id='$id'");
    while($row=mysqli_fetch_assoc($q))
          { echo "<h3>Hospital Details!!</h3><br>";
            echo "<b>Hospital ID:</b>"; echo $row['h_id']; echo "<br>";
            echo "<b>Hospital Name:</b>"; echo $row['h_name']; echo "<br>";
            echo "<b>Hospital City:</b>"; echo $row['h_city']; echo "<br>";
            echo "<b>Contact Number:</b>"; echo $row['h_contactno']; echo "<br>";
            echo "<b>E-mail ID:</b>"; echo $row['h_email']; echo "<br>";
            }
          }

            ?>
</div>

	 </header>
</body>
</html>