<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Convert Booking to Renting</title>
</head>
<body>
  <section>
    <div class="form-value">
        <h1>Add a New Room</h1>
        <form action="addroom" method="post">
            <label for="hotel">Hotel Name:</label>
            <input type="text" id="hotel" name="hotel" value="BlueTree"><br><br>
            <label for="room">Room Number:</label>
            <input type="number" id="room" name="room" value="619"><br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="175"><br><br>
            <label for="amenities">Amenities:</label>
            <input type="text" id="amenities" name="amenities" value="Double Suite"><br><br>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" value="2"><br><br>
            <label for="view">View Type:</label>
            <input type="text" id="view" name="view" value="Ocean View"><br><br>
            <label for="extend">Can Be Extended:</label>
            <select id="extend" name="extend">
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select><br><br>
            <label for="problems">Problems:</label>
            <input type="text" id="problems" name="problems" value="Broken Bed"><br><br>
            <input type="submit" value="Add Room">
        </form>
    </div>
  </section>

</body>
</html>

<?php

$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=admin");

$hotel = $_POST['hotel'];
$room = $_POST['room'];
$price = $_POST['price'];
$amenities = $_POST['amenities'];
$capacity = $_POST['capacity'];
$view = $_POST['view'];
$extend = $_POST['extend'];
$problems = $_POST['problems'];


  if ($hotel == "") {

  } else {
      $query = "INSERT INTO hoteldb.rooms (price, amenities, capacity, viewtype, canbeextended, problems,hotel,room) VALUES 
                  ('$price','$amenities','$capacity','$view','$extend','$problems','$hotel','$room')";
      $result = pg_query($db_connection,$query);


      if ($result) {
        echo "POST data is successfully logged\n";
      } else {
        echo "User must have sent wrong inputs\n";
      }
  }

?>