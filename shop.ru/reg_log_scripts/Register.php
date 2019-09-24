<?php
require 'db.php';  
$data = $_POST;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="reg_body">
	<div class="Registration">
		<div class="reg_bar"><p class="par">Registration</p></div>
		<form action="register.php" method="post">
			<div class="form">
				<input class="input" type="email" name="email" placeholder="Почта" value="<?php echo @$data['email']; ?>"></br>
			    <input class="input" type="text" name="login" placeholder="Логин" value="<?php echo @$data['login']; ?>"></br>
			    <input class="input" type="password" name="password" placeholder="Пароль"></br>
			    <input class="input" type="password" name="password2" placeholder="Введите пароль еще раз"></br>
			    <button class="button" name="doGo">Зарегистрироваться</button>
			</div>
	    </form>
	</div>
<?php
$errors = [];
if (isset($data['doGo'])) {
    if ($data['email'] == "") {
        $errors[] = "Введите email";
    }
    if (R::count( 'user', "email = ?", array($data['email'],)) > 0) {
		$errors[] = "Данный email занят";
	}     
    if ($data['login'] == "") {
        $errors[] = "Введите логин";
    }
	if (R::count( 'user', "login = ?", array($data['login'],)) > 0) {
		$errors[] = "Данный логин занят";
	}
    if ($data['password'] == "") {
        $errors[] = "Введите пароль";
    }
    if ($data['password2'] == "") {
        $errors[] = "Введите повторный пароль";
    }
    if ($data['password'] != $data['password2']) {
        $errors[] = "Пароли не совпадают";
    }
    if (empty($errors)) {
        $user = R::dispense('user');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        R::store($user);
        echo '<div class="warn suc">Вы успешно зарегистрированы!</div>';?>
        <script>
				location.replace("index.php");
        </script>
<?php
	}else {
        echo '<div class="warn error">'.array_shift($errors).'</div>';
    }
}
?>

</body>
</html>