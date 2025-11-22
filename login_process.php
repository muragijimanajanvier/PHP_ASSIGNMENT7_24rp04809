<?php
// login_process.php
require 'config.php';

$identifier = trim($_POST['identifier'] ?? '');
$password = $_POST['password'] ?? '';

if ($identifier === '' || $password === '') {
    $_SESSION['flash'] = "Empty fields. Fill both identifier and password.";
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :id OR username = :id LIMIT 1");
$stmt->execute(['id'=>$identifier]);
$user = $stmt->fetch();

if (!$user) {
    $_SESSION['flash'] = "Account not found.";
    header('Location: login.php');
    exit;
}

if (empty($user['password'])) {
    // account created with Google mock and no password set
    $_SESSION['flash'] = "Please login with Google or reset password.";
    header('Location: login.php');
    exit;
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['flash'] = "Wrong password.";
    header('Location: login.php');
    exit;
}

// success
$_SESSION['user'] = ['id'=>$user['id'], 'username'=>$user['username'], 'email'=>$user['email']];
header('Location: dashboard1.php');
exit;
