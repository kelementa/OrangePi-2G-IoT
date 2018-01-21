<?php

$temperature = ($_REQUEST["temp"]);
$hex = ($_REQUEST["hex"]);

//$level=$level*2/1000;
//$level= number_format($level,3);
//print ($level);

$servername = "localhost";
$username = "root";
$password = "218agkaki";
$dbname = "python";

if ($temperature){
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO temperature (id, date, temp) VALUES ('', now(), '$temperature')";



	if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";
	}
	else {
	echo "Error updating record: " . $conn->error;
	}

$conn->close();

/*
// $level=600;  // test
// To send out an email, you must have POSTFIX or another sendmail type daemon installed.

if ($level &gt; 60){
$to = 'ricky@irvingil.us';
//$to = 'yourphone#@txt.att.net'; // Enter an email that you will text  your phone if you want to use this instead of email
$subject = 'Basement Level';
$message = 'Basement Level is ' . $level;
$headers = 'From: apache@irvingil.com' . "\r\n" .
'Reply-To: youremail@youremail.com . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}


*/
}
?>
