<?php
include_once('db.php');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function generateUniqueID($username) {
    $timestamp = time();
    $uniqueID = $username . "_" . $timestamp;
    return $uniqueID;
}

function test_input($data) {
    global $conn;  // Add this line to make $conn accessible within the function
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $username = test_input($_POST["username"]);
    $department = test_input($_POST["department"]);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('success' => false, 'message' => 'Invalid email format'));
        exit();
    }

    // Validate password strength (you may adjust this based on your requirements)
    if (strlen($password) < 8) {
        echo json_encode(array('success' => false, 'message' => 'Password must be at least 8 characters'));
        exit();
    }

    // Hash the password using base64 encoding
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   

    // Generate a unique ID for the user
    $uniqueID = generateUniqueID($username);

    // Check if the user already exists
    $stmt_check = $conn->prepare("SELECT * FROM adminlogin WHERE email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo json_encode(array('success' => false, 'message' => 'User with this email already exists.'));
        $stmt_check->close();
        exit();
    }

    // Insert the user data into the database
    $stmt_insert = $conn->prepare("INSERT INTO adminlogin (name, email, password, username, department, unique_id) VALUES (? , ? , ?, ?, ?, ?)");
    $stmt_insert->bind_param("ssssss", $name, $email, $hashedPassword, $username , $department , $uniqueID);

    if ($stmt_insert->execute()) {
        echo json_encode(array('success' => true, 'message' => 'User registered successfully. Unique ID: ' . $uniqueID));
        

    } else {
        echo json_encode(array('success' => false, 'message' => 'Error: Unable to register.'));
        // Optionally, print the error for debugging purposes
        // echo "Error: " . $stmt_insert->error;
    }

    $stmt_insert->close();
    $stmt_check->close();
    $conn->close();
}
?>
