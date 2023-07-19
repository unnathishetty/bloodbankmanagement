<?php
           session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor Page</title>
	<link rel="stylesheet" type="text/css" href="css/DPage.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 		<li class="active"><a href="DonorPage.php">Donor Details</a></li>
 		<li><a href="DonLog.php">Donor Donation Log</a></li>
 		<li><a href="DonDetails.php">Donation Details</a></li>
    <li><a href="SeekerRequest.php">Seeker Request</a></li>
    <li><a href="Logout.php">Logout</a></li>
 		<li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>

 <?php
    if(isset($_SESSION['adminid']))
    {  $id=$_SESSION['id'];
    	echo"<br><br><br><br>";
    	echo "<br><h1>WELCOME ".$_SESSION['Name']."..</h1>";
     $q=mysqli_query($con,"SELECT count(*)  FROM `ddonation` WHERE d_id='$id'"); 
     $a=mysqli_fetch_assoc($q);
     echo "<br><h1>You have saved<b> "; echo ($a['count(*)']*4); echo " </b>Lives!!</h1>"
    ?>
    <div class="container">
    <?php
    $q=mysqli_query($con,"SELECT *  FROM `donor` WHERE d_id='$id'");
    while($row=mysqli_fetch_assoc($q))
          { echo "<h3>Donor Details!!</h3><br>";
            echo "<b>Donor ID:</b>"; echo $row['d_id']; echo "<br>";
            echo "<b>Donor Name:</b>"; echo $row['d_name']; echo "<br>";
            echo "<b>Donor City:</b>"; echo $row['d_city']; echo "<br>";
            echo "<b>Contact Number:</b>"; echo $row['d_conno']; echo "<br>";
            echo "<b>E-mail ID:</b>"; echo $row['d_email']; echo "<br>";
            }
          }

            ?>

 </div>
   </header>
</body>
</html>