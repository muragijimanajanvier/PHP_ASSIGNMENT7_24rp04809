<?php
// google_mock.php
require 'config.php';

// This is a MOCK. In real apps you'd use Google API flow.
$mockGoogleUser = [
    'google_id' => 'google_'.uniqid(),
    'username' => 'guser'.rand(100,999),
    'email' => 'guser'.rand(100,999).'@gmail.com'
];

// OPTIONAL: If you want deterministic test email, set a fixed email:
// $mockGoogleUser['email'] = 'testgoogle@example.com';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
$stmt->execute(['email'=>$mockGoogleUser['email']]);
$user = $stmt->fetch();

if ($user) {
    // link google id if not linked
    if (empty($user['google_id'])) {
        $upd = $pdo->prepare("UPDATE users SET google_id = :gid WHERE id = :id");
        $upd->execute(['gid'=>$mockGoogleUser['google_id'], 'id'=>$user['id']]);
    }
    $u = $user;
} else {
    // create a new user (no password)
    $ins = $pdo->prepare("INSERT INTO users (username, email, google_id) VALUES (:u, :e, :g)");
    $ins->execute(['u'=>$mockGoogleUser['username'], 'e'=>$mockGoogleUser['email'], 'g'=>$mockGoogleUser['google_id']]);
    $id = $pdo->lastInsertId();
    $u = ['id'=>$id, 'username'=>$mockGoogleUser['username'], 'email'=>$mockGoogleUser['email']];
}

$_SESSION['user'] = ['id'=>$u['id'], 'username'=>$u['username'], 'email'=>$u['email']];
header('Location: dashboard.php');
exit;
