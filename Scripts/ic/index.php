<?php
  session_start();
  require_once "pdo.php";
  require_once "pdo_user.php";
  $_SESSION['logged_in'] = False;

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $salt = "InterCloud";
    $pass = hash("md5",$salt.$_POST['password']);

    $sql = "SELECT * FROM db_users";
    $stmt = $pdo->query($sql);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      if ($_POST['name']===$row['username'] && $pass===$row['password']){
        $_SESSION['success'] = "Login Successfully!";
        $_SESSION['name'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['logged_in'] = True;
        header("Location: view.php");
        return;
      } else {
        $_SESSION['error'] = "Wrong Username or Password!";
        header("Location:index.php");
        return;
      }
    }
  }
 ?>


<!DOCTYPE html>
<html>
<head>
<title>InterCloud Database</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
<h1>InterCloud Database</h1>
</header>
<?php
if (isset($_SESSION['error'])) {
  echo("<p style='color: red'>".$_SESSION['error']."</p>\n");
  unset($_SESSION['error']);
}
?>
<p>Click <a href = "router.php">here </a> for Simple Info view.</p>
<p>Log in for Extended view.</p>
<form method="post">
<p>Username:<input type="text" name="name"></p>
<p>Password:<input type="password" name="password"></p>
<input type="submit" value="Login"/>
</form>
</body>
</html>
