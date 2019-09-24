<?php
require 'db.php';
$errors = [];
$data = $_POST;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="reg_body">
	<div class="Registration">
		<div class="reg_bar"><p class="par">Login</p></div>
		<form action="Login.php" method="post">
			<div class="form">
			    <input class="input" type="text" name="login" placeholder="Логин"></br>
			    <input class="input" type="password" name="password" placeholder="Пароль"></br>
			    <button class="button" name="Ent">Войти</button>
			</div>
	    </form>
	</div>
<?php
if (isset($data['Ent'])) {
	if ($data['login'] == ''){
		$errors[0] = "Введите логин";
		echo '<div class = "log_error">'.array_shift($errors).'</div>';
		exit();
	}
	if ($data['password'] == ''){
		$errors[0] = "Введите пароль";
		echo '<div class = "log_error">'.array_shift($errors).'</div>';
		exit();
	}
	$user = R::findOne('user', "login = ?", array($data['login']));
	if ($user) {
		if ($data['password'] == $user->password) {
			$_SESSION['logged_user'] = $user;
			echo '<div class="enter">'.'Вход выполнен'.'</div>';?>
			<script>
				location.replace("index.php");
            </script>
<?php		}else {
			$errors[0] = "Неверный пароль";
		}	
	}else{
		$errors[0] = "Такого пользователя нет";}
}
if (!empty($errors)) {
	echo '<div class = "log_error">'.array_shift($errors).'</div>';
}
?>
<?php echo $_SESSION['logged_user']->login;?>
</body>
</html>