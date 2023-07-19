<?php

          $con= mysqli_connect("localhost","root","","blooddonation");
          session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seeker Request</title>
	<link rel="stylesheet" type="text/css" href="css/DonDetails.css">
</head>
<body>
	<header><br>
		<h2>&nbsp&nbsp&nbsp&nbspBLOOD DONATION</h2>
 <div class="main">
 	<ul>
 		<li><a href="DonorPage.php">Donor Details</a></li>
    <li><a href="DonLog.php">Donor Donation Log</a></li>
    <li><a href="DonDetails.php">Donation Details</a></li>
    <li class="active"><a href="SeekerRequest.php">Seeker Request</a></li>
    <li><a href="Logout.php">Logout</a></li>
    <li><a href="ContactPage.html">Contact</a></li>
 	</ul>
 </div>
	<div class="container">
    <h1>Seeker Donor Request!!</h1>
<?php
       if(isset($_SESSION['adminid']))

       {
          $id=$_SESSION['id'];
         ?>
      
           <div class="container1">
            <?php
             $q=mysqli_query($con,"(SELECT s.s_id,s.status,h.h_name,h.h_contactno,h.h_email,h.h_city FROM `searchdonor` s,`hospital` h WHERE d_id='$id' AND s.s_id=h.h_id) UNION (SELECT s.s_id,s.status,e.se_name,e.se_conno,e.se_email,e.se_city FROM `searchdonor` s,`seeker` e WHERE d_id='$id' AND s.s_id=e.se_id) ;");
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
             echo "<th>"; echo "Seeker ID";   echo "</th>";
             echo "<th>"; echo "Seeker Name";   echo "</th>";
             echo "<th>"; echo "City";   echo "</th>";
             echo "<th>"; echo "Contact Number";   echo "</th>";
             echo "<th>"; echo "E-mail ID";   echo "</th>";
             echo "<th>"; echo "Accept Request";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             {
               $sid=$row['s_id'] ;
               echo "<tr>";
               echo "<td>";  echo $sid;  echo "</td>";
               echo "<td>";  echo $row['h_name'];  echo "</td>";
               echo "<td>";  echo $row['h_city'];  echo "</td>";
               echo "<td>";  echo $row['h_contactno'];  echo "</td>";
               echo "<td>";  echo $row['h_email'];  echo "</td>";
               echo "<td>";  ?><form method="POST"><input type="submit" name="sub" value="Accept"></form> <?php echo "</td>";
               echo "</tr>";
               if(isset($_POST['sub']))
               {
                  $sql="UPDATE `searchdonor` SET status='Accepted..' WHERE  s_id='$sid' AND d_id='$id'";
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