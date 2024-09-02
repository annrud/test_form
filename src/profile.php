<?php
session_start();

require_once 'include/common.php';
require_once 'include/database.php';

if (!isset($_SESSION['userId'])) {
    header('Location: index.php');
}

$title = 'Профиль';
$active = 'profile';
$errors = [];

if (!empty($_POST)) {
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']);
        $repeatPassword = md5($_POST['repeat_password']);
        if ($password != $repeatPassword) {
            $errors['password'] = 'Пароли не совпадают!';
        }
    }

    if (!isUserUnique($login, $phone, $email, $_SESSION['userId'])) {
        $errors['login'] = $errors['phone'] = $errors['email'] = 'Пользователь с такими данными уже существует';
    }
    if (empty($errors)) {
        updateUser($_SESSION['userId'], $login, $phone, $email, $password ?? null);
    }
}

$user = getUser($_SESSION['userId']);
global $conn;
$conn->close();
if (empty($user)) {
    unset($_SESSION['userId']);
    header('Location: index.php');
}

$template = 'templates/profile.php';

include 'templates/base.php';
