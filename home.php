<?php
  $page_title = 'Trang Chủ';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Chào mừng người dùng <hr> Hệ thống Quản lý Bán hàng</h1>
         <p>Hãy duyệt qua để tìm các trang mà bạn có thể truy cập!</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
s