<?php
session_start();
require 'connection.php';
require 'functions.php'; // Ensure this file contains the connection logic

$user_data = check_login($con);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the CSRF token
    $csrfToken = $_POST['csrf_token'] ?? '';
    if (!validateCsrfToken($csrfToken)) {
        die('Invalid CSRF token');
    }

    $id = $user_data['id'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $rfidtag = $_POST['rfidtag'];

    // Process payment (dummy processing for this example)
    $payment_success = true;

    if ($payment_success) {
        // Use a parameterized query to prevent SQL injection
        $update_query = "UPDATE users2 SET rfidtag = ?, email = ?, phonenumber = ?, password = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $update_query);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'ssssi', $rfidtag, $email, $phonenumber, $password, $id);
            
            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Check for errors
            if (mysqli_stmt_errno($stmt)) {
                echo "Error updating record: " . mysqli_stmt_error($stmt);
            } else {
                // Redirect after successful update
                header('Location: index.php');
                exit;
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the statement: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
}
?>

