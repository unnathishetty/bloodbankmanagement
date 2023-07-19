<?php

$con=mysqli_connect("localhost","root","","blooddonation");

$id=rand(1000,9999);
$hd=$_POST['hid'];
$rname=$_POST['nam'];
$blood=$_POST['bt'];
$da=$_POST['dat'];
$cty=$_POST['city'];
$conno=$_POST['cn'];
$ad=$_POST['add'];

$sql="INSERT INTO reqblood (r_id,h_id,r_pname,r_bloodgroup,r_address,r_city,r_date,r_conno,r_status) VALUES('$id','$hd','$rname','$blood','$ad','$cty','$da','$conno','p')";
mysqli_query($con,$sql);
header('location:SeekerLogin.html');
?>