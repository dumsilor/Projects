<?php
session_start();
require_once "pdo.php";


if (!  $_SESSION['logged_in']){
  echo("ACCESS DENIED!");
  die;
  return;
}


if (isset($_POST['no']))
{
  header("Location: view.php");
  return;
}

if (isset($_POST['yes']))
{
  $sql = "DELETE FROM routers WHERE router_id=".$_GET['router_id'];
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $_SESSION['success'] = "Entry removed successfully";
 header("Location: view.php");
 return;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Entry</title>
<link rel="stylesheet" href="css/main.css">

</head>
<body>
  <p>Do you want to delete entry?</p>
  <form method="post">
    <input type="submit" name="yes" value="Yes"/>
    <input type="submit" name="no" value="No"/>
  </form>
</body>
</html>
