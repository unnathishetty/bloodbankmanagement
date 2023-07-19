<?php
           session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seeker Page</title>
	<link rel="stylesheet" type="text/css" href="css/HospitalPage.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 		<li class="active"><a href="SeekerPage.html">Seeker Details</a></li>
 		<li><a href="SSDonor.php">Search Donor</a></li>
 		<li><a href="SDStatus.php">Search Donor Status</a></li>
 		<li><a href="SeekerRB.php">Request Blood</a></li>
 		<li><a href="RBStatus.php">Request Blood Status</a></li>
 		<li><a href="Logout.php">Logout</a></li>
 		<li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>
 <?php
    if(isset($_SESSION['adminid']))
    {
    	echo"<br><br><br><br>";
    	echo "<br><h1>WELCOME ".$_SESSION['name']."..</h1>";
    ?>
    <div class="container">
    <?php
    $id=$_SESSION['id'];
    $q=mysqli_query($con,"SELECT *  FROM `seeker` WHERE se_id='$id'");
    while($row=mysqli_fetch_assoc($q))
          { echo "<h3>Seeker Details!!</h3><br>";
            echo "<b>Seeker ID:</b>"; echo $row['se_id']; echo "<br>";
            echo "<b>Seeker Name:</b>"; echo $row['se_name']; echo "<br>";
            echo "<b>Seeker City:</b>"; echo $row['se_city']; echo "<br>";
            echo "<b>Contact Number:</b>"; echo $row['se_conno']; echo "<br>";
            echo "<b>E-mail ID:</b>"; echo $row['se_email']; echo "<br>";
            }
          }

            ?>

 </div>

	 </header> 
</body>
</html>