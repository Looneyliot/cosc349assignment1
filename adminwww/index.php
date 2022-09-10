<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>ADMIN Login</title>
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
<h1>Wholesome Activities - Admin Access:</h1>

<form action ="login.php" method = "post">
          <label>Username:</label>
          <input type = "text" name="username" maxlength="10" id="username" required>
          <label>Password:</label>
          <input type = "password" name="password" maxlength="10" id="password" required/>
          <input type = "submit" name="submit" value = "Login" />
    </form>

<p><a href="http://192.168.56.11">Go to regular website.</a></p>
</body>
</html>
