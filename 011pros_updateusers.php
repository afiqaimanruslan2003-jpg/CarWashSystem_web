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
$ud_IC    = mysqli_real_escape_string($conn, $_POST['ud_IC']);
$ud_name  = mysqli_real_escape_string($conn, $_POST['ud_name']);
$ud_phone = mysqli_real_escape_string($conn, $_POST['ud_phone']);

/* ===============================
   VALIDATE DATA
   =============================== */
if (empty($ud_name) || empty($ud_phone)) {
    die("Error: All fields are required!");
}

/* ===============================
   UPDATE QUERY
   =============================== */
$query = "
UPDATE users 
SET 
    name = '$ud_name',
    phone = '$ud_phone'
WHERE IC = '$ud_IC'
";

/* ===============================
   EXECUTE & FEEDBACK
   =============================== */
if (mysqli_query($conn, $query)) {
    header("Location: tabledata_users002.php?update=success");
} else {
    echo "Error updating customer record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>