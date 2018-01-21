<?php

$page = $_SERVER['PHP_SELF'];
$sec = "60";
header("Refresh: $sec; url=$page");

$servername = "localhost";
$username = "root";
$password = "218agkaki";
$dbname = "python";
print ("<h2>Processzor hőmérséklet, Orange PI One</h2>");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, date, temp FROM temperature order by date desc limit 10";
$result = $conn->query($sql);

print ("<table cellpadding=3 cellspacing=5 border=3><tr><td><b>ID</b></td><td><b>date</b></td><td><b>temp</b></td></tr>");

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$id=$row["id"];
		$date=$row["date"];
		$temp=$row["temp"];
		if ($count==0) {
			echo "<tr><td>" . $row["id"] . "</td><td>" . $date . "</td>"
			."<td>" . $temp . "</td>"
			. "</tr>";
			}
		$count++;
		if ($count==6) {
		$count=0;
		}
	}
	print ("</table>\n");
}

else {
	echo "0 results";
}



$conn->close();
$today = date("Y.m.d H:i.s");
print ("<h3> $today <i>-- Bubb3R --</i></h3>");
?>
