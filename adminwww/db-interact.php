<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>

<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<head><title>DELETE FROM MYSQL DATABASE:</title>
<p>You can delete content from the database by typing MYSQL commands into the textbox and pressing the "Run Query" button. </p>
<p><a href="https://www.w3schools.com/mysql/mysql_delete.asp">Here is a guide to deleting in MYSQL.</a></p>
<p> Example Query: DELETE FROM activities WHERE Rating = 0</p>
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
<h1>DELETE FROM MYSQL DATABASE:</h1>


<div>
      
    <form action ="" method = "post">
          <input type = "text" name="sqlQuery" maxlength="100" size = "100%"/>
          <input type = "submit" name="submit" value = "Run Query" />
    </form>

    </div>
<br></br>


<p>Showing Database:</p>
<table border="1">
<tr><th>Activity</th><th>Rating</th><th>Times Rated</th><th>Average Rating</th></tr>

<?php

//connect to database
$DB_HOST = '192.168.56.12';
$DB_USER = 'root';
$DB_PWD = 'root';
$DB_NAME = 'webdatabase';
$connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])){
  $newQuery = $_POST['sqlQuery'];
}
  //if query is not empty
if($newQuery != ""){
  if (strpos($newQuery, "DELETE") !== false) {
     // if query contains delete
   
    if ($connect->query($newQuery) === TRUE) {
      echo "Query executed.";
        
    } else {

      echo "Error: " . $newQuery . "<br>" . $connect->error;
    }

  } else{ //if query does not contain 'DELETE'

    echo "Make sure your query contains 'DELETE'";
  }
  
  }else { // if query is empty

    echo "Make sure you enter a MYSQL query";

}

  $query = 'SELECT * FROM activities';
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result)<1){
    echo 'empty';
  }

if(mysqli_num_rows($result)<1){
  echo 'empty';
}

while ($record = mysqli_fetch_assoc($result)){
  echo "<tr><td>".$record["activity"]."</td><td>".$record["rating"]."</td><td>".$record["timesRated"]."</td><td>".$record["averageRating"]."</td></tr>\n";
}


?>



</table>
</body>
<?php include 'footer.php' ?>
</html>
