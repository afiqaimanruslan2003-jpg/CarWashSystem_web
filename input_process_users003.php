<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
<?php 
include ('database001.php'); 
$IC = $_POST['IC']; //
$name = $_POST['name']; //
$phone = $_POST['phone'];

$query ="insert into users (IC, name, phone)
values('$IC','$name','$phone')";
if (mysqli_query($conn, $query)) {
	   
	header("Location: new_form_booking002.php?IC=$IC"); // link direct untuk dapat data IC jugak masa dekat form booking
exit;

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?> 
</body>
</html>
