<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Convert Booking to Renting</title>
</head>
<body>
  <section>
    <div class="form-value">
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
    </div>
  </section>

</body>
</html>

<?php
// Connect to the database
$db = pg_connect("host=localhost dbname=postgres user=postgres password=admin");

if (!$db) {
  die("Error in connecting to database.");
}

$result = pg_query($db, "SELECT * FROM hoteldb.booking");

// Check if the query was successful
if (!$result) {
  echo "Failed to retrieve bookings.";
  exit;
}

echo "<h1>List of All Bookings</h1>";
// Print out all the bookings
while ($row = pg_fetch_assoc($result)) {
  echo "Hotel: " . $row['hotel'] . "<br>";
  echo "Room: " . $row['room'] . "<br>";
  echo "BookingDate: " . $row['bookingdate'] . "<br>";
  echo "RentingDate: " . $row['rentingdate'] . "<br>";
  echo "DepartureDate: " . $row['departuredate'] . "<br>";
  echo "Status: " . $row['status'] . "<br>";
  echo "BookingID: " . $row['bookingid'] . "<br>";
  echo "Paid: " . $row['paid'] . "<br><br>";
}

// Define the variables
$room = intval($_POST['roomNumber']);
$rentingDate = $_POST['checkinDate'];
$bookingDate = date("Y-m-d");
$departureDate = $_POST['checkoutDate'];
$bookingID = intval($_POST['bookingID']);


if ($bookingID == 0) {

} else {
  $sql = "UPDATE hoteldb.booking SET rentingdate='$rentingDate', departuredate='$departureDate', status=true, paid=true, room='$room' WHERE bookingid='$bookingID'";

  $result = pg_query($db, $sql);

  if (!$result) {
    die("Error in updating the booking.");
  }
  echo "Booking updated to renting successfully.";
  header("refresh: 1");
}

// Close the database connection
pg_close($db);
?>

