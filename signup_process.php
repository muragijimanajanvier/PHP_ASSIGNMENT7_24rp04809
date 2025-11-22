
<?php
// signup_process.php
require 'config.php';

// clear old
unset($_SESSION['old']);

// get and trim
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

$_SESSION['old'] = ['username' => $username, 'email' => $email];

$errors = [];

// validations
if ($username === '') $errors[] = "Username is required.";
if ($email === '') $errors[] = "Email is required.";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";

if ($password === '') $errors[] = "Password is required.";
elseif (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";

if ($password !== $confirm) $errors[] = "Passwords do not match.";

if (!empty($errors)) {
    $_SESSION['flash'] = implode(' ', $errors);
    header('Location: signup.php');
    exit;
}

// check UNIQUE EMAIL ONLY
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
$stmt->execute(['email' => $email]);

if ($stmt->fetch()) {
    $_SESSION['flash'] = "This email is already registered.";
    header('Location: signup.php');
    exit;
}

// store user
$hash = password_hash($password, PASSWORD_DEFAULT);

$insert = $pdo->prepare("INSERT INTO users (username, email, password) 
                         VALUES (:u, :e, :p)");
$insert->execute(['u' => $username, 'e' => $email, 'p' => $hash]);

// cleanup
unset($_SESSION['old']);

// redirect to login (NO auto login)
$_SESSION['flash'] = "Account created successfully. Please log in.";
header('Location: login.php');
exit;
