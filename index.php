<!DOCTYPE html>
<html>
<head>
    <title>Add New Hotel</title>
</head>
<body>
<h1>Add New Hotel</h1>
<form action="index.php" method="post">
    <label for="hotelName">Hotel Name:</label>
    <input type="text" id="hotelName" name="hotelName" value="BlueTree" required><br>

    <label for="centralOffice">Central Office:</label>
    <input type="text" id="centralOffice" name="centralOffice" value="353 Central Ave" required><br>

    <label for="numOfHotels">Number of Hotels:</label>
    <input type="number" id="numOfHotels" name="numOfHotels" value="5" required><br>

    <label for="phoneNumber">Phone Number:</label>
    <input type="tel" id="phoneNumber" name="phoneNumber" value="3435756203" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="bluetree@corporate.com"required><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php

    $db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=admin");

    $hotelName = $_POST['hotelName'];
    $centralOffice = $_POST['centralOffice'];
    $numHotels = intval($_POST['numOfHotels']);
    $phoneNumber = intval($_POST['phoneNumber']);
    $email = $_POST['email'];

    if ($numHotels == 0) {

    } else {
        $query = "INSERT INTO hoteldb.hotelchain (hotelchainname, centraloffice, numberofhotel, phonenumber, email) VALUES 
              ('$hotelName','$centralOffice','$numHotels','$phoneNumber','$email')";
        $result = pg_query($db_connection,$query);


        echo "Added hotel $hotelName with $numHotels offices and address: $centralOffice phone number: $phoneNumber email: $email\n";
        if ($result) {
            echo "POST data is successfully logged\n";
        } else {
            echo "User must have sent wrong inputs\n";
        }
    }







?>
