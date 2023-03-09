<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGINaasdfs</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>用戶名稱</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>密碼</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">登入</button>
          <a href="signup.php" class="ca">創建帳號</a><br>
		  <a href="lost_post_visitors.php" class="ca">以訪客身份進入</a>
     </form>
</body>
</html>