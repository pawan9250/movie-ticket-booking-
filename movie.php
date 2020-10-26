<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 1";
  $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 2";
  $record2 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 3";
  $record3 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 4";
  $record4 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 5";
  $record5 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 6";
  $record6 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 7";
  $record7 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<?php
  
  require('db.php');
  $query = "SELECT * FROM film WHERE FilmId = 8";
  $record8 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BOOKING | Movie Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <style type="text/css">
     *
      {
        margin: 0;
        }
        main
      {
        box-sizing: border-box;
      } 
      .footer
      {
        width: 1350px;
        height: 150px;
        background-color: #cccccc;
      }
      .column
      {
        
        width: 80%;
        padding: 40px 1px;
        margin: 20px;
      }
      .row 
      {
        margin: 5px;
      }
      .movie
      {
        
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
        width: 40%;
      }
      .header
      {
        padding-top-bottom: 10px;
       text-align: left;
       background: #1abc9c;
       color: white;
       font-size: 30px;
       margin: 0;
       font-style: Bookman;
       
      }
      .row1
      {
        box-sizing: border-box;
        display: flex;

      }
      .column1
      {
        margin: 0;
        padding: 0;
        height: 300px;
        width: 750px;
      }
      .bar
      {
        background-color: #1aff1a;
        text-align: center; 
      }
      .signup:hover
      {
        background-color: #00ff00;
      }
      .login:hover
      {
        background-color: #0000e6;
      }
      button
      {
        font-size: 20px;
      }
    </style>
  </head>
  <body><?php error_reporting(0);
  session_start(); 
  
?>
    
    <div class="header">
  <h1>BOOKING.COM</h1>
  <p>Movie Ticket</p></div>



<div class="row1">
<div class="column1" style="background-color: #00bfff; float: left;">
  <a href="signupform.php"><button class="signup" style="background-color: #40ff00; position: absolute; top: 40%; left: 10%; width:300px; height: 60px; cursor: pointer;">New User</button></a>
  </div>    
<div class="column1" style="background-color: #00ff40; float: right;"><br><a href="login.php"><button class="login" style="background-color: #1a8cff; cursor: pointer; width: 300px; height: 60px; position: absolute; top: 40% ; right: 20%;">Alredy User</button></a>
<?php if($_SESSION["username"])
{
  ?>
<div style="float: right; width: 200px; height: 60px; margin: auto;"><p style="float: right; color: #000000; float: right; ">Welcome:-<?php echo $_SESSION["username"]; ?> </p><img src="user.jpg" style="width:100px; height: 200px;" ><p style="float: right;"><a href="logout.php" tite="Logout">Logout.</a></p></div><?php
}
?></h3></div><br>
   </div>  
</div>
    
    <main class="row">
      <div class="bar">
        <h1>Movies</h1>
        
      </div>
      <div class="column">
      <?php
        while ($row = mysqli_fetch_array($record)) {
      ?>
        <div class="movie">
          <h1><?php print $row['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row['Language'] ?></h4>
         <a href="Avengers end game.php"><img src="avenger.jpg"></a>
        </div>

        <?php
        }
      ?>
      </div>
      <div class="column">
      <?php
        while ($row2 = mysqli_fetch_array($record2)) {
      ?>
        <div class="movie">
          <h1><?php print $row2['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row2['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row2['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row2['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row2['Language'] ?></h4>
         <a href="pikachu.php"><img src="pikachu.jpg" style="width: 200px; height: 300px;"></a>
        </div>
 <?php
        }
      ?>
       </div>
       <div class="column">
        <?php
        while ($row3 = mysqli_fetch_array($record3)) {
      ?>
        <div class="movie">
          <h1><?php print $row3['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row3['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row3['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row3['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row3['Language'] ?></h4>
         <a href="darkphoenix.php"><img src="darkponix.jpg" style="width: 200px; height: 300px;"></a>
        </div>
         <?php
        }
      ?>
      <div class="column">
        <?php
        while ($row4 = mysqli_fetch_array($record4)) {
      ?>
        <div class="movie">
          <h1><?php print $row4['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row4['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row4['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row4['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row4['Language'] ?></h4>
         <a href="bharat.php"><img src="bharat.jpg" style="width: 300px; height: 300px;">
        </div></a>
 <?php
        }
      ?>
   </div>
   <div class="column">
        <?php
        while ($row5 = mysqli_fetch_array($record5)) {
      ?>
        <div class="movie">
          <h1><?php print $row5['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row5['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row5['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row5['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row5['Language'] ?></h4>
         <a href="godzilla.php"><img src="godzilla.jpg" style="width: 200px; height: 300px;"></a>
        </div>
 <?php
        }
      ?>
 </div>
 <div class="column">
        <?php
        while ($row6 = mysqli_fetch_array($record6)) {
      ?>
        <div class="movie">
          <h1><?php print $row6['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row6['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row6['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row6['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row6['Language'] ?></h4>
         <a href="Alladin.php"><img src="alladin.jpg" style="width: 200px; height: 300px;"></a>
        </div>
 <?php
        }
      ?>
</div>
<div class="column">
        <?php
        while ($row7 = mysqli_fetch_array($record7)) {
      ?>
        <div class="movie">
          <h1><?php print $row7['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row7['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row7['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row7['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row7['Language'] ?></h4>
         <a href="spiderman.php"><img src="spiderman.jpeg" style="width: 200px; height: 300px;"></a>
        </div>
 <?php
        }
      ?>
        </div>
        <div class="column">
        <?php
        while ($row8 = mysqli_fetch_array($record8)) {
      ?>
        <div class="movie">
          <h1><?php print $row8['FilmName'] ?></h1>
          <h4><b>Director</b>: <?php print $row8['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row8['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row8['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row8['Language'] ?></h4>
         <a href="MIB (2)"><img src="mib.jpg"></a>
        </div>
         <?php
        }
      ?>
      </div>
    </main>
 <div class="footer">
   
 </div>
  </body>
</html>
