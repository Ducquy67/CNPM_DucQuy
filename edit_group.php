<?php
  $page_title = 'Chỉnh sửa nhóm';
  require_once('includes/load.php');
  // Kiểm tra người dùng có quyền xem trang này không
  page_require_level(1);
?>
<?php
  $e_group = find_by_id('user_groups',(int)$_GET['id']);
  if(!$e_group){
    $session->msg("d","Thiếu id nhóm.");
    redirect('group.php');
  }
?>
<?php
  if(isset($_POST['update'])){

   $req_fields = array('group-name','group-level');
   validate_fields($req_fields);
   if(empty($errors)){
     $name = remove_junk($db->escape($_POST['group-name']));
     $level = remove_junk($db->escape($_POST['group-level']));
     $status = remove_junk($db->escape($_POST['status']));

     $query  = "UPDATE user_groups SET ";
     $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}' ";
     $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
     $result = $db->query($query);
     if($result && $db->affected_rows() === 1){
       // Thành công
       $session->msg('s',"Nhóm đã được cập nhật! ");
       redirect('edit_group.php?id='.(int)$e_group['id'], false);
     } else {
       // Thất bại
       $session->msg('d',' Xin lỗi! Cập nhật nhóm thất bại!');
       redirect('edit_group.php?id='.(int)$e_group['id'], false);
     }
   } else {
     $session->msg("d", $errors);
     redirect('edit_group.php?id='.(int)$e_group['id'], false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Chỉnh sửa nhóm</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_group.php?id=<?php echo (int)$e_group['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Tên nhóm</label>
              <input type="name" class="form-control" name="group-name" value="<?php echo remove_junk(ucwords($e_group['group_name'])); ?>">
        </div>
        <div class="form-group">
              <label for="level" class="control-label">Cấp độ nhóm</label>
              <input type="number" class="form-control" name="group-level" value="<?php echo (int)$e_group['group_level']; ?>">
        </div>
        <div class="form-group">
          <label for="status">Trạng thái</label>
              <select class="form-control" name="status">
                <option <?php if($e_group['group_status'] === '1') echo 'selected="selected"';?> value="1"> Hoạt động </option>
                <option <?php if($e_group['group_status'] === '0') echo 'selected="selected"';?> value="0">Không hoạt động</option>
              </select>
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
