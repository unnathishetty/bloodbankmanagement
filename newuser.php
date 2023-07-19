<?php

$con=mysqli_connect("localhost","root","","blooddonation");
$id=$_POST['hid'];
$hname=$_POST['hn'];
$uname=$_POST['un'];
$pass=$_POST['pas'];
$em=$_POST['email'];
$cty=$_POST['city'];
$conno=$_POST['cn'];
$ad=$_POST['add'];

$sql="INSERT INTO hospital (h_id,h_name,h_username,h_password,h_email,h_city,h_address,h_contactno) VALUES('$id','$hname','$uname','$pass','$em','$cty','$ad','$conno')";
mysqli_query($con,$sql);
header('location:HospitalLogin.html');
?>