<?php
  require_once "pdo.php";
  session_start();
  $_SESSION['page'] ="router";
  $sql = "SELECT * FROM routers ORDER BY name ASC";
  $stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title> Device details </title>
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

<h1>InterCloud Device Database</h1>
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
      Loopback
    </th><th>
      Location
    </th><th>
		Vendor
		</th><th>
		Device Model
		</th><th>
      Number of Gigabyte Port
  	</th><th>
      Number of SFP
  	</th><th>
      Last Changed
  	</th><th>
      Last Backup
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
    $rid = $row['router_id'];
		echo("<tr><td>");
		echo("<a target='_blank' href ='http://".$row['loopback_ip_add']."'>".htmlentities($row['name'])."</a>");
		echo("</td><td>");
    echo(htmlentities($row['loopback_ip_add']));
		echo("</td><td>");
    echo(htmlentities($row['location']));
		echo("</td><td>");
		echo(htmlentities($row['vendor']));
		echo("</td><td>");
		echo(htmlentities($row['device_model']));
		echo("</td><td>");
    echo(htmlentities($row['number_of_port']));
		echo("</td><td>");
    echo(htmlentities($row['number_of_sfp']));
		echo("</td><td>");
    echo(htmlentities($row['last_changed']));
		echo("</td><td>");
    echo(htmlentities($row['last_backup']));
		echo("</td><td>");
		echo(htmlentities($row['OS_version']));
		echo("</td><td>");
    echo(htmlentities($row['user']));
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
