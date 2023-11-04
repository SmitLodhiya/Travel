<?php
// Connect to your database (update with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$remarks = $_POST['remarks'];

// Insert data into the database
$sql = $conn->prepare("INSERT INTO contact_info (name, email, country, remarks) VALUES (?, ?, ?, ?)");
$sql->bind_param("ssss", $name, $email, $country, $remarks);

if ($sql->execute()) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $sql->error;
}
$sql->close();

?>
