<?php
          session_start();
          $con= mysqli_connect("localhost","root","","blooddonation");

      if(isset($_SESSION['adminid']))
      {
          if(isset($_POST['sub']))
                        {
                          $sid=$_SESSION['id'];
                          $did=$_SESSION['did'];
                          $status="Pending..";
                          $sql="INSERT INTO `searchdonor`(s_id,d_id,status) VALUES('$sid','$did','$status')";
                             mysqli_query($con,$sql);
                           header('location: SeekerPage.php');
                          }
      }
?>