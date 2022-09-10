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

<head><title>ADMIN Home</title>
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
<h1>Wholesome Activities:</h1>

<p><a href="http://192.168.56.11">Go to regular website.</a></p>

<p><a href="db-interact.php">Modify the database.</a></p>

</body>
<?php include 'footer.php' ?>
</html>