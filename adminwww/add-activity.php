<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Add an activity!</title>
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
<h1>Add a Wholesome Activity!</h1>


<div>
      
    <form action ="" method = "post">
          <label>Activity to add</label>
          <input type = "text" name="Activity" maxlength="30"/>
          <input type = "submit" name="submit" value = "Add" />
    </form>

    </div>
<br></br>


<?php
if (isset($_POST['submit'])){
  $newActivity = $_POST['Activity'];
}

$DB_HOST = '192.168.56.12';
$DB_USER = 'root';
$DB_PWD = 'root';
$DB_NAME = 'webdatabase';
$connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if($newActivity != ""){
$query = "INSERT INTO activities VALUES ('$newActivity', 0, 0, 0)";

if ($connect->query($query) === TRUE) {
  echo "Wholesome Activity added!";
} else {
  echo "Error: " . $query . "<br>" . $connect->error;
}
}
//$query = 'INSERT INTO activities VALUES ('Climb a tree', 11, 3)';
//$result = mysqli_query($connect, $query);


?>

<p><a href="generate-activity.php">Generate a Wholesome Activity!</a></p>
<p><a href="show-activities.php">See all Wholesome Activities!</a></p>

</table>
</body>
</html>
