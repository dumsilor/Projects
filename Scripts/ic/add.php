<?php

require_once "pdo.php";
session_start();
if (!  $_SESSION['logged_in']){
  echo("ACCESS DENIED!");
  die;
}

if (isset($_POST['cancel']))
{
  if($_SESSION['page'] ==="router") {
  header("Location: view.php");
  return;
} elseif($_SESSION['page'] ==="switch") {
    header("Location: view_s.php");
    return;
  } else {
    header("Location: view_cpe.php");
    return;
  }
}

if (isset($_POST['add'])) {

  if($_SESSION['page'] ==="router") {
    $sql = "INSERT INTO routers(name,loopback_ip_add,location,vendor,device_model,number_of_port,number_of_sfp, last_changed,last_backup,OS_version, user, pass) VALUES
    (:name, :lo, :loc, :vendor, :model, :gport, :sfp, :change, :backup, :os, :user, :pass)";
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
 $_SESSION['success'] = "Router info added successfully";
 header("Location: view.php");
 return;
} elseif($_SESSION['page'] ==="switch"){
  $sql = "INSERT INTO switches (switch_name, switch_ip, vlan_range,vendor,model,os_version,username,pass)
          VALUES (:name, :lo, :vlan, :vendor, :model, :os, :user, :pass)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
            ":name" => $_POST['name'],
            ":lo" => $_POST['lo'],
            ":vlan" => $_POST['vlan'],
            ":vendor" => $_POST['vendor'],
            ':model' => $_POST['model'],
            ':os'=> $_POST['os'],
            ':user' => $_POST['user'],
            ':pass' => $_POST['pass']

       ));

       $_SESSION['success'] = "Switch info added successfully";
       header("Location: view_s.php");
}

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>New Device</title>
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
  <h1>Add New Router Entry</h1>
  <form method="post">
    <p>Name:<input type="text" name="name"></p>
    <p>IP: <input type="text" name="lo"></p>
    <?php if($_SESSION['page'] ==="router") { ?> <p>Location: <input type="text" name="loc"></p> <?php }?>
    <?php if($_SESSION['page'] ==="switch") { ?> <p>Vlan Range: <input type="text" name="vlan"></p> <?php }?>
    <p>Vendor: <input type="text" name="vendor"></p>
    <p>Model: <input type="text" name="model"></p>
    <?php if($_SESSION['page'] ==="router") { ?><p>Gigabyte Port: <input type="text" name="gport"></p><?php }?>
    <?php if($_SESSION['page'] ==="router") { ?><p>SFP Port: <input type="text" name="sfp"></p><?php }?>
    <?php if($_SESSION['page'] ==="router") { ?><p>Last Device Change date: <input type="text" name="change"></p><?php }?>
    <?php if($_SESSION['page'] ==="router") { ?><p>Last Backed Up date: <input type="text" name="backup"></p><?php }?>
    <p>OS Version: <input type="text" name="os"></p>
    <p>Username: <input type="text" name="user"></p>
    <p>Password: <input type="text" name="pass"></p>
    <input type="submit" name="add" value="add"/>
    <input type="submit" name="cancel" value="cancel"/>
  </form>
</body>
</html>
