<!DOCTYPE html>
<html>
<head>
<title>Configuration</title>
</head>
<body>
<?php
// database connectiom $variable
$hostname = 'localhost'; // server database
$username = 'root'; // nama pengguna mysql
$password = ''; // password mysql
$database = 'carwash'; // dalam laragon.MySQL
//

$conn = mysqli_connect($hostname,  $username,  $password, $database) or die('Connecting to MySQL failed');
//$conn (connection variable)= variable untuk connect dengan database
// fungsi mysql_connect $conn > mengembalikan objeck penyambung 
// main untuk file ni adalah connection $conn = mysqli_connect ~ jadi $conn tu dah connet sql (database)
//mysqli_query ~ bila nak view table so ape yang ko nak view , mysqli_error ~ bila error

// output bila berjaya connect
?>
</body>
</html>