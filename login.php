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
    $email = $_POST["email"];
    $password = $_POST["password"];
    session_start();

    $_SESSION["email"] = $email;
    // SQL query to insert the data into the database
    $sql = "select * from user where email = '$email' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["name"] = $row["name"];
        }
        header("location:index.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();