<?php
session_start();

require_once 'include/common.php';
require_once 'include/database.php';

if (isset($_SESSION['userId'])) {
    header('Location: profile.php');
}

$title = 'Регистрация';
$active = 'register';
$errors = [];

if (!empty($_POST)) {
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $repeatPassword = md5($_POST['repeat_password']);
    if ($password != $repeatPassword) {
        $errors['password'] = 'Пароли не совпадают!';
    }
    if (!isUserUnique($login, $phone, $email)) {
        $errors['login'] = $errors['phone'] = $errors['email'] = 'Пользователь с такими данными уже существует';
    }
    if (empty($errors)) {
        $userId = createUser($login, $phone, $email, $password);
        $_SESSION['userId'] = $userId;
        header('Location: /');
    }
}

global $conn;
$conn->close();

$template = 'templates/register.php';

include 'templates/base.php';
