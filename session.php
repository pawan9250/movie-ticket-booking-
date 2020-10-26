<?php
  include('db.php');

  session_start();

  $user_check = $_SESSION['login_user'];

  $query = "SELECT * FROM userlogin WHERE UserId = '$user_check'";
 $result = mysqli_query($conn, $query) or die("query error" . mysqli_error($conn));
 $row = mysqli_fetch_array($result);

 $user_detail = $row['Name'];

 if(!isset($login_session))
 {
 
 	header('location: movie.php');

 }
 ?>