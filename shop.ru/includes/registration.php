<?php
require 'db.php';  
R::setup( 'mysql:host=127.0.0.1;dbname=shop',
        'root', '' );
$data = $_POST;
$errors = [];
if ($data['doGo']) {
    if ($data['email'] == "") {
        $errors[] = "Введите email";
    }
    if ($data['login'] == "") {
        $errors[] = "Введите логин";
    }
    if ($data['password'] == "") {
        $errors[] = "Введите пароль";
    }
    if ($data['password2'] == "") {
        $errors[] = "Введите повторный пароль";
    }
    if ($data['password'] == $data['password2']) {
        $errors[] = "Пароли не совпадают";
    }
    if (empty($errors)) {
        $user = R::dispense('user');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        R::Store($user);
    }
    else {
        echo '<div class=error>'.array_shift($errors).'</div>';
    }
}
?>