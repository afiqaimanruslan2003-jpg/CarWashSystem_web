<?php
include ('database001.php');

/* ===============================
   CHECK SUBMIT
   =============================== */
if (!isset($_POST['SUBMIT'])) {
    die("Invalid access.");
}

/* ===============================
   GET & SANITIZE DATA
   =============================== */
$ud_service_id      = mysqli_real_escape_string($conn, $_POST['ud_service_id']);
$ud_booking_id      = mysqli_real_escape_string($conn, $_POST['ud_booking_id']);
$ud_type_car        = mysqli_real_escape_string($conn, $_POST['ud_type_car']);
$ud_service_name    = mysqli_real_escape_string($conn, $_POST['ud_service_name']);
$ud_price           = mysqli_real_escape_string($conn, $_POST['ud_price']);

/* ===============================
   VALIDATE PRICE
   =============================== */
if (!is_numeric($ud_price) || $ud_price <= 0) {
    die("Error: Invalid price. Price must be a positive number.");
}

/* ===============================
   UPDATE QUERY
   =============================== */
$query = "
UPDATE services 
SET 
    type_car = '$ud_type_car',
    service_name = '$ud_service_name',
    price = '$ud_price'
WHERE service_id = '$ud_service_id'
";

/* ===============================
   EXECUTE & FEEDBACK
   =============================== */
if (mysqli_query($conn, $query)) {
    // Option 1: If your bookings table has different column names
    // First, let's check what columns your bookings table has
    // $checkColumns = "SHOW COLUMNS FROM bookings";
    // $result = mysqli_query($conn, $checkColumns);
    // while($row = mysqli_fetch_assoc($result)) {
    //     echo $row['Field'] . "<br>";
    // }
    
    // Option 2: If you want to update bookings table but not sure about column names
    // You can either:
    // a) Remove the booking update if not needed
    // b) Update with correct column names
    
    // For now, let's just update the services table and redirect
    // Remove or fix the booking update query
    
    header("Location: tabledata_services002.php?update=success");
} else {
    echo "Error updating service record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>