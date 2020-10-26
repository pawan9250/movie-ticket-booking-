<!DOCTYPE html>
<html>
<head>
	<title>Payment Here | Movie Ticket</title>
</head>
<body>
        <style>
* {padding: 0;
  
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}


}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}
.header
      {
       
       text-align: left;
       background: #1abc9c;
       color: #ffffff;
       font-size: 30px;
       
      }
      .user:hover
      {

      }
</style>
</head>
<body><?php 
session_start();
if(isset($_SESSION["username"]))
{
  ?>
  
  <div class="header">
  <a href="movie.php" style="width: 25%;"><h1 >BOOKING</h1>
  <p>Movie Ticket</p></a>
  <div class="user" style="right: 1%; margin: 0; position: absolute;  top: 10%;"><p>WELOCME<br>
  <?php echo $_SESSION["username"]; ?></p>
</div>
</div>



          <div class="col-50">
            
            <form action="confirm.php" method="POST">
              <?php
            for ($i = 0; $i < sizeof($_POST['seat']); $i++) 
            {
              list($row,$col) = explode('|', $_POST['seat'][$i]);
              $seatrowName = chr(65 + $row - 1);
              echo $seatrowName . $col;

          ?>
            <input type="hidden" name="seat[]" value="<?php print $_POST['seat'][$i] ?>">
           <?php
         }
         ?>
          <h3>Payment</h3>
          <h6>Costumer name:-<?php echo $_SESSION['username']; ?></h6>
            
            <?php $numberofseat = $_POST['seatcount'];?>
        <p><b>Ticket Fee</b>:<?php $ticketFee = 50 * $numberofseat ?> </p>
             <?php echo $ticketFee ?>
             <h1>Credit Card/ Debit Card</h1>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="mm">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="yyyy" style="margin-left: 10px;">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="xxx" style="margin-left: 10px;">
              </div>
            </div>
          </div>
          
        
        <div>
          <input type="hidden" name="film" value="<?php echo $_POST['film']; ?>">
          <input type="hidden" name="category" value="<?php print $_POST['category']; ?>">
          <input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
          <input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">
          <input type="hidden" name="theater" value="<?php echo $_POST['theater'] ?>">           
          <input type="hidden" name="ticketfee" value="<?php echo $ticketFee ?>">
          <input type="hidden" name="theaterid" value="<?php echo $_POST['theaterid']; ?>">
          <input type="hidden" name="dateid" value="<?php echo $_POST['dateid']; ?>">
          <input type="hidden" name="timeid" value="<?php echo $_POST['timeid']; ?>">
        </div>
        <input type="submit" value="PAY" class="btn" name="submit">
      </form>
    
  
  <div class="col-25">
   
  </div>
</div>
<?php
   }
   else
   {
   ?>
   <?php header("location:login.php");
 } 
 ?>
</body>
</html>