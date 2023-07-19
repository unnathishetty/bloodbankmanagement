
<?php
          session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Donor</title>
	<link rel="stylesheet" type="text/css" href="css/SearchDonor.css">
</head>

<body>
	<header>
 <div class="main">
 	<ul>
  <li><a href="HospitalPage.php">Hospital Details</a></li>
   <li><a href="BloodStock.php">Blood Stock</a></li>
   <li class="active"><a href="HSDonor.php">Search Donor</a> 
   <li><a href="GiveBlood.php">Give Blood</a></li>
     <li><a href="HSDStatus.php">Search Donor Status</a> 
     <li><a href="DCR.php">Donation Camp</a> 
     <li><a href="Logout.php">Logout</a></li>
   <li><a href="ContactPage.html">Contact</a></li>
  </ul>
 </div><br>
<div class="container">
     <h1>Search Donor</h1>
	<form  method="POST">
		<div class="form_input">
			       <select name="bt"> 
               <option   value="">Blood Type..</option>
		       <option   value="O+ve">O+ve</option>
		       <option   value="O-ve">O-ve</option>
		       <option   value="A+ve">A+ve</option>
		       <option   value="A-ve">A-ve</option>
		       <option   value="B+ve">B+ve</option>
		       <option   value="B-ve">B-ve</option>
		       <option   value="AB+ve">AB+ve</option>
		       <option   value="AB-ve">AB-ve</option>
              </select>
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
               </select>
           <input name="Search"  type="submit" value="Search" >
       </div>
       </div>
   </form>
   <?php
       if(isset($_SESSION['adminid']))

       {
           	if(isset($_POST['Search']))
       {
         ?>
      
           <div class="container1">
           	<?php
           	 $q=mysqli_query($con,"SELECT * FROM `donor` WHERE d_bloodgroup LIKE '%$_POST[bt]%' AND d_city LIKE '%$_POST[city]%';");
          if(mysqli_num_rows($q)==0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Matches Found! Try again later.</h2>
              <?php

          }
          else
          {
             echo "<table>";
             echo"<tr>";
              //table header--------------------
             echo "<th>"; echo "Donor ID";   echo "</th>";
             echo "<th>"; echo "Donor Name";   echo "</th>";
             echo "<th>"; echo "Blood-Group";   echo "</th>";
             echo "<th>"; echo "City";   echo "</th>";
             echo "<th>"; echo "Gender";   echo "</th>";
             echo "<th>"; echo "Address";   echo "</th>";
             echo "<th>"; echo "Contact Number";   echo "</th>";
             echo "<th>"; echo "E-mail ID";   echo "</th>";
             echo "<th>"; echo "Request Donor";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {
               $_SESSION['did']=$row['d_id'];
               
               echo "<tr>";
               echo "<td>";  echo $_SESSION['did'] ;  echo "</td>";
               echo "<td>";  echo $row['d_name'];  echo "</td>";
               echo "<td>";  echo $row['d_bloodgroup'];  echo "</td>";
               echo "<td>";  echo $row['d_city'];  echo "</td>";
               echo "<td>";  echo $row['d_gender'];  echo "</td>";
               echo "<td>";  echo $row['d_address'];  echo "</td>";
               echo "<td>";  echo $row['d_conno'];  echo "</td>";
               echo "<td>";  echo $row['d_email'];  echo "</td>";
               echo "<td>";  ?><form method="POST" action="HSD.php"><input type="submit" name="sub" value="Request"></form> <?php echo "</td>";
               echo "</tr>";
             }
             echo"<table>";
          }
       }
     }
?>
         </div>    
	
</header>
</body>
</html>