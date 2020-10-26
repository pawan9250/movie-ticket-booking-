<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		.ticket
		{
           border-style: solid;
           border-width: 10px;
           border-color: #600080;
           padding-left: 10px;
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
      }
      *{
        margin: 0;
      }
	</style>
</head>
<body>
  <?php
          session_start();
          if($_SESSION["username"]) {
         ?>
  <div class="header">
  <h1>BOOKING</h1>
  <p>Movie Ticket</p>
  <div style="float: left; height: 10px; width: 10px;"><h5>WELOCME</h5><br>
  <?php echo $_SESSION["username"]; ?>
</div>
</div>
  <?php
  include('db.php');
  ?>
    <div class="container">
      
       <?php
        $query = "SELECT * FROM theater WHERE Theater_id = " . $_POST['theaterid'];
        $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
        $theaterInfo = mysqli_fetch_array($record);
        mysqli_free_result($record);
      ?>
     
       <div class="container">

        
    <div style="border: solid 2px #000000;">
        <p><b>Theater</b>: <?php echo $_POST['theater']?></p>
        
        <p><b>Film</b>: <?php print $_POST['film'] ?></p>
        <p><b>Category</b>: <?php print $_POST['category'] ?></p>
        <p><b>Show Time</b>: <?php echo $_POST['time']; ?></p>
        <?php $time = $_POST['time']; ?>
                          Date:-   <?php echo $_POST['date']; ?>
                          <?php $date = $_POST['date'];?>
        <?php $theaterId = $theaterInfo['Theater_id'];?>
         <?php
          
       $DateId = $_POST['dateid'];
       $TimingId = $_POST['timeid'];
       $userid = $_SESSION['username'];
       ?> 
       <?php
            for ($i = 0; $i < sizeof($_POST['seat']); $i++) 
            {
              list($row,$col) = explode('|', $_POST['seat'][$i]);
              $seatrowName = chr(65 + $row - 1);   
          ?>
      <p><b>SeatNo</b>: <?php print $seatrowName . $col ?></p>
        <?php
          
          $query = "INSERT INTO ticket_record(SeatRow, SeatCol, theaterId, userid, timing, dates, DateId, TimingId) VALUES ('$row', '$col', '$theaterId', '$userid', '$time', '$date', '$DateId', '$TimingId')";
          mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
         
         ?>
         <?php 
       }
       ?></div>
        </div>
          </div>
     
      <section style="padding: 1rem 3rem;">
        <h3>Total Fee: Rs. <?php print $_POST['ticketfee']; ?></h3>
       
        <a href="movie.php">
          <button type="button" name="okay" class="ok">Okay!</button>
        </a>
      </section>
    </main>
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