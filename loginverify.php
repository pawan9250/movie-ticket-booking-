<?php
session_start();
$massage = "invalid information";
if(count($_POST)>0) {
 $con = mysqli_connect('localhost','root','','movie ticket') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM Userlogin WHERE UserId ='" . $_POST["username"] . "' and Password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['UserId'];
$_SESSION["username"] = $row['Name'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:movie.php");
}
?>