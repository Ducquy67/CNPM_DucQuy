<?php
$page_title = 'Tất cả đơn hàng';
require_once('includes/load.php');
// Kiểm tra quyền truy cập của người dùng để xem trang này
page_require_level(3);
?>
<?php
$sales = find_all_sale();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Tất cả đơn hàng</span>
        </strong>
        <div class="pull-right">
          <a href="add_sale.php" class="btn btn-primary">Thêm đơn hàng</a>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th> Tên sản phẩm </th>
              <th class="text-center" style="width: 15%;"> Số lượng</th>
              <th class="text-center" style="width: 15%;"> Tổng tiền </th>
              <th class="text-center" style="width: 15%;"> Ngày </th>
              <th class="text-center" style="width: 100px;"> Hành động </th>
           </tr>
          </thead>
         <tbody>
           <?php foreach ($sales as $sale):?>
           <tr>
             <td class="text-center"><?php echo count_id();?></td>
             <td><?php echo remove_junk($sale['name']); ?></td>
             <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
             <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
             <td class="text-center"><?php echo $sale['date']; ?></td>
             <td class="text-center">
                <div class="btn-group">
                   <a href="edit_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xs"  title="Sửa" data-toggle="tooltip">
                     <span class="glyphicon glyphicon-edit"></span>
                   </a>
                   <a href="delete_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-danger btn-xs"  title="Xóa" data-toggle="tooltip">
                     <span class="glyphicon glyphicon-trash"></span>
                   </a>
                </div>
             </td>
           </tr>
           <?php endforeach;?>
         </tbody>
       </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
