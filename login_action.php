<?php
session_start();

include 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha = $_POST["captcha"];

    if (empty($captcha)) {
        $_SESSION['empty_captcha'] = 'Please enter the captcha';
        header('location:login.php');
        die();

    } elseif ($_SESSION[$_COOKIE['PHPSESSID']] == $captcha) {

        $email_query = "select * from user where email='$email' ";
        $query = mysqli_query($conn, $email_query);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $fetch_data = mysqli_fetch_assoc($query);
            $db_pass = $fetch_data['password'];
            $verify_password = password_verify($password, $db_pass);
            if ($verify_password) {
                unset($_SESSION[$_COOKIE['PHPSESSID']]);
                header('Location:dashboard.php');
                die();
            } else {
                $_SESSION['incorrect_pass'] = "Incorret Password";
                header('location:login.php');
                die();
            }
        } else {
            $_SESSION['incorrect_email'] = "Invalid Email ID";
            header('location:login.php');
            die();
        }
    } else {
        $_SESSION['invalid_captcha'] = "Captcha is invalid.";
        header('location:login.php');
        die();
    }
}
