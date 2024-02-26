<?php
	$email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);

	$password = md5($password."ghlwngklwJ1337");

	$mysql = new mysqli('localhost','root','','register-db');

	$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	$user = $result->fetch_assoc();

	setcookie('user', $user['email'], time() + 3600, "/");

	$mysql->close();

	header('Location: ../Logged page.html');
?>