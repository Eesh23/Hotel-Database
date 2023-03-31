<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="registerC.css">
  <title>Customer Registration</title>
</head>
<body>
    <section>
        <div class="form-value">
            <form action="" method="post">
                <h2>Customer Registration</h2>
                <div class="inputbox">
                    <input type="name" name="name" id="name" value="John Doe"required>
                    <label for="">Full Name</label>
                </div>
                <div class="inputbox">
                    <input type="email" name="email" id="email" value="john@gmail.com" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" id="password" value="123" required>
                    <label for="">Password</label>
                </div>
                <div class="inputbox">
                    <input type="address" name="address" id="address" value="195 University Boulevard"required>
                    <label for="">Address</label>
                </div>
                <div class="inputbox">
                    <input type="sin" name="sin" id="sin" value="190160130"required>
                    <label for="">SIN</label>
                </div>
                <button>
                    <a href="Customer.html">Confirm</a>
                </button>
            </form>
        </div>
    </section>
</body>
</html>

<?php

$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=admin");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$sin = intval($_POST['sin']);
$date = date("Y-m-d");


    $query = "INSERT INTO hoteldb.customer (registrationdate, fullname, email, sin, password,address) VALUES 
              ('$date','$name','$email','$sin','$password','$address')";
    $result = pg_query($db_connection,$query);


    if ($result) {
        echo "POST data is successfully logged\n";
    } else {
        echo "User must have sent wrong inputs\n";
    }

?>