<?php
include ('database001.php');

/* ===============================
   CHECK IF DELETE VIA POST OR GET
   =============================== */
if (isset($_POST['delete_IC'])) {
    // Delete via POST (from form)
    $delete_IC = mysqli_real_escape_string($conn, $_POST['delete_IC']);
} elseif (isset($_GET['IC'])) {
    // Delete via GET (from link in table)
    $delete_IC = mysqli_real_escape_string($conn, $_GET['IC']);
} else {
    die("Error: No customer specified for deletion.");
}

/* ===============================
   CHECK IF CUSTOMER EXISTS
   =============================== */
$check_sql = "SELECT * FROM users WHERE IC = '$delete_IC'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) == 0) {
    die("Error: Customer not found!");
}

/* ===============================
   DELETE RELATED RECORDS FIRST
   =============================== */
// 1. Get all booking IDs for this customer
$booking_sql = "SELECT booking_id FROM bookings WHERE IC = '$delete_IC'";
$booking_result = mysqli_query($conn, $booking_sql);

while ($booking = mysqli_fetch_assoc($booking_result)) {
    $booking_id = $booking['booking_id'];
    
    // Delete payments for this booking
    $delete_payments = "DELETE FROM payments WHERE booking_id = '$booking_id'";
    mysqli_query($conn, $delete_payments);
    
    // Delete services for this booking
    $delete_services = "DELETE FROM services WHERE booking_id = '$booking_id'";
    mysqli_query($conn, $delete_services);
}

// 2. Delete bookings for this customer
$delete_bookings = "DELETE FROM bookings WHERE IC = '$delete_IC'";
mysqli_query($conn, $delete_bookings);

/* ===============================
   DELETE CUSTOMER
   =============================== */
$delete_user = "DELETE FROM users WHERE IC = '$delete_IC'";

if (mysqli_query($conn, $delete_user)) {
    header("Location: tabledata_users002.php?delete=success");
} else {
    echo "Error deleting customer record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>