<?php
include('database001.php');

$booking_id   = $_POST['booking_id'];
$service_name = $_POST['service_name'];
$type_car     = $_POST['type_car'];
$price        = $_POST['price'];

// Ambil info booking
$sqlBooking = "SELECT booking_date, booking_time FROM bookings WHERE booking_id='$booking_id'";
$resBooking = mysqli_query($conn, $sqlBooking);
$booking    = mysqli_fetch_assoc($resBooking);

$booking_date = $booking['booking_date'];
$booking_time = $booking['booking_time'];

// Tentukan duration ikut service berdasarkan katalog baru
switch ($service_name) {
    case "Signature Wash": $duration = 30; break; // 30 minutes for signature wash
    case "Executive Detailing": $duration = 60; break; // 1 hour for executive detailing
    case "Ceramic Coating": $duration = 90; break; // 1.5 hours for ceramic coating
    default: $duration = 30;
}

// Calculate estimated ready time
$start_datetime = $booking_date . ' ' . $booking_time;
$start_timestamp = strtotime($start_datetime);
$ready_timestamp = strtotime("+$duration minutes", $start_timestamp);
$ready_time = date('H:i', $ready_timestamp);
$ready_datetime = $booking_date . ' ' . $ready_time;

// Tentukan waktu start & end untuk conflict check
$start_time = strtotime($booking_time);
$end_time   = strtotime("+$duration minutes", $start_time);

// Check clash dengan service lain pada tarikh sama
$checkSql = "SELECT b.booking_time, s.service_name
             FROM bookings b
             JOIN services s ON b.booking_id = s.booking_id
             WHERE b.booking_date = '$booking_date'";
$result = mysqli_query($conn, $checkSql);

while($row = mysqli_fetch_assoc($result)) {
    // Duration berdasarkan service yang sama dengan di atas
    switch($row['service_name']){
        case "Signature Wash": $d = 30; break;
        case "Executive Detailing": $d = 60; break;
        case "Ceramic Coating": $d = 90; break;
        default: $d = 30;
    }
    
    $exist_start = strtotime($row['booking_time']);
    $exist_end   = strtotime("+$d minutes", $exist_start);

    if($start_time < $exist_end && $end_time > $exist_start){
        echo "<script>alert('Time conflict detected. Please choose another time.'); window.history.back();</script>";
        exit;
    }
}

// Insert service (NO need to add ready_time field in database for this)
$query = "INSERT INTO services (booking_id, service_name, price, type_car)
          VALUES ('$booking_id','$service_name','$price','$type_car')";

if(mysqli_query($conn, $query)){
    mysqli_query($conn, "UPDATE bookings SET status='Confirmed' WHERE booking_id='$booking_id'");
    
    // Pass ready_time to payment page via URL
    header("Location: new_form_payments003.php?booking_id=$booking_id&ready_time=$ready_time");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>