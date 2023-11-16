<?php

if (isset($_REQUEST['login'])) {
    require_once "views/frontend/customer-login.php";
}

if (isset($_REQUEST['logout'])) {
    unset( $_SESSION['iscustom']);
    unset( $_SESSION['user_id']);
    unset( $_SESSION['name']);
    header('location:index.php');
}

if (isset($_REQUEST['register'])) {
    require_once "views/frontend/customer-register.php";
}

if (isset($_REQUEST['register'])) {
    unset( $_SESSION['iscustom']);
    unset( $_SESSION['user_id']);
    unset( $_SESSION['name']);
    header('location:index.php');
}