<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $violation_id = $_POST['violation_id'];
    $name = $_POST['name'];
    $card_number = $_POST['card_number'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];

    // Process payment (dummy processing for this example)
    $payment_success = true;

    if ($payment_success) {
        $update_query = "UPDATE infractions SET status = 1 WHERE `id_infraction` = ?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, 'i', $violation_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($con);

    header('Location: infractions.php');
    exit;
}
?>