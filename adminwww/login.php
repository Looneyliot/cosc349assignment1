<?php
//A session is a way to store information (in variables) to be used across multiple pages.
//Session variables are set with the PHP global variable: $_SESSION.
session_start();

$DB_HOST = '192.168.56.12';
$DB_USER = 'root';
$DB_PWD = 'root';
$DB_NAME = 'webdatabase';
$connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if username and password entered
if ( !isset($_POST['username'], $_POST['password']) ) {
	
	exit('Username and Password required.');
}


if ($stmt = $connect->prepare('SELECT passwd FROM admin WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    
    
    if ($stmt->num_rows > 0) { // Account exists
        $stmt->bind_result($password);
        $stmt->fetch();
        //if password matches
        if ($_POST['password'] == $password) {
            session_regenerate_id();
            $connect->close();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            header('location: home.php');
        } else {
            // Incorrect password
            $connect->close();
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        
        $connect->close();
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();
}
?>