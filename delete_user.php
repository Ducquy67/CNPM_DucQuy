<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
  page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('users',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Người dùng đã được xóa.");
      redirect('users.php');
  } else {
      $session->msg("d","Xóa người dùng thất bại hoặc thiếu tham số.");
      redirect('users.php');
  }
?>
