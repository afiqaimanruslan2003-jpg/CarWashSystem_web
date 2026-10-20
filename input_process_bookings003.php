<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
<?php
include('database001.php');

$booking_id   = $_POST['booking_id'];
$IC           = $_POST['IC'];
$booking_date = $_POST['booking_date'];
$booking_time = $_POST['booking_time'];
$status       = $_POST['status'];

// 1. Tentukan duration default (minimum 30 min)
$default_duration = 30; // Kita tak tahu service lagi, ambil min
$new_start = strtotime($booking_time);
$new_end   = strtotime("+$default_duration minutes", $new_start);

// 2. Ambil semua booking untuk tarikh tu
$sql_check = "SELECT b.booking_time, s.service_name 
              FROM bookings b
              JOIN services s ON b.booking_id = s.booking_id
              WHERE b.booking_date='$booking_date'";
$result_check = mysqli_query($conn, $sql_check);

$clash = false;
$available_after = '';

while($row = mysqli_fetch_assoc($result_check)){
    // Tentukan duration service existing
    switch($row['service_name']){
        case "Basic Wash": $exist_duration = 30; break;
        case "Premium Wash": $exist_duration = 45; break;
        case "Interior Cleaning": $exist_duration = 60; break;
        case "Exterior Wash": $exist_duration = 30; break;
        case "Full Package": $exist_duration = 90; break;
        default: $exist_duration = 30;
    }

    $exist_start = strtotime($row['booking_time']);
    $exist_end   = strtotime("+$exist_duration minutes", $exist_start);

    // Check overlap
    if($new_start < $exist_end && $new_end > $exist_start){
        $clash = true;
        $available_after = date("H:i", $exist_end);
        break;
    }
}

// 3. Kalau clash, alert dan balik ke form
if($clash){
    echo "<script>
        alert('⚠️ Time slot clash! Please choose after $available_after');
        window.history.back();
    </script>";
    exit;
}

// 4. Insert booking (service dipilih selepas booking)
$query = "INSERT INTO bookings (booking_id, IC, booking_date, booking_time, status)
          VALUES ('$booking_id','$IC','$booking_date','$booking_time','$status')";

if(mysqli_query($conn, $query)){
    // Redirect ke page pilih service
    header("Location: new_form_services003.php?booking_id=$booking_id");
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
