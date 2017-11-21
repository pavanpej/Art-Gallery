<?php
	require_once 'config.php';
	session_start();

	$username = $artid = $quantity = '';
	$username = $_POST['username'];
	$artid = $_POST['art_id'];
	$quantity = $_POST["quantity"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bought</title>
	<link href="style/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style/otherstyle.css">
</head>
<body class="jumbotron">

	<div class="text-center display-4 lead">
		<?php
			if (isset($quantity) && $quantity !=0) {

				$sql = "SELECT id FROM customer WHERE username='$username';";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_assoc($result);
				$id = $row['id'];

				// echo "UID: ". $id ."<br>";
				// echo "Username: ". ucfirst($username) ."<br>";

				$sql = "CALL update_count('$id','$artid','$quantity');";
				$result = mysqli_query($link, $sql);

				echo "Congratulations, <strong>" . ucfirst($username) ."</strong><br>
				You've bought <strong>". $quantity ."</strong> art piece(s).<br>";
			}
			else{
				echo "Quantity can't be 0!!!<br>";
			}

		?>
		
		<a href="home.php" class="btn btn-secondary">Back to Home</a>
	</div>

</body>
</html>