<?php
  session_start();
  if(isset($_SESSION['adminid']))
  {
  	unset($_SESSION['adminid']);
  	unset($_SESSION['id']);
  	unset($_SESSION['Name']);

  }
  session_destroy();
  header("location:index.html");
?>