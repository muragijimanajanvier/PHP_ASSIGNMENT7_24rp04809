
<?php
require 'config.php';
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile — MyFB</title>
<link rel="stylesheet" href="fb_home.css">
</head>
<body>

<div class="fb-navbar">
    <div class="nav-left">
        <span class="logo">facebook</span>
    </div>

    <div class="nav-center">
        <a href="dashboard1.php" class="nav-icon">🏠</a>
        <a href="friends.php" class="nav-icon">👥</a>
        <a href="profile.php" class="nav-icon active">👤</a>
    </div>

    <!-- ADDING BACK & LOGOUT -->
    <div class="nav-right">
        <a href="dashboard1.php" class="logout">⬅ Back</a>
        <a href="logout.php" class="logout" style="margin-left:10px;">Logout</a>
    </div>
</div>

<div class="fb-layout">
    <div class="center-feed">

        <div class="post">
            <h2>Profile</h2>
            <p><b>Username:</b> <?= htmlspecialchars($user['username']) ?></p>
            <p><b>Email:</b> <?= htmlspecialchars($user['email']) ?></p>
            <p><b>Account Status:</b> ✔ Confirmed</p>
        </div>

    </div>
</div>

</body>
</html>
