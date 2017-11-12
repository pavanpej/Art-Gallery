<?php
	require_once 'config.php';
	session_start();

	$username = $artid = $quantity = '';
	$username = $_POST['username'];
	$artid = $_POST['art_id'];
	$quantity = $_POST["quantity"];

	if (isset($quantity)) {

		$sql = "SELECT id FROM customer WHERE username='$username';";
		$result = mysqli_query($link, $sql);
    	$row = mysqli_fetch_assoc($result);
    	$id = $row['id'];

    	echo "UID: ". $id ."<br>";
    	echo "Username: ". ucfirst($username) ."<br>";

		$sql = "CALL update_count('$id','$artid','$quantity');";
		$result = mysqli_query($link, $sql);

		echo "You've bought ". $quantity ." art piece(s).<br>";
		echo '<a href="home.php">Back to home</a>';
	      
    }


?>