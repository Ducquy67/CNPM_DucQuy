<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
  page_require_level(2);
?>
<?php
  $find_media = find_by_id('media',(int)$_GET['id']);
  $photo = new Media();
  if($photo->media_destroy($find_media['id'],$find_media['file_name'])){
      $session->msg("s","Ảnh đã được xóa.");
      redirect('media.php');
  } else {
      $session->msg("d","Xóa ảnh thất bại hoặc thiếu thông số.");
      redirect('media.php');
  }
?>
