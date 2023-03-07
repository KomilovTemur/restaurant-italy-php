<?php
if (!empty($_POST)) {
	$date = $_POST['date'];
	$time = $_POST['time'];
	$guests = $_POST['guests'];
	$additional = $_POST['additional'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=restaurant", 'root', '');
		$sql = "INSERT INTO reserve (date, time, guests, additional, name, email, phone) VALUES ('$date', '$time', '$guests', '$additional', '$name', '$email', '$phone')";
		$query = $pdo->prepare($sql);
		$query->execute();
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}
?>