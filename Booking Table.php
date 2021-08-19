<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "BookMyShow");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Booking (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
phone VARCHAR(30) NOT NULL,
movie VARCHAR(100) NOT NULL,
timings VARCHAR(100) NOT NULL,
seats VARCHAR(100) NOT NULL,
tprice VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Booking created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>