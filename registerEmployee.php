<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="registerC.css">
  <title>Employee Registration</title>
</head>
<body>
    <section>
        <div class="form-value">
            <form action="" method="post">
                <h2>Employee Registration</h2>
                <div class="inputbox">
                    <input type="name" name="name" value="Alan Turing" required>
                    <label for="">Full Name</label>
                </div>
                <div class="inputbox">
                    <input type="position" name="position" value="Manager" required>
                    <label for="">Position</label>
                </div>
                <div class="inputbox">
                    <input type="email" name="email" value="alan@gmail.com" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" value="123" required>
                    <label for="">Password</label>
                </div>
                <div class="inputbox">
                    <input type="address" name="address" value="161 Cambridge Road"required>
                    <label for="">Address</label>
                </div>
                <div class="inputbox">
                    <input type="sin" name="sin" value="120140720" required>
                    <label for="">SIN</label>
                </div>
                <button>
                    <a href="Employee.html">Confirm</a>
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
$position = $_POST['position'];


    $query = "INSERT INTO hoteldb.employee ( fullname, address, sin, password, email, position) VALUES 
              ('$name','$address','$sin','$password','$email','$position')";
    $result = pg_query($db_connection,$query);


    if ($result) {
        echo "POST data is successfully logged\n";
    } else {
        echo "User must have sent wrong inputs\n";
    }

?>