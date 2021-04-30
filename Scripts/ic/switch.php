<?php
	session_start();
	require_once "pdo.php";
	$sql = "SELECT * FROM switches";
	$stmt = $pdo->query($sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Switch Simple Info</title>
	<link rel="stylesheet" href="css/main.css">

</head>

<body>
	<header>
		<a href ="router.php">PoP Router</a>
		<a href ="switch.php">PoP Switch</a>
		<a href = "cpe.php">CPE</a>
	</header>
<h1>Intercloud Switch Info</h1>
<a href = "index.php">Go Back</a>
<table border=2px>
<thead>
<tr>
		<th>
		 Switch Name
		</th><th>
		Switch IP
		</th><th>
		VLAN Range
		</th><th>
		Vendor
		</th><th>
		Model
		</th>
		</tr>
</thead>

<?php
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		echo("<tr><td>");
		echo("<a href ='http://".$row['switch_ip']."'>".htmlentities($row['switch_name'])."</a>");
		echo("</td><td>");
		echo(htmlentities($row['switch_ip']));
		echo("</td><td>");
		echo(htmlentities($row['vlan_range']));
		echo("</td><td>");
		echo(htmlentities($row['vendor']));
		echo("</td><td>");
		echo(htmlentities($row['model']));
		echo("</td></tr>");

	}
?>
</table>
</body>
</html>
