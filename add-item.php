<?php
function makeSafe($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['image']['tmp_name'])) {
        try {
            include '../includes/db.php';
            $name = makeSafe($_POST['name']);
            $description = makeSafe($_POST['description']);
            $date = $_POST['date'];
            $image = $_FILES['image']['tmp_name'];
            
            $imageContent = file_get_contents($image);
            
            $sql = "INSERT INTO items (`name`, `description`, `found_date`, `image`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param("sssb", $name, $description, $date, $imageContent);

                if ($stmt->execute()) {
                    echo "Image uploaded successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage() . "<br>" . $e->getTrace();
        }
    } else {
        echo "No image selected.";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Přidat nalezený předmět</title>
</head>

<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Přidat nalezený předmět</h2>
        <div class="form-container">
            <form action="add-item.php" method="post" enctype="multipart/form-data">
                <label for="name">Název předmětu</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Popis</label>
                <input type="text" id="description" name="description" required>

                <label for="date">Datum nálezu</label>
                <input type="date" id="date" name="date" required>

                <label for="image">Obrázek</label>
                <input type="file" id="image" name="image" accept="image/*">

                <input type="submit" name="add-item" value="Přidat">
            </form>
        </div>
    </div>
</body>

</html>