<?php
session_start();
require_once "db.php";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errors = array(); // Initialize an array to store errors

// If the user clicks the change password button
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change-password'])) {
    $_SESSION['info'] = "";

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $token = $_POST['token'];

    // Check if passwords match
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        // Hash the new password
        $encpass = password_hash($password, PASSWORD_BCRYPT);

        // Update the password in the database based on the provided token
        $update_pass = "UPDATE adminlogin SET password = '$encpass' WHERE token = '$token'";
        $run_query = mysqli_query($conn, $update_pass);

        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
            exit(); // Make sure to exit after redirect
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

// Debugging: Print the token received from the form
//echo "Token from Form: " . $_POST['token'];

// Display errors on the same page
if (!empty($errors)) {
    echo "Errors occurred: please return the same page<br>";
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}
?>
