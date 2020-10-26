
<!DOCTYPE html>
<html>
<head>
  <title>Login here</title>
 <style type="text/css">
   .header
      {
       padding-top-bottom: 10px;
       text-align: left;
       background: #1abc9c;
       color: white;
       font-size: 30px;
       margin: 0;
      }
   input[type=text], input[type=password] {
             width: 100%;
             padding: 15px;
             margin: 5px 10px 22px 10px;
             display: inline-block;
            border: none;
            background: #f1f1f1;
           }
           input[type=text]:focus, input[type=password]:focus 
           {
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
           }
           .form
           {
            display: block;
            margin-left: 100px;
            margin-right: 100px;
            border-color: #8c8c8c;
            border-style: solid; 
            padding: 20px;

           }
           form:hover
    {
      background-color: #66ffff;
    }
           .head
           {
            background-color: #33ccff;
            padding: 10px;
            text-align: center;
            width: 25%;
            margin-left: 300px;
           }
           form
           {
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 150px; 
            margin-right: 150px;
            border-color: 2px solid #8c8c8c;
           }
           button[type=submit]
           {
             background-color: #4CAF50;
                        color: white;
                      padding: 14px 20px;
                     margin: 8px 0;
                      cursor: pointer;
                     width: 25%;
                     opacity: 0.9;
                     font-size: 20px;
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
</div><?php
}
?>
</div>
  <?php

  require('db.php');
  
  ?>
  <div class="head">
  	<h2>login</h2>
  </div>
  
  <form method="post" action="loginverify.php">
    
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
  
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    
    <div class="input-group">
      <button type="submit" class="btn" name="login">login</button>
    </div>
    
  </form>
  


</body>
</html>