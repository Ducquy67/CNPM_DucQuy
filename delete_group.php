<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('user_groups',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Nhóm đã được xóa.");
      redirect('group.php');
  } else {
      $session->msg("d","Xóa nhóm thất bại hoặc thiếu thông số.");
      redirect('group.php');
  }
?>
