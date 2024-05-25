<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>

<div class="login-page">
    <div class="text-center">
       <h1>Chào mừng</h1>
       <p>Đăng nhập để bắt đầu phiên làm việc của bạn</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth_v2.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Tên người dùng</label>
              <input type="text" class="form-control" name="username" placeholder="Tên người dùng">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Mật khẩu</label>
            <input type="password" name= "password" class="form-control" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Đăng nhập</button>
        </div>
    </form>
</div>
<?php include_once('layouts/header.php'); ?>
