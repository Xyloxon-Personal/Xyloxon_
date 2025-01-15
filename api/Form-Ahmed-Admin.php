<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xyloxon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    $language1 = $_POST['language1'];
    $language2 = $_POST['language2'];
    $youtube_link = $_POST['youtube_link'];
    $download_link = $_POST['download_link'];



    $date_time = date("Y-m-d H:i:s");

    // Handle image uploads
    $thumbnail = $_FILES['thumbnail']['name'];
    $cover1 = $_FILES['cover1']['name'];
    $cover2 = $_FILES['cover2']['name'];
    $cover3 = $_FILES['cover3']['name'];

    // Directory to save uploaded files
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_dir . $thumbnail);
    move_uploaded_file($_FILES['cover1']['tmp_name'], $target_dir . $cover1);
    move_uploaded_file($_FILES['cover2']['tmp_name'], $target_dir . $cover2);
    move_uploaded_file($_FILES['cover3']['tmp_name'], $target_dir . $cover3);

   // Include it in the SQL insert query
$sql = "INSERT INTO creations (title, description, tags, thumbnail, cover1, cover2, cover3, language1, language2, youtube_link, download_link, date_time) 
VALUES ('$title', '$description', '$tags', '$thumbnail', '$cover1', '$cover2', '$cover3', '$language1', '$language2', '$youtube_link', '$download_link', '$date_time')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to prevent duplicate submissions
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all records
$sql = "SELECT * FROM creations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creations Form</title>
</head>
<body>
    <h1>Add a New Creation</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags" required><br><br>

        <label for="thumbnail">Thumbnail/Main Image:</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required><br><br>

        <label for="cover1">Cover Image 1:</label>
        <input type="file" id="cover1" name="cover1" accept="image/*"><br><br>

        <label for="cover2">Cover Image 2:</label>
        <input type="file" id="cover2" name="cover2" accept="image/*"><br><br>

        <label for="cover3">Cover Image 3:</label>
        <input type="file" id="cover3" name="cover3" accept="image/*"><br><br>

        <label for="language1">Language 1:</label>
        <input type="text" id="language1" name="language1" required><br><br>

        <label for="language2">Language 2:</label>
        <input type="text" id="language2" name="language2" required><br><br>

        <label for="youtube_link">YouTube Link:</label>
        <input type="url" id="youtube_link" name="youtube_link" placeholder="https://youtube.com/" required>
        
        <label for="download_link">Download Link:</label>
<input type="url" id="download_link" name="download_link" placeholder="https://example.com/download" required><br><br>


<br><br>

        <button type="submit">Submit</button>
    </form>

    <h1>All Creations</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Thumbnail</th>
            <th>Cover 1</th>
            <th>Cover 2</th>
            <th>Cover 3</th>
            <th>Language 1</th>
            <th>Language 2</th>
            <th>YouTube Link</th>
            <th>Download Link</th>

            <th>Date & Time</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['tags']; ?></td>
                    <td><img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="50"></td>
                    <td><img src="uploads/<?php echo $row['cover1']; ?>" alt="Cover 1" width="50"></td>
                    <td><img src="uploads/<?php echo $row['cover2']; ?>" alt="Cover 2" width="50"></td>
                    <td><img src="uploads/<?php echo $row['cover3']; ?>" alt="Cover 3" width="50"></td>
                    <td><?php echo $row['language1']; ?></td>
                    <td><?php echo $row['language2']; ?></td>
                    <td><a href="<?php echo $row['youtube_link']; ?>" target="_blank">Watch</a></td>
                    <td><a href="<?php echo $row['download_link']; ?>" target="_blank">Download</a></td>

                    <td><?php echo $row['date_time']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="12">No records found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
