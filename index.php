<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="background-color: #f2f2f2; padding: 50px;">

    <div class="text-center" style="margin-bottom: 30px;">
       <h1 style="font-size: 36px; color: #333;">Đăng Nhập</h1>
       <h4 style="font-size: 20px; color: #666;">Hệ Thống Quản Lý Bán Hàng</h4>
    </div>

    <?php echo display_msg($msg); ?>

    <form method="post" action="auth.php" class="clearfix">
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="username" class="control-label" style="display: block; font-size: 18px; color: #333; margin-bottom: 10px;">Tên Người Dùng</label>
            <input type="name" class="form-control" name="username" placeholder="Tên Người Dùng" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="Password" class="control-label" style="display: block; font-size: 18px; color: #333; margin-bottom: 10px;">Mật Khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật Khẩu" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div class="form-group text-center" style="margin-bottom: 20px;">
            <button type="submit" class="btn btn-danger" style="padding: 10px 30px; border: none; border-radius: 25px; background-color: #dc3545; color: #fff; cursor: pointer; font-size: 20px;">Đăng Nhập</button>
        </div>
    </form>

</div>

<?php include_once('layouts/footer.php'); ?>
