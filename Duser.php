<?php

$con=mysqli_connect("localhost","root","","blooddonation");
$id=rand(10000,99999);
$name=$_POST['nam'];
$uname=$_POST['un'];
$pass=$_POST['pas'];
$em=$_POST['email'];
$cty=$_POST['city'];
$blood=$_POST['bt'];
$ag=$_POST['age'];
$g=$_POST['gender'];
$conno=$_POST['cn'];
$ad=$_POST['add'];

$sql="INSERT INTO donor (d_id,d_name,d_username,d_password,d_city,d_bloodgroup,d_conno,d_address,d_age,d_gender,d_email) VALUES('$id','$name','$uname','$pass','$cty','$blood',
'$conno','$ad','$ag','$g','$em')";
mysqli_query($con,$sql);
header('location:DonorLogin.html');
?>