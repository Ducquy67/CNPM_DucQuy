<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
  page_require_level(2);
?>
<?php
  $product = find_by_id('products',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","Thiếu id Sản phẩm.");
    redirect('product.php');
  }
?>
<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Sản phẩm đã được xóa.");
      redirect('product.php');
  } else {
      $session->msg("d","Xóa sản phẩm thất bại.");
      redirect('product.php');
  }
?>
