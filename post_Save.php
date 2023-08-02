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
    $title = $_POST["postTitle"];
    $body = $_POST["postBody"];
    date_default_timezone_set("Asia/Calcutta");
    $currentDateTime = new DateTime('now');
    $currentDate = $currentDateTime->format('l, F j, Y');
    $time = date("h:i:sa");
    session_start();
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];

    // SQL query to insert the data into the database
    $sql = "INSERT INTO post1 (title, content, date1 , time1 , name , email) VALUES ('$title', '$body' , '$currentDate' , '$time' , '$name' , '$email')";

    if ($conn->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
