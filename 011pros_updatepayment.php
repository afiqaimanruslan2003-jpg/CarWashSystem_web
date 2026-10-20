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
$ud_payment_id     = mysqli_real_escape_string($conn, $_POST['ud_payment_id']);
$ud_booking_id     = mysqli_real_escape_string($conn, $_POST['ud_booking_id']);
$ud_payment_method = mysqli_real_escape_string($conn, $_POST['ud_payment_method']);
$ud_amount         = mysqli_real_escape_string($conn, $_POST['ud_amount']);
$ud_payment_status = mysqli_real_escape_string($conn, $_POST['ud_payment_status']);
$ud_payment_date   = mysqli_real_escape_string($conn, $_POST['ud_payment_date']);

/* ===============================
   VALIDATE AMOUNT
   =============================== */
if (!is_numeric($ud_amount) || $ud_amount <= 0) {
    die("Error: Invalid amount. Amount must be a positive number.");
}

/* ===============================
   UPDATE QUERY
   =============================== */
$query = "
UPDATE payments 
SET 
    payment_method = '$ud_payment_method',
    amount = '$ud_amount',
    payment_status = '$ud_payment_status',
    payment_date = '$ud_payment_date'
WHERE payment_id = '$ud_payment_id'
";

/* ===============================
   EXECUTE & FEEDBACK
   =============================== */
if (mysqli_query($conn, $query)) {
    // Also update booking status if payment is completed
    if (strtolower($ud_payment_status) === 'paid' || strtolower($ud_payment_status) === 'thank you') {
        $updateBooking = "UPDATE bookings SET status = 'Completed' WHERE booking_id = '$ud_booking_id'";
        mysqli_query($conn, $updateBooking);
    }
    
    header("Location: tabledata_payments002.php?update=success");
} else {
    echo "Error updating payment record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>