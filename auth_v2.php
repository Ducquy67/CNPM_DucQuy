<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {

    $user = authenticate_v2($username, $password);

    if ($user) {
        // Tạo phiên làm việc với id
        $session->login($user['id']);
        // Cập nhật thời gian đăng nhập cuối cùng
        updateLastLogIn($user['id']);
        // Chuyển hướng người dùng đến trang chủ của nhóm dựa trên cấp độ người dùng
        if ($user['user_level'] === '1') {
            $session->msg("s", "Xin chào ".$user['username'].", Chào mừng đến với OSWA-INV.");
            redirect('admin.php', false);
        } elseif ($user['user_level'] === '2') {
            $session->msg("s", "Xin chào ".$user['username'].", Chào mừng đến với OSWA-INV.");
            redirect('special.php', false);
        } else {
            $session->msg("s", "Xin chào ".$user['username'].", Chào mừng đến với OSWA-INV.");
            redirect('home.php', false);
        }
    } else {
        $session->msg("d", "Xin lỗi, Tên người dùng/Mật khẩu không chính xác.");
        redirect('index.php', false);
    }
} else {
    $session->msg("d", $errors);
    redirect('login_v2.php', false);
}
?>
