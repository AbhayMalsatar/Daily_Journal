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
    <div class="container"></div>
    <main class="container">
        <?php
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('l, F j, Y');
        echo "<h1 style= 'margin-bottom: 10px;'>" . $currentDate . "</h1>";
        ?>
        <div class="jumbotron" style="margin-top: 30px;">
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

            // Check if the form has been submitted



            // SQL query to insert the data into the database
            $sql = "SELECT title,content FROM post1 ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . substr($row["content"], 0, 200) . "..." . "</p>";
                    $title = $row['title'];
                    echo "<form action='post.php' method='post'><input type='hidden' name='title' value='$title'/><input type='submit' name='Read more' value = 'Read more' class ='btn btn-lg btn-primary' /> </form>";
                }
            } else {
                echo "No data found.";
            }


            // Close the database connection
            $conn->close();
            ?> </div>
    </main>
    </div>

    </div>
</body>

</html>