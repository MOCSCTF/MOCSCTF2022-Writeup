<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account</title>
</head>

<body>
  <p>
	<input type="text" name="PIN" placeholder="PIN" />
  </p>
  <a href='pin.php'>
  	<button>Submit</button>
  </a>

<?php
$flag = "MOCSCTF{c2we8023xc88ew23dx54fdg56sdg5b_Thanks_BoardWare}";

if (isset($_GET['PIN'])) {
  	if (!is_numeric($_GET["PIN"])) {
  	    if($_GET["PIN"] == 123456) {
  	        echo "<br><p>$flag</p>";
  	    }
  	    echo "<br><p>Wrong PIN.</p>";
  	    echo "<br><h2>Get out, bad hacker!</h2>";
  	}
  	else {
  	    echo "<br><p>PIN is not numeric.</p>";
  	    echo "<br><h2>Get out, bad hacker!</h2>";
  	}
}
else {
	echo "<br><p>PIN is 123456</p>";
}
?>
</body>
</html>