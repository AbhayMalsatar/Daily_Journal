<?php
// Replace these database credentials with your actual values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    session_start();
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    // SQL query to insert the data into the database
    $sql = "INSERT INTO user (name, email, password) VALUES ('$name','$email','$password')";

    if ($conn->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
