<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Selection</title>
    <link rel="stylesheet" href="roomSel.css">
</head>
<body>
    <div class="wrapper">
        <h1>Room Selection</h1>
        <div class="select">
            <select name="hotel_chain" id="format">
                <option selected disabled>Hotel</option>
                <option value="Hilton">Hilton</option>
                <option value="Best Western">Best Western</option>
                <option value="Holiday Inn">Holiday Inn</option>
                <option value="Sheraton">Sheraton</option>
                <option value="Four Seasons">Four Seasons</option>
            </select>
        </div>
        <div class="select">
            <select name="area" id="format">
                <option selected disabled>Area</option>
                <option value="Nashville">Nashville</option>
                <option value="Vancover">Vancover</option>
                <option value="Orlando">Orlando</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Toronto">Toronto</option>
                <option value="Montreal">Montreal</option>
                <option value="Houston">Houston</option>
                <option value="Seattle">Seattle</option>
            </select>
        </div>
        <div class="select">
            <select name="hotel_category" id="format">
                <option selected disabled>Star Rating</option>
                <option value="1 star">1 star</option>
                <option value="2 star">2 star</option>
                <option value="3 star">3 star</option>
                <option value="4 star">4 star</option>
                <option value="5 star">5 star</option>
            </select>
        </div>
        <div class="select">
            <select name="capacity" id="format">
                <option selected disabled>Capacity</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="wrapper">
        <h1>Check-In/Check-Out Dates</h1>
        <label for="checkinDate">Check-in Date:</label>
        <input type="date" id="checkinDate" name="checkinDate"><br><br>
        <label for="checkoutDate">Check-out Date:</label>
        <input type="date" id="checkoutDate" name="checkoutDate"><br><br>
    </div>
    <div class="wrapper">
        <header>
            <h2>Price Range</h2>
            <p>Use slider or enter min and max price</p>
        </header>
        <div class="price-in">
            <div class="field">
                <span>Min</span>
                <input type="number" name="price_range_min" class="in-max" value="100">
            </div>
            <div class="field">
                <span>Max</span>
                <input type="number" name="price_range_max" class="in-min" value="1500">
            </div>
        </div>
        <div class="slider">
            <div class="pro"></div>
        </div>
        <div class="range-in">
            <input type="range" class="range-min" min="0" max="1500" value="100">
            <input type="range" class="range-max" min="0" max="1500" value="1500">
        </div>
        <div class="wrapper">
            <h1>Make a Booking</h1>
            <div class="form-value">
                <form action="">
                    <button>
                        <a href="Booking.php">BOOKING</a>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const rangein = document.querySelectorAll(".range-in input");

        const pricein = document.querySelectorAll(".price-in input");

        const progress = document.querySelector('.slider .pro');
        let priceGap = 10;
        rangein.forEach(input =>{
            input.addEventListener("input", e =>{
                let minVal = parseInt(rangein[0].value),
                maxVal = parseInt(rangein[1].value);

               if(maxVal - minVal < priceGap){
                   if(e.target.className === "range-min"){
                        rangein[0].value = maxVal - priceGap;
                   }else{
                        rangein[1].value = minVal + priceGap;
                   }
               } else{
                    pricein[0].value = minVal;
                    pricein[1].value = maxVal;
                    progress.style.left = (minVal / rangein[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal / rangein[1].max) * 100 + "%";
               }
            });
        });
    </script>
</body>
</html>

<?php



// Connect to PostgreSQL database
$host = "localhost";
$dbname = "postgres";
$user = "postgres";
$password = "admin";
$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

// Get user's search criteria from HTML form
$start_date = $_POST['checkinDate'];
$end_date = $_POST['checkoutDate'];
$capacity = $_POST['capacity'];
$area = $_POST['area'];
$hotel_chain = $_POST['hotel_chain'];
$hotel_category = $_POST['hotel_category'];
$total_rooms = $_POST['total_rooms'];
$price_range_min = $_POST["price_range_min"];
$price_range_max = $_POST["price_range_max"];

// Retrieve data from the database based on user's search criteria
$sql = "SELECT hoteldb.Hotel.*, HotelChain.HotelChainName 
        FROM Hotel 
        INNER JOIN HotelChain ON Hotel.HotelName = HotelChain.HotelChainName 
        WHERE 
            (Hotel.Rating >= :hotel_category OR :hotel_category IS NULL) AND 
            (Hotel.NumberOfRooms >= :total_rooms OR :total_rooms IS NULL) AND 
            (Hotel.Address LIKE :area OR :area IS NULL) AND 
            (HotelChain.HotelChainName LIKE :hotel_chain OR :hotel_chain IS NULL) AND 
            (Hotel.RoomPrice BETWEEN :price_range_min AND :price_range_max) AND 
            (:start_date NOT BETWEEN Hotel.StartDate AND Hotel.EndDate OR :start_date IS NULL) AND 
            (:end_date NOT BETWEEN Hotel.StartDate AND Hotel.EndDate OR :end_date IS NULL) AND 
            (Hotel.RoomCapacity >= :capacity OR :capacity IS NULL)";

$stmt = $db->prepare($sql);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);
$stmt->bindParam(':capacity', $capacity);
$stmt->bindParam(':area', $area);
$stmt->bindParam(':hotel_chain', $hotel_chain);
$stmt->bindParam(':hotel_category', $hotel_category);
$stmt->bindParam(':total_rooms', $total_rooms);
$stmt->bindParam(':price_range_min', $price_range_min);
$stmt->bindParam(':price_range_max', $price_range_max);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the retrieved data in a table format
echo "<table>";
echo "<tr><th>Hotel Name</th><th>Rating</th><th>Number of Rooms</th><th>Address</th><th>Phone Number</th><th>Email</th><th>Manager</th><th>Chain Name</th><th>Room Capacity</th><th>Room Price</th><th>Start Date</th><th>End Date</th></tr>";
foreach ($results

as $row) {
    echo "<tr>";
    echo "<td>" . $row['HotelName'] . "</td>";
    echo "<td>" . $row['Rating'] . "</td>";
    echo "<td>" . $row['NumberOfRooms'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td>" . $row['PhoneNumber'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Manager'] . "</td>";
}


?>
