<?php
// signup.php
require 'config.php';
$flash = flash();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign Up — MyFB</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <!-- <div class="logo"><img src="assets/images/fb-logo.png" alt="logo"></div> -->
    <h2>Create your account</h2>
    <?php if($flash): ?><div class="error"><?=htmlspecialchars($flash)?></div><?php endif; ?>
    <form action="signup_process.php" method="post" novalidate>
      <input type="text" name="username" placeholder="Username" value="<?=isset($_SESSION['old']['username'])?htmlspecialchars($_SESSION['old']['username']):''?>">
      <input type="email" name="email" placeholder="Email" value="<?=isset($_SESSION['old']['email'])?htmlspecialchars($_SESSION['old']['email']):''?>">
      <input type="password" name="password" placeholder="Password">
      <input type="password" name="confirm_password" placeholder="Confirm Password">
      <button class="btn btn-primary" type="submit">Sign Up</button>
    </form>
      <button class="btn btn-google" type="submit">
      
      </button>
    </form>

    <div class="small-link">Already have an account? <a href="login.php">Sign in</a></div>
  </div>
</body>
</html>
