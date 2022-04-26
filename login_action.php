<?php
session_start();

include 'connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha = $_POST["captcha"];

    if (empty($captcha)) {
        echo "Please enter the captcha";

    } elseif ($_SESSION[$_COOKIE['PHPSESSID']] == $captcha) {

        $email_query = "select * from user where email='$email' ";
        $query = mysqli_query($conn, $email_query);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $fetch_data = mysqli_fetch_assoc($query);
            $db_pass = $fetch_data['password'];
            $verify_password = password_verify($password, $db_pass);
            if ($verify_password) {
                header('Location:dashboard.php');
                unset($_SESSION[$_COOKIE['PHPSESSID']]);

            } else {
                echo "Incorret Password";
            }
        } else {
            echo "Invalid Email ID";
        }
    } else {
        echo "Captcha is invalid.";
    }
}
