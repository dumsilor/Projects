<?php
require_once "pdo.php";
session_start();
if (!  $_SESSION['logged_in']){
  echo("ACCESS DENIED!");
  die;
}

if (isset($_POST['cancel']))
{
  header("Location: view.php");
  return;
}

$sql_update = "SELECT * FROM routers WHERE router_id=".$_GET['router_id'];
$statement = $pdo->query($sql_update);
$row = $statement->fetch(PDO::FETCH_ASSOC);
$rname=$row['name'];
$lo=$row['loopback_ip_add'];
$loc=$row['location'];
$vendor=$row['vendor'];
$model=$row['device_model'];
$gport=$row['number_of_port'];
$sfp=$row['number_of_sfp'];
$change=$row['last_changed'];
$backup=$row['last_backup'];
$os=$row['OS_version'];
$user = $row['user'];
$pass = $row['pass'];

if (isset($_POST['update'])) {


    $sql = "UPDATE routers SET name =:name ,loopback_ip_add = :lo, location = :loc, vendor=:vendor ,device_model=:model,
    number_of_port=:gport,number_of_sfp=:sfp, last_changed=:change,last_backup=:backup,OS_version=:os, user = :user, pass = :pass WHERE router_id =".$_GET['router_id'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ":name" => $_POST['name'],
      ":lo" => $_POST['lo'],
      ":loc" => $_POST['loc'],
      ":vendor" => $_POST['vendor'],
      ':model' => $_POST['model'],
      ':gport' => $_POST['gport'],
      ':sfp' => $_POST['sfp'],
      ':change' => $_POST['change'],
      ':backup' => $_POST['backup'],
      ':os'=> $_POST['os'],
      ':user' => $_POST['user'],
      ':pass' => $_POST['pass']

 ));
 $_SESSION['success'] = "Router info updated successfully";
 header("Location: view.php");
 return;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit entry</title>
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
  <h1>Edit Router Information</h1>
  <form method="post">
    <p>Name:<input type="text" name="name" value = "<?= $rname ?>"></p>
    <p>Loopback IP: <input type="text" name="lo" value = "<?= $lo ?>"></p>
    <p>Location: <input type="text" name="loc" value = "<?= $loc ?>"></p>
    <p>Vendor: <input type="text" name="vendor" value = "<?= $vendor ?>"></p>
    <p>Model: <input type="text" name="model" value = "<?= $model ?>"></p>
    <p>Gigabyte Port: <input type="text" name="gport" value = "<?= $gport ?>"></p>
    <p>SFP Port: <input type="text" name="sfp" value = "<?= $sfp ?>"></p>
    <p>Last Device Change date: <input type="text" name="change" value = "<?= $change ?>"></p>
    <p>Last Backed Up date: <input type="text" name="backup" value = "<?= $backup ?>"></p>
    <p>OS Version: <input type="text" name="os" value = "<?= $os ?>"></p>
    <p>Username: <input type="text" name="user" value ="<?= $user ?>"></p>
    <p>Password: <input type="text" name="pass" value= "<?= $pass ?>"></p>
    <input type="submit" name="update" value="upate"/>
    <input type="submit" name="cancel" value="cancel"/>
</body>
