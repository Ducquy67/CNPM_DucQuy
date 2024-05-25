<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {
    $user_id = authenticate($username, $password);
    if ($user_id) {
        // Tạo phiên làm việc với id
        $session->login($user_id);
        // Cập nhật thời gian đăng nhập cuối cùng
        updateLastLogIn($user_id);
        $session->msg("s", "Chào mừng đến với Hệ thống Quản lý Bán hàng");
        redirect('admin.php', false);
    } else {
        $session->msg("d", "Xin lỗi, Tên người dùng/Mật khẩu không chính xác.");
        redirect('index.php', false);
    }
} else {
    $session->msg("d", $errors);
    redirect('index.php', false);
}
?>
