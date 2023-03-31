<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Convert Booking to Renting</title>
</head>
<body>
<h1>Convert Booking to Renting</h1>
<form method="post">
  <label for="bookingID">Booking ID:</label>
  <input type="text" id="bookingID" name="bookingID"><br><br>
  <label for="checkinDate">Check-in Date:</label>
  <input type="date" id="checkinDate" name="checkinDate"><br><br>
  <label for="checkoutDate">Check-out Date:</label>
  <input type="date" id="checkoutDate" name="checkoutDate"><br><br>
  <label for="rentingPrice">Renting Price:</label>
  <input type="text" id="rentingPrice" name="rentingPrice"><br><br>
  <label for="roomNumber">Room Number:</label>
  <input type="text" id="roomNumber" name="roomNumber"><br><br>
  <input type="submit" value="Convert Booking to Renting">
</form>
</body>
</html>

<?php
// Connect to the database
$db = pg_connect("host=localhost dbname=postgres user=postgres password=admin");

if (!$db) {
  die("Error in connecting to database.");
}

// Define the variables
$hotel = $_POST['hotel'];
$room = intval($_POST['roomNumber']);
$bookingDate = $_POST['checkinDate'];
$rentingDate = date("Y-m-d");
$departureDate = $_POST['checkoutDate'];
$status = true;
$bookingID = intval($_POST['bookingID']);
$paid = true;

if ($bookingID == 0) {

} else {
  $sql = "UPDATE hoteldb.booking SET RentingDate='$rentingDate', DepartureDate='$departureDate', Status=$status, Paid=$paid WHERE BookingID=$bookingID";

  $result = pg_query($db, $sql);

  if (!$result) {
    die("Error in updating the booking.");
  }

  echo "Booking updated to renting successfully.";


}



// Update the booking to renting

// Close the database connection
pg_close($db);
?>

