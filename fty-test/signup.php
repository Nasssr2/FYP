<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>註冊</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>你的姓名</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>用戶名稱</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


          <label>phone_Number</label>
          <?php if (isset($_GET['phone_Number'])) { ?>
               <input type="INTEGER" 
                      name="phone_Number" 
                      placeholder="User Name"
                      value="<?php echo $_GET['phone_Number']; ?>"><br>
          <?php }else{ ?>
               <input type="INTEGER" 
                      name="phone_Number" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>密碼</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>再次輸入密碼</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">註冊</button>
          <a href="index.php" class="ca">已經擁有了帳號?</a>
     </form>
</body>
</html>