<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .trailer
    {
      width: 100%;
      height: 500px;
      
      outline-width: 50px;
      outline-color: #000000; 

    }
    *
    {
      margin: 0;
    }
    select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
       }
    .header
      {
       padding-top-bottom: 10px;
       text-align: left;
       background: #1abc9c;
       color: white;
       font-size: 30px;
       margin: 0;
      }
    
    label
    {
      display: inline block;
      background-color: #ffffff;
      padding: 5px;
      font-family: arial;
      font-size: 20px;
      cursor: pointer;
      color: #0066ff;
      border: 1px solid #ccc;
    }
    form
    {
      display: block;
      position: absolute;
     width: 70%;
     border: solid 2px blue;
     
     border-radius: 5px;
     height: 50px;
     padding: 20px;  
    }
    .date
    {
      position: absolute;
      left: 20%;
      
      height: 50px;
      width: 150px;
      
    }
    .time
    {
      position: absolute;
      left: 50%;
     
       height: 50px;
      width: 150px;
    }
   
    button
    {
      float: right;
      margin-right: 20px;
      height: 50px;
      width: 150px;
    }
form:hover
    {
      background-color: #66ffff;
    }
  </style>
</head>
<body>
  <?php
session_start();
      if (isset($_SESSION["username"])) {
    ?>
  <div class="header">
  <a href="movie.php" style="width: 25%;"><h1>BOOKING</h1>
  <p>Movie Ticket</p></a>
  <div style="right: 1%; margin: 0; position: absolute;  top: 10%;"><p>WELOCME<br>
  <?php echo $_SESSION["username"]; ?></p>
</div>
</div><?php require('db.php');
?>

  
              <iframe class="trailer" src="https://www.youtube.com/embed/KCSNFZKbhZE">watch trailer</iframe>
                <img src="avenger.jpg" style="width: 17%; height: 40%; float: left; position: absolute; top: 75%; left: 5%;">
             <h2 style="margin-left: 400px;">Avengers end game</h2>

               <form method="POST" style="margin-left: 40px; margin-top: 90px; " action="choose seat.php">
                <div style="font-weight: bold; width: 15px; height: 10px;">Theater A</div>
                <div style="">
                  <select name="date" class="date">
           <?php          
        $query = "SELECT * FROM date_day";
                $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
                
                while ($row = mysqli_fetch_array($record)) {
                  ?>
                  
                    <option value="<?php print $row['DateId'] ?>" class="option"><?php print $row['Date'] ?></option>
                  <?php
              }
             ?>
           </select>
             <select name="time" class="time">
           <?php          
        $query = "SELECT * FROM theater_a";
                $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
                
                while ($row2 = mysqli_fetch_array($record)) {
                  ?>
                  
                    <option value="<?php print $row2['TimingId'] ?>"><?php print $row2['Timing'] ?></option>
                  <?php
              }
             ?>
           </select>
               
           <input type="hidden" name="theaterId" value="1">
            <input type="hidden" name="filmId" value="1">
              </div>
         
            </div>
             
             <button type="submit" name="submit" id="submit" class="movie-button">Book Show</button>
                </div>
                
          </form>
          <?php 
        }
        else
          { 
        ?>
         <?php
        header( "location: login.php" );
      }
      mysqli_close($conn);
    ?>
   </body>           
</html>