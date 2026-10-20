<?php
include ('database001.php');

if (!isset($_GET['booking_id'])) {
    die("Booking ID not found.");
}

$booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);

/* ===============================
   DELETE CHILD TABLES FIRST
   =============================== */

/* 1. Delete payments */
mysqli_query($conn,
    "DELETE FROM payments WHERE booking_id='$booking_id'"
);

/* 2. Delete services */
mysqli_query($conn,
    "DELETE FROM services WHERE booking_id='$booking_id'"
);

/* ===============================
   DELETE PARENT TABLE
   =============================== */
$result = mysqli_query($conn,
    "DELETE FROM bookings WHERE booking_id='$booking_id'"
);

if ($result) {
    header("Location: tabledata_edit&deletebooking.php?delete=success");
} else {
    echo "Delete failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
