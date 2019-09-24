<?php
require_once 'db.php';
$data = $_POST;
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<div class="user_panel">
	<form action="index.php" method="POST">
		<button name="logout" class="logout">Logout</button>
	</form>
</div>
</body>
</html>
<?php echo $_SESSION['logged_user']->login;?>
<?php
#var_dump($_SESSION['logged_user']);
if (isset($data['logout'])) {
	unset($_SESSION['logged_user']);
}