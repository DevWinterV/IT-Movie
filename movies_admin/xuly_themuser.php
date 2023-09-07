<?php
    include_once "cauhinh.php";
    //
    $hoten = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
	$passwordXACNHAN = $_POST["passwordxacnhan"];
    $email = $_POST["email"];
    if(isset($_POST['btnhuy']))
    {
        header('Location: index.php?page_layout=list_user');
    }
    if (trim($hoten) == "") {
        echo "Họ tên không được bỏ trống!";
    } elseif (trim($username) == "") {
        echo "Nhập tên tài khoản!";
    } elseif (trim($password) == "") {
        echo "Mật khẩu không được bỏ trống";
	} elseif (trim($passwordXACNHAN) == "") {
        echo "Vui lòng xác nhận lại mật khẩu";
	} elseif ($passwordXACNHAN != $password) {
        echo "Mật khẩu xác nhận không đúng";		
    } elseif (trim($email) == "") {
        echo "Email không được bỏ trống";
    } else {
        $checkQuery = "SELECT user_id FROM users WHERE username = '$username'";
        $checkResult = $connect->query($checkQuery);
        
        if ($checkResult->num_rows > 0) {
            $messages = "Tên tài khoản đã tồn tại!";
        } else {
            // Lưu vào CSDL
            $query = "INSERT INTO `users`(`username`, `password`, `email`, `fullname`) VALUES ('$username', '$password', '$email', '$hoten')";
            
            if ($connect->query($query) === true) {
                $message = "Bạn đã tạo tài khoản thành công.";
            } else {
                $message = "Lỗi: " . $query . "<br>" . $connect->error;
            }
            
            $connect->close();
        }
    }
?>
	
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Bạn đã tạo tài khoản thành công."): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_user';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Bạn đã tạo tài khoản thành công."): ?>
		<script>
            window.location.href = 'index.php?page_layout=them_user';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

