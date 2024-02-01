<?php
// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Check if a file is selected
    if(isset($_FILES["file"])) {
        $file = $_FILES["file"];

        // Validate file type
        $allowed_types = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
        if(in_array($file['type'], $allowed_types)) {
            // Move the uploaded file to a temporary location
            $upload_path = 'uploads/';
            $temp_file = $upload_path . basename($file['name']);

            if(move_uploaded_file($file['tmp_name'], $temp_file)) {
                // Include db.php for database connection
                require_once 'db.php';

                // Include PHPExcel library or PhpSpreadsheet (if not already included)
                require_once 'PHPExcel/PHPExcel.php';
                $objPHPExcel = PHPExcel_IOFactory::load($temp_file);
                $sheet = $objPHPExcel->getSheet(0);

                // Additional information
                $date = date('Y-m-d');
                $time = date('H:i:s');
                $file_name = basename($file['name']);
                $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'unknown';

                // Loop through rows in Excel and insert into MySQL
                for($row = 2; $row <= $sheet->getHighestRow(); $row++) {
                    $column1 = $sheet->getCellByColumnAndRow(0, $row)->getValue();
                    $column2 = $sheet->getCellByColumnAndRow(1, $row)->getValue();

                    $sql = "INSERT INTO files (column1, column2, date, time, file_name, email) VALUES ('$column1', '$column2', '$date', '$time', '$file_name', '$email')";
                    $conn->query($sql);
                }

                // Close database connection
                $conn->close();

                // Remove the temporary file
                unlink($temp_file);

                echo "Data inserted successfully!";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Please upload a valid Excel file.";
        }
    } else {
        echo "No file selected.";
    }
}
?>
