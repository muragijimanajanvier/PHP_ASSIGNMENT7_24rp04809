<?php
require 'config.php';

// block if not logged in
if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// get search query
$q = trim($_GET['q'] ?? '');

// if empty search, redirect back
if ($q === '') {
    header("Location: dashboard1.php");
    exit;
}

// search users table
$stmt = $pdo->prepare("
    SELECT id, username, email 
    FROM users 
    WHERE username LIKE :q OR email LIKE :q 
    LIMIT 50
");
$stmt->execute(['q' => "%$q%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search People — MyFB</title>
<link rel="stylesheet" href="fb_home.css">
</head>
<body>

<!-- NAV BAR -->
<div class="fb-navbar">
    <div class="nav-left">
        <span class="logo">facebook</span>
    </div>

    <div class="nav-center">
        <a href="dashboard1.php" class="nav-icon">🏠</a>
        <a href="friends.php" class="nav-icon">👥</a>
        <a href="profile.php" class="nav-icon">👤</a>
    </div>

    <div class="nav-right">
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<!-- PAGE LAYOUT -->
<div class="fb-layout">
    <div class="center-feed">

        <h2>Search results for: "<?= htmlspecialchars($q) ?>"</h2>
        <hr><br>

        <?php if (count($results) == 0): ?>
            <div class="post">
                <p>No users found.</p>
            </div>
        <?php else: ?>
            <?php foreach ($results as $p): ?>
                <div class="post">
                    <div class="post-header">
                        <div class="profile-circle"></div>
                        <div class="post-info">
                            <b><?= htmlspecialchars($p['username']) ?></b><br>
                            <small><?= htmlspecialchars($p['email']) ?></small>
                        </div>
                    </div>

                    <a href="profile.php?id=<?= $p['id'] ?>" style="color:#1877f2;">
                        View Profile →
                    </a>
                </div>
            <?php endforeach ?>
        <?php endif ?>

    </div>
</div>

</body>
</html>
