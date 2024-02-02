<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "db.php"; // Include your database connection file

    // Check if 'name' and 'email' keys are set in $_POST
    if (isset($_POST['name'], $_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit();
        }

        // Update the database state (example: set status to 'pending')
        $update_query = "UPDATE adminlogin SET passwordrequeststates = 'pending' WHERE email = '$email'";
        $result = mysqli_query($conn, $update_query);

        if ($result) {
            // Database update successful
            // Send confirmation email
            echo "Your form has been submitted! Please wait for confirmation.";
        } else {
            // Database update failed
            echo "Failed to update database.";
        }
    } else {
        echo "Name and email are required.";
    }

    // No redirection
    exit();
}