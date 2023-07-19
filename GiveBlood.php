
<?php
          session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Give Blood</title>
	<link rel="stylesheet" type="text/css" href="css/SearchDonor.css">
</head>

<body>
	<header>
 <div class="main">
 	<ul>
 <li><a href="HospitalPage.php">Hospital Details</a></li>
   <li><a href="BloodStock.php">Blood Stock</a></li>
   <li><a href="HSDonor.php">Search Donor</a> 
   <li class="active"><a href="GiveBlood.php">Give Blood</a></li>
     <li><a href="HSDStatus.php">Search Donor Status</a> 
     <li ><a href="DCR.php">Donation Camp</a> 
     <li><a href="Logout.php">Logout</a></li>
   <li><a href="ContactPage.html">Contact</a></li>
  </ul>
 </div><br>
<div class="container">
     <h1>Give Blood</h1>
   <?php
        if(isset($_SESSION['adminid']))
           {

             $q=mysqli_query($con,"SELECT * from `reqblood`;");
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
             echo "<th>"; echo "Request ID";   echo "</th>";
             echo "<th>"; echo "Hospital ID";   echo "</th>";
             echo "<th>"; echo "Request Name";   echo "</th>";
             echo "<th>"; echo "Blood Group";   echo "</th>";
             echo "<th>"; echo "Quantity";   echo "</th>";
             echo "<th>"; echo "Request City";   echo "</th>";
             echo "<th>"; echo "Requested Date";   echo "</th>";
             echo "<th>"; echo "Contact Number";   echo "</th>";
             echo "<th>"; echo "Donate Blood";   echo "</th>";
             echo "</tr>"; 

             while($row=mysqli_fetch_assoc($q))
             { 
                 $rid=$row['r_id'];
                 $hid=$row['h_id']; 
                 $quan=$row['r_quantity'];
                 $bg=$row['r_bloodgroup'];
               echo "<tr>";
               echo "<td>";  echo $rid;  echo "</td>";
               echo "<td>";  echo $hid;  echo "</td>";
               echo "<td>";  echo $row['r_pname'];  echo "</td>";
               echo "<td>";  echo $bg;  echo "</td>";
               echo "<td>";  echo $quan;  echo "</td>";
               echo "<td>";  echo $row['r_city'];  echo "</td>";
               echo "<td>";  echo $row['r_date'];  echo "</td>";
               echo "<td>";  echo $row['r_conno'];  echo "</td>";
               echo "<td>";  ?><form method="POST"><input type="submit" name="sub" value="Donate"></form> <?php echo"</td>";
               echo "</tr>";
                 if(isset($_POST['sub']))
                        { $id=$_SESSION['id'];
                           $sql="UPDATE `reqblood` SET r_status='Accepted' WHERE h_id='$hid' ";
                             mysqli_query($con,$sql);
                             switch ($bg) {
                               case 'O+ve':
                                $sql="UPDATE `bloodstock` SET  op=op-'$quan'  WHERE  h_id='$id' ";
                                 break;
                               case 'O-ve':
                                $sql="UPDATE `bloodstock` SET  oneg=oneg-'$quan'  WHERE  h_id='$id' ";
                                 break;
                                 case 'A+ve':
                                $sql="UPDATE `bloodstock` SET  ap=ap-'$quan'  WHERE  h_id='$id' ";
                                 break;
                                 case 'A-ve':
                                $sql="UPDATE `bloodstock` SET  an=an-'$quan'  WHERE  h_id='$id' ";
                                 break;
                                 case 'B+ve':
                                $sql="UPDATE `bloodstock` SET  bp=bp-'$quan'  WHERE  h_id='$id' ";
                                 break;
                                 case 'B-ve':
                                $sql="UPDATE `bloodstock` SET  bn=bn-'$quan'  WHERE h_id='$id' ";
                                 break;
                                 case 'AB+ve':
                                $sql="UPDATE `bloodstock` SET  abp=abp-'$quan'  WHERE  h_id='$id' ";
                                 break;
                                 case 'AB-ve':
                                $sql="UPDATE `bloodstock` SET  abn=abn-'$quan'  WHERE h_id='$id' ";
                                 break;
                             }
                              
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