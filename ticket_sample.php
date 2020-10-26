<html>
<head>
	<title></title>
	<style type="text/css">
		.ticket_checkout
		{
			border-style: solid;
			border-width: 10px;
			border-color: #db4dff;
			border-radius: 5px;
			width: 50%;
			padding-left: 10px;
      margin-left: 242px;
      height: 180px;

		}
		.amount
		{
			
			font-family: arial;
			width: 250px;
			height: 20px;
		}
		.select-selected
		{
			background-color: #0066ff;
		}
        .amount 
        {
        	border: solid 2px;
         background-color: #0000ff;
          width: 50px;
        	background-color: #1a75ff;
        	height: 10px;
        	color: #ffffff;
        }
        .header
        {
        	background-color: #660066;
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
      button
      {
        background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-size: 20px;
            border-radius: 2px; 
      }
      form
      {
            height: 100px;
            width: 750px;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-top: 20px;
            margin-left: 0;
      }

	</style>
</head>
<body><?php
session_start();
      if (isset($_SESSION["username"])) {
    ?>
  <div class="header">
 <a href="movie.php" style="width: 25%;"><h1>BOOKING</h1>
  <p>Movie Ticket</p></a>
  <div style="right: 1%; margin: 0; position: absolute;  top: 5%;"><p>WELOCME<br>
  <?php echo $_SESSION["username"]; ?></p>
  
  <?php echo $_SESSION["id"]; ?>
</div>
</div>
<?php
include('db.php');
?>

<section class="ticket_checkout">
  
        
        

        <p><b>Film</b>: <?php echo $_POST['film']; ?></p>
        <p><b>Category</b>: <?php print $_POST['category']; ?></p>
        <p><b>Show date</b>: <?php echo $_POST['date']; ?></p>
        
        show timing:-<?php echo $_POST['time']; ?>
        theater:-<?php echo $_POST['theater']; ?>
      
        
      
        <form method="post" action="payment here.php">
          <?php
            for ($i = 0; $i < sizeof($_POST['seat']); $i++) 
            {
              list($row,$col) = explode('|', $_POST['seat'][$i]);
              $seatrowName = chr(65 + $row - 1);
             echo  $seatrowName . $col ;

          ?></section>
          
            <input type="hidden" name="seat[]" value="<?php echo $_POST['seat'][$i] ?>">
        
          <?php
                $checkedseat = $_POST['seat'];
                $count = count($checkedseat);
           ?> <?php
         }
          ?>
          
          <div style="width: 700px; height: 50px; border: 1px solid #000000; margin-left: 200px; position: absolute; top: 60%; left: 10%;"><button type="submit" name="submit" id="submit" style="margin-right: 3px; float: left; width: 300px;" >Confirm payment</button>
          <a href="movie.php">
            <button type="button" name="cancel" style="float: right; width: 300px;">Cancel</button>
          </a></div>
          
          <?php
            $date = $_POST['date'];
             
            
          ?>
          <input type="hidden" name="film" value="<?php echo $_POST['film']; ?>">
          <input type="hidden" name="category" value="<?php print $_POST['category']; ?>">
          <input type="hidden" name="date" value="<?php echo $date ?>">
          <input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">
          <input type="hidden" name="theaterid" value="<?php echo $_POST['theaterid']; ?>">
          <input type="hidden" name="theater" value="<?php echo $_POST['theater']; ?>"> 
          <input type="hidden" name="seatcount" value="<?php echo $count ?>">
          <input type="hidden" name="dateid" value="<?php echo $_POST['dateid'] ?>">
          <input type="hidden" name="timeid" value="<?php echo $_POST['timeid'] ?>">

        </form>
      
    <?php }
    else
      {
        ?>
        <?php
      }
      ?>


</body>
</html>