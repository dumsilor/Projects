<?php
	session_start();
	require_once "pdo.php";
	$sql = "SELECT * FROM routers";
	$stmt = $pdo->query($sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Device Simple Info</title>
	<link rel="stylesheet" href="css/main.css">

</head>

<body>
	<header>
		<a href ="router.php">PoP Router</a>
		<a href ="switch.php">PoP Switch</a>
		<a href = "cpe.php">CPE</a>
	</header>
<h1>Intercloud Device Info</h1>
<a href = "index.php">Go Back</a>
<table border=2px>
<thead>
<tr>
		<th>
		 Router Name
		</th><th>
		IP address
		</th><th>
		Vendor
		</th><th>
		Device Model
		</th><th>
		OS Version
		</th>
		</tr>
</thead>

<?php
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		echo("<tr><td>");
		echo("<a href ='http://".$row['loopback_ip_add']."'>".htmlentities($row['name'])."</a>");
		echo("</td><td>");
		echo(htmlentities($row['loopback_ip_add']));
		echo("</td><td>");
		echo(htmlentities($row['vendor']));
		echo("</td><td>");
		echo(htmlentities($row['device_model']));
		echo("</td><td>");
		echo(htmlentities($row['OS_version']));
		echo("</td></tr>");

	}
?>
</table>
</body>
</html>
