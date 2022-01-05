<!DOCTYPE html>
<html lang="en">
<?php include('logincon.php');
?>
  <head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <title>登入</title>
  </head>

  <body>
    <div class="login-box">
      <h2>歡迎登入</h2>
      <form method="post">
        <div class="user-box">
          <input type="email" name="email" required>
          <label>請輸入你的帳號</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required>
          <label>請輸入你的密碼</label>
        </div>
        <button name="login">登入
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </button>  
        <a href="register.php" >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          註冊
        </a>
        <a href="forgot_password.php" >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          忘記密碼
        </a>
      </form>
    </div>
  </body>
</html>