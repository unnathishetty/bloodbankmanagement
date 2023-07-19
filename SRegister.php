<?php

$con=mysqli_connect("localhost","root","","blooddonation");
$id=rand(10000,99999);
$name=$_POST['nam'];
$uname=$_POST['un'];
$pass=$_POST['pas'];
$em=$_POST['email'];
$cty=$_POST['city'];
$g=$_POST['gender'];
$ag=$_POST['age'];
$conno=$_POST['cn'];


$sql="INSERT INTO seeker (se_id,se_name,se_city,se_age,se_gender,se_email,se_conno,se_username,se_password) VALUES('$id','$name','$cty','$ag','$g','$em','$conno','$uname','$pass')";
mysqli_query($con,$sql);
header('location:SeekerLogin.html');
?>