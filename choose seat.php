<html>

	<head>
		<style type="text/css">
			*
      {
        margin: 0;
        padding: 0;
      }
      .ticketing-col {
  border: 1px solid #000;
  
  background: #a7ef8a;
  flex-basis: 0;

  display: inline-block;
   }
   .reserved {
  background: #ff00;
  color: #000;
  width: 50px;
   }
   .screen {
  text-align: center;
  padding: 0.5rem 0;
  background: #999999;
}
.clearfix
{
  border: 2px solid #1ad1ff;
  margin: 100px; 
  padding: 0;
}
.ticketing-row {
  font-size: 15px;
  display: flex;

  width: 100%;
  max-width: 500px;
}
.label
{
  font-size: 15px;
  display: inline-block;
  height: 100px;
  width: 100px;
  border: 1px solid #000;
  background: #a7ef8a;
  padding: 1px;
  margin: 1px;
  cursor: pointer;
  display: inline-block;
}
.select
{
  background-color: #4caf50;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
.select:hover
{
  background-color: #009933;
  color: white;
  
}
.ticketing-col {
  border: 1px solid #000;
  
  background: #a7ef8a;
  margin: 20px;
  cursor: pointer;
}
input[type="checkbox"]:checked + label {
    background-color: #ff0000;
}


.label:hover
{
  background-color: #4dca1c;
}
input[type=checkbox]
{
  visibility: hidden;
}

.ticketing-col input {
  display: inline-block;
}
.cancel
{
  background-color: #ff0000;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
.cancel:hover
{
  background-color: #cc0000;
  color: white;
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
		</style>
	</head>
<?php
include ('db.php');
?>
<body>
  <?php
  session_start();
if(isset($_SESSION["username"])) 
  { 
?>
  <div class="header">
  <a href="movie.php" style="text-decoration: none;"><h1>BOOKING</h1>
  <p>Movie Ticket</p></a>
  <div style="right: 1%; margin: 0; position: absolute;  top: 5%;"><p>WELOCME<br>
  <?php echo $_SESSION["username"]; ?></p>
</div>
</div>

<?php }
?>
<div style="border-style: solid; border-color: #000000; border-radius: 4px; border-width: 4px; padding-left: 50px; padding-top: 20px; padding-bottom: 20px; margin-right: 100px; ">
	<section>
    <?php

          $query = "SELECT * FROM film WHERE FilmId = ". $_POST['filmId'];
          $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
          $filmInfo = mysqli_fetch_array($record);
          mysqli_free_result($record);
          
        ?>
        <?php

          $query = "SELECT * FROM theater WHERE Theater_id = ". $_POST['theaterId'];
          $record = mysqli_query($conn, $query) or die("Query error!".mysqli_error($conn));
          $theaterInfo = mysqli_fetch_array($record);
          mysqli_free_result($record);

          $query = "SELECT * FROM " . $theaterInfo['theater_name'] . " WHERE TimingId = " . $_POST['time'];
            $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
            $timeInfo = mysqli_fetch_array($record);
            mysqli_free_result($record);

            $query = "SELECT * FROM date_day WHERE DateId = " . $_POST['date'] ;
            $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
            $dateInfo = mysqli_fetch_array($record);
            mysqli_free_result($record);
        ?>
        <p><b>Film</b>: <?php print $filmInfo['FilmName']; ?></p>
        <b>category:-</b><?php echo $filmInfo['Category'];?>
        <p><b>Show Time</b>: <?php print $timeInfo['Timing'];?></p>
        <b>show date:-</b><?php echo $dateInfo['Date']; ?>
        <b>theater:</b><?php echo $theaterInfo['theater_name'];?></p>
      </section>
      </div>

      <section class="clearfix">
        <form method="POST" action="ticket_sample.php" onsubmit="return check();">
          <?php
            $query = "SELECT * FROM theater WHERE Theater_id = " . $_POST['theaterId'];
            $record = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
            $theaterInfo = mysqli_fetch_array($record);
            mysqli_free_result($record);

            $query = "SELECT * FROM ticket_record WHERE theaterId = " . $_POST['theaterId'] . " AND TimingId = " . $_POST['time'] . " AND DateId = " . $_POST['date'];
            $record1 = mysqli_query($conn, $query) or die("Query Error!".mysqli_error($conn));
            $seatsOccupied;
            $numberOfSeatsOccupied = 0;
            while ($row = mysqli_fetch_array($record1)) {
              $seatsOccupied[$numberOfSeatsOccupied][0] = $row['SeatRow'];
              $seatsOccupied[$numberOfSeatsOccupied][1] = $row['SeatCol'];
              $numberOfSeatsOccupied++;
            }
            mysqli_free_result($record1);
          ?>
          <?php
            while ($theaterInfo['SeatRow']) {
              $seatrowName = chr(65 + $theaterInfo['SeatRow'] - 1);
          ?>
              <div class="ticketing-row">

              <?php
              for ($i = 1; $i <= $theaterInfo['SeatCol']; $i++) {
                $isReserved = 0;

                for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                  if ($seatsOccupied[$it][0] == $theaterInfo['SeatRow'] && $seatsOccupied[$it][1] == $i)
                    $isReserved = 1;
                }


                if ($isReserved) {
                  echo "<div class='ticketing-col reserved'>";
                  print "Sold" . $seatrowName . $i;
                }
                else {
                  echo "<div class='ticketing-col'>";
                  print "<input type='checkbox' class='checkbox' name='seat[]' id='" . $seatrowName . $i . "' value='" . $theaterInfo['SeatRow'] . "|" . $i . "'>";
                  print "<label for='" . $seatrowName . $i . "' class='label'>" . $seatrowName . $i . "</label>";
                }
                echo "</div>";
              }
              $theaterInfo['SeatRow']--;
              echo "</div>"; // Ticketing-row end
            }
          ?>
          
            <div class="screen">
              Screen
            </div>
          </div>
          <button type="submit" name="submit" id="submit" class="select">Select Seat(s)</button>
          <a href="movie.php">
            <button type="button" name="cancel" class="cancel">Cancel</button>
          </a>
          <?php 
          $film = $filmInfo['FilmName'];
          $category = $filmInfo['Category'];
          $date = $dateInfo['Date']; 
          $time = $timeInfo['Timing']; ?>

          <input type="hidden" name="film" value="<?php echo $film ?>">
          <input type="hidden" name="category" value="<?php echo $category ?>">
          <input type="hidden" name="date" value="<?php echo $date ?>">
          <input type="hidden" name="time" value="<?php echo $time ?>">
          <input type="hidden" name="theater" value="<?php echo $theaterInfo['theater_name'];?>">
          <input type="hidden" name="theaterid" value="<?php echo $_POST['theaterId'];?>">
          <input type="hidden" name="dateid" value="<?php echo $_POST['date'] ?>">
          <input type="hidden" name="timeid" value="<?php echo $_POST['time'] ?>">
        </form>
      </section>

 <script type="text/javascript">
      function check() {
        var flag = -1;
        var listOfCheckboxes = document.getElementsByClassName('checkbox');
        for (var i = 0; i < listOfCheckboxes.length; i++) {
          if (listOfCheckboxes[i].checked)
            flag = 1;
        }
        if (flag == -1) {
          alert("Please choose at least one seat.");
          return false;
        }
      }
</script>


</body>
</html>