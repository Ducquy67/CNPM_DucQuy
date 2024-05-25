<?php
  require_once('includes/load.php');
  // Kiểm tra quyền truy cập của người dùng
  page_require_level(3);
?>
<?php
  $d_sale = find_by_id('sales',(int)$_GET['id']);
  if(!$d_sale){
    $session->msg("d","Thiếu id đơn hàng.");
    redirect('sales.php');
  }
?>
<?php
  $delete_id = delete_by_id('sales',(int)$d_sale['id']);
  if($delete_id){
      $session->msg("s","Đơn hàng đã được xóa.");
      redirect('sales.php');
  } else {
      $session->msg("d","Xóa đơn hàng thất bại.");
      redirect('sales.php');
  }
?>
