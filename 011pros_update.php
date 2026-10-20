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
$ud_booking_id   = mysqli_real_escape_string($conn, $_POST['ud_booking_id']);
$ud_IC           = mysqli_real_escape_string($conn, $_POST['ud_IC']);
$ud_booking_date = mysqli_real_escape_string($conn, $_POST['ud_booking_date']);
$ud_booking_time = mysqli_real_escape_string($conn, $_POST['ud_booking_time']);
$ud_status       = mysqli_real_escape_string($conn, $_POST['ud_status']);

/* ===============================
   UPDATE QUERY
   =============================== */
$query = "
UPDATE bookings 
SET 
    booking_date = '$ud_booking_date',
    booking_time = '$ud_booking_time',
    status = '$ud_status'
WHERE booking_id = '$ud_booking_id'
";


/* ===============================
   EXECUTE & FEEDBACK
   =============================== */
if (mysqli_query($conn, $query)) {
    header("Location: tabledata_edit&deletebooking.php?update=success");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
