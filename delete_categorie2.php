<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
  page_require_level(4);
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Thiếu ID danh mục.");
    redirect('categorie.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Danh mục đã được xóa.");
      redirect('categorie.php');
  } else {
      $session->msg("d","Xóa danh mục thất bại.");
      redirect('categorie.php');
  }
?>
