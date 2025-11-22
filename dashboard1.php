<?php
require 'config.php';

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Facebook Home — MyFB</title>
<link rel="stylesheet" href="fb_home.css">
</head>
<body>

<!-- TOP NAV BAR -->
<div class="fb-navbar">
    <div class="nav-left">
        <span class="logo">facebook</span>

        <!-- SEARCH BAR FIXED -->
     <div class="nav-left">
    

    <form action="search.php" method="GET" style="display:flex;">
        <input type="text" name="q" class="search" placeholder="Search Facebook..." required>
        <button type="submit" style="display:none;">ok</button>
    </form>
</div>

    </div>

    <div class="nav-center">
        <a href="dashboard1.php" class="nav-icon active">🏠</a>
        <a href="friends.php" class="nav-icon">👥</a>
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
        <div class="side-item"><a href="profile.php" style="text-decoration: none">👤 Profile</a></div>
        <div class="side-item"><a href="friends.php" style="text-decoration: none;"> 👥 Friends</a></div>
        <div class="side-item">✔️ Confirm</div>
        <div class="side-item">⏳ Memories</div>
        <div class="side-item">🛒 Marketplace</div>
        <div class="side-item">🎮 Gaming</div>
        <div class="side-item"><a href="manager_dashboard.php" style="text-decoration:none;background-color:;">📚 CRUD SYSTEM</a></div>
    </div>

    <!-- CENTER FEED -->
    <div class="center-feed">

        <!-- Stories Row -->
        <div class="stories">
            <div class="story-card">Your Story</div>
            <div class="story-card">Story 1 <img src="ok.AVIF" class="post-img"></div>
            <div class="story-card">Story 2 <img src="image.jpg" class="post-img"></div>
            <div class="story-card">Story 3 <img src="images.jpg" class="post-img"></div>
        </div>

        <!-- Create Post -->
        <div class="create-post">
            <div class="row">
                <div class="profile-circle"></div>
                <input type="text" placeholder="What's on your mind?" />
            </div>
        </div>

        <!-- Posts Feed -->
        <div class="post">
            <div class="post-header">
                <div class="profile-circle"></div>
                <div class="post-info">
                    <b><?= htmlspecialchars($user['username']) ?></b><br>
                    <small>Just now</small>
                </div>
            </div>
            <p>Welcome to your Facebook-style dashboard!</p>
        </div>

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
