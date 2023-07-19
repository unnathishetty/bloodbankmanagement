
<?php
          session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");
          // include("./database/databaseCon.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blood Stock</title>
    <link rel="stylesheet" type="text/css" href="css/SearchDonor.css">
  </head>

  <body>
    <div class="main">
      <ul>
        <li><a href="HospitalPage.php">Hospital Details</a></li>
        <li class="active"><a href="BloodStock.php">Blood Stock</a></li>
        <li><a href="HSDonor.php">Search Donor</a> 
        <li><a href="GiveBlood.php">Give Blood</a></li>
        <li><a href="HSDStatus.php">Search Donor Status</a> 
        <li ><a href="DCR.php">Donation Camp</a> 
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="ContactPage.html">Contact</a></li>
      </ul>
    </div>
    <br>

    <?php
      if(isset($_SESSION['adminid']))
      {
        $id = $_SESSION['id'];
    ?>
        <div class="container1">
          <?php
          $q=mysqli_query($con,"SELECT * FROM bloodstock WHERE h_id = $id");
          
          if(mysqli_num_rows($q) == 0)
          {
            ?>
              <br>
              <h2 style="color: #fff; padding-left: 100px">No Details Found! Try again later.</h2>
              <form method="POST">
                <input type="submit" value="Add Value" name="add">
              </form>
              <?php
                if(isset($_POST['add']))
                {
              ?>
                <div class="container">
                  <form method="POST"  action="UpdateBS.php"> 
                    <input type="text" name="op" placeholder="Quantity of O+ve"><br>
                    <input type="text" name="one" placeholder="Quantity of O-ve"><br>
                    <input type="text" name="ap" placeholder="Quantity of A+ve"><br>
                    <input type="text" name="an" placeholder="Quantity of A-ve"><br>
                    <input type="text" name="bp" placeholder="Quantity of B+ve"><br>
                    <input type="text" name="bn" placeholder="Quantity of B-ve"><br>
                    <input type="text" name="abp" placeholder="Quantity of AB+ve"><br>
                    <input type="text" name="abn" placeholder="Quantity of AB-ve"><br><br>
                    <input type="submit" name="addm" value="Submit">
                  </form>
                </div>

              <?php
                }
          }
        else
        {
            ?>
            <h2>BLOOD STOCK DETAILS</h2>
            <?php
            echo "<table>";
            echo"<tr>";
              //table header-----------------
            echo "<th>"; echo "O+ve";   echo "</th>";
            echo "<th>"; echo "O-ve";   echo "</th>";
            echo "<th>"; echo "A+ve";   echo "</th>";
            echo "<th>"; echo "A-ve";   echo "</th>";
            echo "<th>"; echo "B+ve";   echo "</th>";
            echo "<th>"; echo "B-ve";   echo "</th>";
            echo "<th>"; echo "AB+ve";   echo "</th>";
            echo "<th>"; echo "AB-ve";   echo "</th>";
                      
            echo "</tr>"; 

            while($row=mysqli_fetch_assoc($q))
            {
              echo "<tr>";
              echo "<td>";  echo $row['op'];  echo "</td>";
              echo "<td>";  echo $row['oneg'];  echo "</td>";
              echo "<td>";  echo $row['ap'];  echo "</td>";
              echo "<td>";  echo $row['an'];  echo "</td>";
              echo "<td>";  echo $row['bp'];  echo "</td>";
              echo "<td>";  echo $row['bn'];  echo "</td>";
              echo "<td>";  echo $row['abp'];  echo "</td>";
              echo "<td>";  echo $row['abn'];  echo "</td>";
              echo "</tr>";
            }
            echo"<table>";
          
      ?>
          <form method="POST">
            <input type="Submit"  name="sub" value="Edit">
          </form>
          </div>
          <?php
          if(isset($_POST['sub']))
          {
            ?>
          <div class="container">
            <form method="POST"  action="UpdateBS.php"> 
              <input type="text" name="op" placeholder="Quantity of O+ve"><br>
              <input type="text" name="one" placeholder="Quantity of O-ve"><br>
              <input type="text" name="ap" placeholder="Quantity of A+ve"><br>
              <input type="text" name="an" placeholder="Quantity of A-ve"><br>
              <input type="text" name="bp" placeholder="Quantity of B+ve"><br>
              <input type="text" name="bn" placeholder="Quantity of B-ve"><br>
              <input type="text" name="abp" placeholder="Quantity of AB+ve"><br>
              <input type="text" name="abn" placeholder="Quantity of AB-ve"><br><br>
              <input type="submit" name="subm" value="Submit">
            </form>
            <?php
            
              }

              }

          }
        
          ?>   
        </div>	
  </body>
</html>