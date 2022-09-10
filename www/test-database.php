<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>All activities</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>All activities with their wholesomeness ratings</h1>

<p>Showing activities:</p>

<table border="1">
<tr><th>Activity</th><th>Rating</th><th>Times Rated</th></tr>

<?php
$DB_HOST = '192.168.56.12';
$DB_USER = 'root';
$DB_PWD = 'root';
$DB_NAME = 'webdatabase';
$connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$query = 'SELECT * FROM activities';
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)<1){
  echo 'empty';
}

while ($record = mysqli_fetch_assoc($result)){
  echo "<tr><td>".$record["activity"]."</td><td>".$record["rating"]."</td><td>".$record["timesRated"]."</td></tr>\n";
}

//$query = 'INSERT INTO activities VALUES ('Climb a tree', 11, 3)';
//$result = mysqli_query($connect, $query);
?>
</table>
</body>
</html>
