   <?php

$con= mysqli_connect("localhost","root","","blooddonation");
 session_start();


$adminid = $_POST['log'];
$adminid = mysqli_real_escape_string($con, $adminid);
$password = $_POST['pass'];
$password = mysqli_real_escape_string($con, $password);

// Query checks if the email and password are present in the database. 
$query = "SELECT * FROM donor WHERE d_username='" . $adminid . "' and d_password='".$password."'";

$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct id and Password</span>";
  header('location: al.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['adminid'] = $row['d_username'];
  $_SESSION['id']=$row['d_id'];
  $_SESSION['Name'] = $row['d_name'];
  header('location: DonorPage.php');
}

?>