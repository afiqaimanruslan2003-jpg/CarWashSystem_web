<!DOCTYPE html>
<html>
<head>
<title>Payment Processing</title>
</head>
<body>
<?php
include('database001.php');

$booking_id = $_POST['booking_id'];
$payment_method = $_POST['payment_method'];
$amount = $_POST['amount'];
$payment_status = $_POST['payment_status'];
$payment_date = $_POST['payment_date'];

// Ensure payment_status is not too long
if(strlen($payment_status) > 50){
    $payment_status = substr($payment_status,0,50);
}

$query = "INSERT INTO payments (booking_id, payment_method, amount, payment_status, payment_date)
VALUES ('$booking_id', '$payment_method', '$amount', '$payment_status', '$payment_date')";

if(mysqli_query($conn, $query)){
    // Get the last inserted payment ID
    $payment_id = mysqli_insert_id($conn);
    
    // Redirect to receipt page with payment ID
    header("Location: payment_receipt.php?payment_id=" . $payment_id);
    exit;
} else {
    echo "Error: ".mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>