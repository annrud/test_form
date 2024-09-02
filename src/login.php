<?php
session_start();

require_once 'include/common.php';
require_once 'include/database.php';
require_once 'include/captcha.php';


$title = 'Вход';
$active = 'login';
$errors = [];

if (!empty($_POST)) {
    $token = $_POST['smart-token'];
    if (empty($token) || !check_captcha($token)) {
        $errors['captcha'] = 'Каптча не пройдена';
    } else {
        $phoneEmail = $_POST['phone_email'];
        $password = md5($_POST['password']);
        $userId = loginUser($phoneEmail, $password);
        if (empty($userId)) {
            $errors['phone_email'] = $errors['password'] = 'Данные для входа не верны';
        }
    }

    if (empty($errors)) {
        $_SESSION['userId'] = $userId;
        header('Location: profile.php');
    }
}

global $conn;
$conn->close();

$template = 'templates/login.php';

include 'templates/base.php';
