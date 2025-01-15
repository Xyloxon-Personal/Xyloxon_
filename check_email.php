<?php
include 'common/connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $query = "SELECT id FROM register WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "exists"; // Email exists
    } else {
        echo "available"; // Email is available
    }

    $stmt->close();
}
?>
