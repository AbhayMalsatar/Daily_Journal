<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Daily Journal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-static/">

    <nav class="navbar navbar-inverse">
        <div class="container dark">
            <div class="navbar-header">
                <p class="navbar-brand">DAILY JOURNAL</p>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- 6 -->
                <li id="home"><a href="index.php">HOME</a></li>
                <li id="about"><a href="about.html">ABOUT US</a></li>
                <li id="contact"><a href="contact.html">CONTACT US</a></li>
                <li id="compose"><a href="compos.html">COMPOSE</a></li>
                <li id="compose"><a href="myblog.php">MY BLOG</a></li>
                <li id="compose"><a href="start.php">LOG OUT</a></li>
            </ul>
        </div>
    </nav>

<body>
    <div class="container">
        <div class="jumbotron" style="margin-top: 30px; padding-bottom : 10px;">
            <?php
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
            session_start();
            $title = $_POST["title"];
            $email = $_SESSION["email"];
            $name = $_SESSION["name"];
            $sql = "SELECT title,content,date1,time1,name FROM post1 where title = '$title'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<p style = 'color : gray; float:left;' >" . $row["name"]  . "</p>";
                    echo "<p style = 'margin-top : 20px;  text-align: right; color : gray' >" . $row["time1"] . " " . $row["date1"] . "</p>";
                    echo "</div>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . $row["content"] . "</p>";
                }
            } else {
                echo "No data found.";
            }


            // Close the database connection
            $conn->close();
            ?>
        </div>
</body>

</html>