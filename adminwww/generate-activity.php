<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Generate an activity!</title>
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
<h1>Generate a Wholesome Activity!</h1>

<div>
      
    <form action ="" method = "post">
          <input type = "submit" name="submit" value = "Generate" />
          
    </form>
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


//$query = "SELECT * FROM activities ORDER BY RAND() LIMIT 1";
$query = 'SELECT activity FROM activities ORDER BY RAND() LIMIT 1';
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)<1){
  echo 'empty';
}

while ($record = mysqli_fetch_assoc($result)){
  echo "<p>".$record["activity"]."</p>\n";
}


?>
</div>

<p><a href="add-activity.php">Add a Wholesome Activity!</a></p>
<p><a href="show-activities.php">See all Wholesome Activities!</a></p>

</table>
</body>
</html>
