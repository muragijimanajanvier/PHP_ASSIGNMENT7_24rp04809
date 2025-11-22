
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
<title>Friends — MyFB</title>
<link rel="stylesheet" href="fb_home.css">
</head>
<body>

<!-- TOP NAV BAR -->
<div class="fb-navbar">
    <div class="nav-left">
        <span class="logo">facebook</span>

        <!-- SEARCH BAR -->
        <form action="search.php" method="GET" style="display:flex;">
            <input type="text" name="q" class="search" placeholder="Search people..." required>
            <button type="submit" style="display:none;"></button>
        </form>
    </div>

    <div class="nav-center">
        <a href="dashboard1.php" class="nav-icon">🏠</a>
        <a href="friends.php" class="nav-icon active">👥</a>
        <a href="profile.php" class="nav-icon">👤</a>
        <a href="#" class="nav-icon">🔔</a>
        <a href="#" class="nav-icon">☰</a>
    </div>

    <div class="nav-right">
        <span class="user-circle"><?= strtoupper($user['username'][0]) ?></span>
        <span class="username"><?= htmlspecialchars($user['username']) ?></span>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<!-- MAIN LAYOUT -->
<div class="fb-layout">

    <!-- LEFT SIDEBAR -->
    <div class="left-sidebar">
        <div class="side-item"><a href="profile.php" style="text-decoration: none;">👤 Profile</a></div>
        <div class="side-item"><a href="friends.php" class="active" style="text-decorationnone">👥 Friends</a></div>
        <div class="side-item">✔️ Confirm</div>
        <div class="side-item">⏳ Memories</div>
        <div class="side-item">🛒 Marketplace</div>
        <div class="side-item">🎮 Gaming</div>
        <div class="side-item"><a href="manager_dashboard.php">📚 CRUD</a></div>
    </div>

    <!-- CENTER FEED -->
    <div class="center-feed">

        <h2>Your Friends</h2>
        <hr>

        <div class="post">🟢 John Doe</div>
        <div class="post">🟢 Alice Uwase</div>
        <div class="post">🟢 Eric Mugisha</div>
        <div class="post">🟢 Peace Iradukunda</div>
        <div class="post">🟢 David Hirwa</div>

    </div>

    <!-- RIGHT SIDEBAR -->
    <div class="right-sidebar">
        <h3>Contacts</h3>
        <div class="contact">🟢 Friend 1</div>
        <div class="contact">🟢 Friend 2</div>
        <div class="contact">🟢 Friend 3</div>
    </div>

</div>

</body>
</html>
