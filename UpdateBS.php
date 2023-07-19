<?php
 session_start();
  $con= mysqli_connect("localhost","root","","blooddonation");

           $id=$_SESSION['id'];
           $op=$_POST['op'];
           $ong=$_POST['one'];
           $ap=$_POST['ap'];
           $an=$_POST['an'];
           $bp=$_POST['bp'];
           $bn=$_POST['bn'];
           $abp=$_POST['abp'];
           $abn=$_POST['abn'];
  if(isset($_SESSION['adminid']))
        {

            if(isset($_POST['subm']))
            {
              $sql="UPDATE `bloodstock` SET op='$op',oneg='$ong',ap='$ap',an='$an',bp='$bp',bn='$bn',abp='$abp',abn='$abn' WHERE h_id = '$id'";
       
             mysqli_query($con,$sql);
             header('location:BloodStock.php');
            
            }
            elseif(isset($_POST['addm'])){
              $sql="INSERT INTO `bloodstock`(h_id,op,oneg,ap,an,bp,bn,abp,abn) VALUES ('$id','$op','$ong','$ap','$an','$bp','$bn','$abp','$abn')";
       
             mysqli_query($con,$sql);
             header('location:BloodStock.php');
            }
        }
      ?>