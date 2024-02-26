<?php
	$name = filter_var(trim($_POST['name']),
	FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);

	if(mb_strlen($name) < 3 || mb_strlen($name) > 50){
		echo "Недопустимая длина имени";
		exit();
	}else if(mb_strlen($email) < 5 || mb_strlen($email) > 50){
		echo "Недопустимая длина почты";
		exit();
	}if(mb_strlen($password) < 4 || mb_strlen($password) > 20){
		echo "Недопустимая длина пароля";
		exit();
	}

	$password = md5($password."ghlwngklwJ1337");

	$mysql = new mysqli('localhost','root','','register-db');
	$mysql->query("INSERT INTO `users` (`name`, `email`, `password`)
	VALUES('$name', '$email', '$password')");

	$mysql->close();

	header('Location: ../Home page.html');

?>