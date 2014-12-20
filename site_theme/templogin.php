<?php
global $pdo;
  include_once("database.inc");

  $username = $_POST['username'];
  $password_sha1 = sha1($_POST['password']);

  $sql = "SELECT username 
  FROM user 
  WHERE username=:u AND password_sha1=:p";
  global $sql;
  $stmt = $PDO::prepare($sql);
  $stmt->execute(array(
            ":u"=>$username,
            ":p"=>$password_sha1
          ));
  $row = $stmt->fetch();

  // clear out any existing session that may exist
  session_start();
  session_destroy();
  session_start();

  if ($row) {
    $_SESSION['signed_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: /dashboard.php");
  } else {
    $_SESSION['flash_error'] = "Invalid username or password";
    $_SESSION['signed_in'] = false;
    $_SESSION['username'] = null;
    header("Location: /index.php");
  }
?>









<html>
<body>
<form method="post" action="_signin.php">
<label for="username">Username</label>
  <input type="text" name="username">
<label for="password">Password</label>
  <input type="password" name="password">
  <input type="submit" value="Sign in">
</form>
</body>
</html>