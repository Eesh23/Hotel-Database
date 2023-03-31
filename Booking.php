<!DOCTYPE html>
<html>
<head>
	<title>Create Booking</title>
</head>
<body>
	<h1>Create Booking</h1>
	<form action="" method="POST">
		<label for="hotel">Hotel:</label>
		<input type="text" id="hotel" name="hotel"><br>

		<label for="room">Room Number:</label>
		<input type="number" id="room" name="room"><br>

		<label for="booking_date">Checkin Date:</label>
		<input type="date" id="booking_date" name="booking_date"><br>

		<label for="departure_date">Departure Date:</label>
		<input type="date" id="departure_date" name="departure_date"><br>



		<input type="submit" value="Create Booking">
	</form>
</body>
</html>

<?php
// Set up database connection
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=admin")
or die("Could not connect: " . pg_last_error());

// Get form data
$hotel = $_POST["hotel"];
$room = intval($_POST["room"]);
$booking_date = $_POST["booking_date"];
$renting_date = date("Y-m-d");
$departure_date = $_POST["departure_date"];
$status = false;
$paid = false;
$booking_id = rand(0,1000);

if ($hotel == "") {

} else {

	// Insert data into database
		$query = "INSERT INTO hoteldb.booking (Hotel, Room, BookingDate, RentingDate, DepartureDate, Status, bookingid, Paid ) VALUES ('$hotel','$room','$booking_date', '$renting_date', '$departure_date', false, '$booking_id', false)";
		$result = pg_query($dbconn, $query) or die("Query failed: " . pg_last_error());

	// Get the generated BookingID
		$booking_id = pg_fetch_result($result, 0);

	// Close database connection
		pg_close($dbconn);


}

?>


