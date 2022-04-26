<?php
session_start();

include 'connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $_SESSION['username'] = $name;

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $emailquery = "select * from user where email='$email' ";
    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        $_SESSION['email_err'] = 'Email Already Exists';
        header('location:signup.php');

    } else {
        if ($password === $cpassword) {
            $insertdata = "insert into user (name,email,password) values('$name','$email','$pass')";
            $insertquery = mysqli_query($conn, $insertdata);
            header('location:login.php');

            if ($insertquery) {
                $_SESSION['status'] = 'Registration Successful';
                header('location:login.php');

            }
        } else {
            $_SESSION['pass_err'] = 'Confirm Password are not match with password';
            header('location:signup.php');
        }
    }

}
