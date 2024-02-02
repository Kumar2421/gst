<?php
 session_start();
 include_once('db.php');
// $errors = array();
if(!isset($_SESSION["email"])){
    header("Location: index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('Birdy.jpg'); /* Add the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .admin-panel {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="admin-panel">
        <h1>Welcome to Admin Panel</h1>
        <div class="admin-content">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Choose Excel File:</label>
            <input type="file" name="file" id="file" accept=".xlsx, .xls">
            <button type="submit" name="submit">Upload</button>
       </form>
        </div>
    </div>
</body>
</html>
