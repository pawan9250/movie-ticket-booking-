<html>
<head>
    <style type="text/css">
        input[type=text], input[type=password] {
             width: 100%;
             padding: 15px;
             margin: 5px 0 22px 0;
             display: inline-block;
            border: 2px solid #00ffff;
            background: #f1f1f1;
            border-radius: 2px;
           }
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            border-style: solid;
            border-color: #00ffff;

           }
           input[type=submit]
           {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 25%;
            opacity: 0.9;
            font-size: 20px;
            border-radius: 2px;
           }
           .form
           {
            display: block;
            margin-left: 100px;
            margin-right: 100px;
            border-color: #8c8c8c;
            border-style: solid; 
            padding: 20px;
            border-radius: 2px;

           }
           .header
             {
            padding-top-bottom: 10px;
            text-align: left;
            background: #1abc9c;
            color: white;
            font-size: 30px;
            margin: 0;
            border-radius: 2px;
           }
    </style>
</head>
<body>
    
  
  <div class="header">
  <a href="movie.php" style="text-decoration: none;"><h1>BOOKING</h1>
  <p>Movie Ticket</p></a><?php
     session_start();     
      if (isset($_SESSION["username"])) {
    ?>
  <div style="right: 1%; margin: 0; position: absolute;  top: 5%;"><p>WELOCME<br>
  <?php echo $_SESSION["username"]; ?></p>
  <?php
}
?>
</div>
</div>
<?php

require('db.php');
?>
<div class="form">
<form action="" method="POST">

<h2 style="text-align: center;">Signup here</h2>
<b>NAME:</b><input type="text" name="name"><br><br>
<b>User Name:</b><input type="text" name="username"><br><br>
<b>Create password:</b><input type="password" name="password"><br><br>

<input type="submit" name="register" value="Signup">
</form>
</div>

<?php

if(isset($_POST['register']))
{


    $username= $_POST['username'];
    $password= $_POST['password'];
   
    $name= $_POST['name'];
   

   if(!$username || !$password || !$name)
    {
        echo "One of the fields are empty";
        }
        else
        {
    $sql="INSERT INTO Userlogin(Name, UserId, Password) VALUES('$name','$username','$password')";
if(mysqli_query($conn, $sql))
{
   header("location: login.php");
}
else{
    echo "data insert error";
}
}
}   
    ?>

</body>
</html>