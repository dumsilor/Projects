<!DOCTYPE html>
<html>
<head>
  <script>
  function check () {
    document.getElementById('change').innerHTML  = <?= $en ?>;
  }
</script>
<h3> Password Converter </h3>
<p>Please enter your password below for hash conversion:
<form method="post">
  <p>password: <input type="text" name="password" onclick = "return check();"></p>
  <input type="submit" value="submit">
</form>

<?php
if ( isset($_POST['password'])) {
  $salt ="InterCloud";
  $pass = $_POST['password'];
  $en = hash("md5",$pass.$salt);
  echo ("<p>Your Hash: ". $en."</p>\n");
} else {
  echo("<p>No Password given yet!</p>\n");
}
?>
</body>
</html>
