<?php
session_start();

if (isset($_SESSION['userId'])) {
    $location = 'Location: profile.php';
} else {
    $location = 'Location: login.php';
}

header($location);
