<?php
session_start();
include_once('db.php');
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $check_email = "SELECT * FROM adminlogin WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $fetch = mysqli_fetch_assoc($res);
            $storedPassword = $fetch['password'];

            if (password_verify($password, $storedPassword)) {
                $_SESSION['email'] = $email;
                $states = isset($fetch['states']) ? $fetch['states'] : null;

                if ($states == 'supar_admin') {
                    echo json_encode(array('success' => true, 'redirect' => 'sampleadmin.php'));
                    exit();
                } elseif ($states == null) {
                    echo json_encode(array('success' => true, 'redirect' => 'adminpanel.php'));
                    exit();
                }
            } else {
                $errors['credentials'] = "Incorrect email or password!";
            }
        } else {
            $errors['credentials'] = "Incorrect email or password!";
        }

        mysqli_free_result($res);
    } else {
        $errors['query'] = "Error executing the query: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    echo json_encode(array('success' => false, 'errors' => $errors));
    exit();
}

// If not a POST request, handle other cases (e.g., redirect if already logged in)
if (isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
}
?>
