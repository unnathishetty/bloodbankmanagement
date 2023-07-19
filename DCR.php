<?php
       session_start();
       $con= mysqli_connect("localhost","root","","blooddonation");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Donation Camp</title>
	<link rel="stylesheet" type="text/css" href="css/DRegister.css">
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
     <li><a href="HSDStatus.php">Search Donor Status</a> 
     <li class="active"><a href="DCR.php">Donation Camp</a> 
     <li><a href="Logout.php">Logout</a></li>
 	 <li><a href="ContactPage.html">Contact</a></li>
 	</ul>
</div>
<br>
<div class="container">
     <h1>Enter Blood Donation Camp Details</h1><br>
	<form  method="POST" >
		<div class="form_input">
			<input type="text"  name="nam" placeholder="Donation Name" required><br><br>
			<select name="city"> 
                <option   value="">City</option>
		       <option   value="Bangalore">Bangalore</option>
		       <option   value="Chennai">Chennai</option>
		       <option   value="Chandigarh">Chandigarh</option>
		       <option   value="Delhi">Delhi</option>
               <option   value="Guwahati">Guwahati</option>
               <option   value="Hyderabad">Hyderabad</option>
		       <option   value="Kochi">Kochi</option>
		       <option   value="Kolkata">Kolkata</option>
		       <option   value="Mangaluru">Mangaluru</option>
		       <option   value="Mumbai">Mumbai</option>
		       <option   value="Panaji">Panaji</option>
		       <option   value="Pune">Pune</option>
               </select><br><br>
              <b>From Date:</b>
			<input type="date"  name="fd"  required><br>
              <b>To Date:</b>
			<input type="date"  name="td"  required><br>
			<input type="text" name="cn" placeholder="Contact Number" required><br>
			<input type="submit" name="sub" value="Submit" ><br><br>
		</div>
	</form>
	<?php

if(isset($_SESSION['adminid']))

	   {
	   	if(isset($_POST['sub']))
           {
	   	$did=rand(10000,99999);
	   	$id=$_SESSION['id'];
	   	$sql="INSERT INTO `ndonation` (nd_id,nd_name,nd_city,nd_fdate,nd_tdate,h_id,nd_conno) VALUES ('$did','$_POST[nam]','$_POST[city]','$_POST[fd]','$_POST[td]','$id','$_POST[cn]')";
        mysqli_query($con,$sql);

	   }
	}
	
	?>
	     </div>

</header>
</body>
</html>