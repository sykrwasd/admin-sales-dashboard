<?php

session_start();
require_once '../config/connectdb.php'; // to embed php code from config.php, if not found->error

// Run only when registration form is submitted
if (isset($_POST['register'])) {
    // Retrieve inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check if email already exist
    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    // '->' Refer to dotted (.) in java, like 'checkEmail.numRows'
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    }
    else {
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header("Location: ../index.php");
    exit();

}

// Run only when login form is submitted
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Now $user will holds the data of the user
        if (password_verify($password, $user["password"])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: ../pages/admin_page/dashboard.php");
            }
            else {
                header("Location: ../pages/user_page/college.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: ../index.php");
    exit();
}

?>