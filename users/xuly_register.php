<?php
    include_once "cauhinh.php";
    //
    $hoten = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordXACNHAN = $_POST["passwordxacnhan"];
    $email = $_POST["email"];
    $quyen =  $_POST["myRadio"];
    $message ="";
    if (trim($hoten) == "") {
        $message = "Họ tên không được bỏ trống!";
    } elseif (trim($username) == "") {
        $message = "Nhập tên tài khoản!";
    } elseif (trim($password) == "") {
        $message = "Mật khẩu không được bỏ trống";
    } elseif ($passwordXACNHAN != $password) {
        $message = "Mật khẩu xác nhận không đúng";	
    } elseif (trim($email) == "") {
        $message = "Email không được bỏ trống";
    } else {
        $checkQuery = "SELECT user_id FROM users WHERE username = '$username'";
        $checkResult = $connect->query($checkQuery);
        
        if ($checkResult->num_rows > 0) {
            $messages = "Tên tài khoản đã tồn tại!";
        } else {
            // Lưu vào CSDL
            $query = "INSERT INTO `users`(`username`, `password`, `email`, `fullname`, `role`) VALUES ('$username', '$password', '$email', '$hoten', $quyen)";
            
            if ($connect->query($query) === true) {
                $message = "Bạn đã tạo tài khoản thành công. Vui lòng đăng nhập lại để trải nghiệm Web Film.";
            } else {
                $message = "Lỗi: " . $query . "<br>" . $connect->error;
            }
            
            $connect->close();
        }
    }
?>
<!-- Hiển thị thông báo và form đăng nhập -->
<?php if ($message != "" && $message == "Bạn đã tạo tài khoản thành công. Vui lòng đăng nhập lại để trải nghiệm Web Film."): ?>
    <script>
        alert("<?php echo $message; ?>");
        window.location.href = 'login.php';
    </script>
<?php endif; ?>
<!-- Hiển thị thông báo và form đăng nhập -->
<?php if ($message   != "" && $message != "Bạn đã tạo tài khoản thành công. Vui lòng đăng nhập lại để trải nghiệm Web Film." ): ?>
    <script>
        alert("<?php echo $message; ?>");
        window.location.href = 'register.php';
    </script>
<?php endif; ?>

