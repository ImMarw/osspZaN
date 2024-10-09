<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nalezené věci</title>
</head>

<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Nalezené věci</h2>
        <a href="add-item.php">Přidat nalezený předmět</a>

        <div class="items">
            <?php
            try {
                include './includes/db.php';
                include './includes/functions.php';
                if($db){
                    echo "JA";
                }else{
                    echo "NAh";
                }
            } catch (Exception $e) {
                echo "something went wrong while routing" . $e->getMessage();
            }
            $sql = "SELECT `name`, `description`, `found_date`, `image` FROM items";
            try {
                $result = $conn->query($sql);
            } catch (mysqli_sql_exception $e) {
                echo "<script>alert('This is a JavaScript alert!');</script><p>Something went wrong</p>";
            }
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $description = $row['description'];
                    $found_date = $row['found_date'];
                    $image = $row['image'];

                    echo "<div class='item'>";
                    echo "<h3>" . $name . "</h3>";
                    echo "<p>" . $description . "</p>";
                    echo "<p>Nalezeno: " . formatTimestamp($found_date) . "</p>";
                    if ($image) {
                        echo "<img src='uploads/" . $image . "' alt='" . $name . "' style='width:200px;height:200px;'/>";
                    }
                    echo "</div>";
                }
            } else {
                echo "Žádné nalezené věci.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>