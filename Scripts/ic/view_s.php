<?php
  require_once "pdo.php";
  session_start();
  $_SESSION['page'] ="switch";
  $sql = "SELECT * FROM switches ORDER BY switch_name ASC";
  $stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title> Switch details </title>
  <link rel="stylesheet" href="css/main.css">

</head>
<body>

<header>
		<a href ="view.php">PoP Router</a>
		<a href ="view_s.php">PoP Switch</a>
		<a href = "cpe.php">CPE</a>
    <a href = "hash.php">Hash Password</a>
  <?php
  if ($_SESSION['logged_in']){


  } else {
    echo ("<p style='color:red'>ACCESS DENIED!</p><span>Please Log in to view this page</span>");
    die;
  }
?>

<h1>InterCloud Switch Database</h1>
<a href = "add.php">Add New Entry</a>
<a href = "logout.php">Logout</a>
</script>
<?php
if (isset($_SESSION['success'])) {
  echo("<p style='color:green'>".$_SESSION['success']."</p>");
  unset($_SESSION['success']);
}
?>
<table border=2px>
<thead>
<tr>
		<th>
		 Router Name
		</th><th>
      Management IP
    </th><th>
      VLAN Range
    </th><th>
		Vendor
		</th><th>
		Device Model
    </th><th>
		OS Version
  </th><th>
    Username
  </th><th>
    Password
    </th><th>

  </th>
		</tr>
</thead>

<?php
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rid = $row['switch_id'];
		echo("<tr><td>");
		echo("<a target='_blank' href ='http://".$row['switch_ip']."'>".htmlentities($row['switch_name'])."</a>");
		echo("</td><td>");
    echo(htmlentities($row['switch_ip']));
		echo("</td><td>");
    echo(htmlentities($row['vlan_range']));
    echo("</td><td>");
		echo(htmlentities($row['vendor']));
		echo("</td><td>");
		echo(htmlentities($row['model']));
		echo("</td><td>");
		echo(htmlentities($row['os_version']));
		echo("</td><td>");
    echo(htmlentities($row['username']));
		echo("</td><td>");
  //  echo("<input type='submit' value='show' id = 'show' onclick='hide();'style='visibility:visible'/>" );
    //echo("<p  id ='password'></p>");
    echo(htmlentities($row['pass']));
		echo("</td><td>");
    echo('<p><a href = "edit.php?router_id='.$rid.'">Edit<a>/<a href = "delete.php?router_id='.$rid.'">Delete</a></p>');
    echo("</td></tr>");

    //echo("<script>
    //function hide() {
      //document.getElementById('password').innerHTML = ".htmlentities($row['pass']).";
      //document.getElementById('show').style.visibility = hidden;
  //  }
    //</script>");

	}
?>

</table>
