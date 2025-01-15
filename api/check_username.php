<?php
include 'common/connection.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $query = "SELECT id FROM register WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "exists"; // Username exists
    } else {
        echo "available"; // Username is available
    }

    $stmt->close();
}
?>
