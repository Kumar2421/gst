<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Include your database connection file
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request_id'])) {
        $request_id = $_POST['request_id'];

        if (isset($_POST['accept'])) {
            // Implement logic for accepting the request
            $sessionToken = bin2hex(random_bytes(10)); // Generate a session token
            $update_query = "UPDATE adminlogin SET passwordrequeststates = 'accepted', token = '$sessionToken' WHERE id = $request_id";
            $result = mysqli_query($conn, $update_query);

            if ($result) {
                // Send acceptance email with the session token link
                sendAcceptanceEmail($conn, $request_id, $sessionToken);
                echo "Request accepted successfully.";
            } else {
                // Handle database update failure
                echo "Failed to accept the request.";
            }
        } elseif (isset($_POST['reject'])) {
            // Implement logic for rejecting the request
            $update_query = "UPDATE adminlogin SET passwordrequeststates = 'rejected' WHERE id = $request_id";
            $result = mysqli_query($conn, $update_query);

            if ($result) {
                // Send rejection email
                sendRejectionEmail($conn, $request_id);
                echo "Request rejected successfully.";
            } else {
                // Handle database update failure
                echo "Failed to reject the request.";
            }
        }
    } else {
        echo "Invalid request.";
    }
}

// Function to send acceptance email
function sendAcceptanceEmail($conn, $request_id, $sessionToken) {
    // Retrieve email and name from the database based on request_id
    $select_query = "SELECT email, name FROM adminlogin WHERE id = $request_id";
    $result = mysqli_query($conn, $select_query);

    if ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $name = $row['name'];

        // Send acceptance email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sakthinesan121@gmail.com';
            $mail->Password = 'scchlunehbrakqzc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set sender email
            $mail->setFrom('senthil210520012421@gmail.com', 'kumar');

            // Recipients
            $mail->addAddress($to, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Accepted';
            $mail->Body = "Dear $name,\n\nYour password reset request has been accepted. Click the link below to reset your password:\n\n";
            $mail->Body .= "http://localhost/hg/login/new-password.php?token=$sessionToken";

            $mail->send();
            echo "Request accepted successfully.";
        } catch (Exception $e) {
            echo "Failed to send acceptance email. Error: {$mail->ErrorInfo}";
        }
    }
}

// Function to send rejection email
function sendRejectionEmail($conn, $request_id) {
    // Retrieve email and name from the database based on request_id
    $select_query = "SELECT email, name FROM adminlogin WHERE id = $request_id";
    $result = mysqli_query($conn, $select_query);

    if ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $name = $row['name'];

        // Send rejection email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sakthinesan121@gmail.com';
            $mail->Password = 'scchlunehbrakqzc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('senthil210520012421@gmail.com', 'Your Name');
            $mail->addAddress($to, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Rejected';
            $mail->Body = "Dear $name,\n\nYour password reset request has been rejected.";

            $mail->send();
        } catch (Exception $e) {
            echo "Failed to send rejection email. Error: {$mail->ErrorInfo}";
        }
    }
}
?>
