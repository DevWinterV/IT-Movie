<?php
    include_once "cauhinh.php";
    //
    $id= $_GET['id'];
    $hoten = $_POST["fullname"];
    $password = $_POST["password"];
	$passwordXACNHAN = $_POST["passwordxacnhan"];
    $email = $_POST["email"];
    $quyen = $_POST["myRadio"];
    $message ="";
    if(isset($_POST['btnhuy']))
    {
        header('Location: index.php?page_layout=list_user');
    }
    if (trim($hoten) == "" && is_numeric($hoten)) {
        echo "Họ tên không được bỏ trống và không được có chữ số!";
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
        $checkQuery = "SELECT user_id FROM users WHERE user_id = '$username'";
        $checkResult = $connect->query($checkQuery);
        
        if ($checkResult->num_rows > 0) {
            $messages = "Tên tài khoản đã tồn tại!";
        } else {
            // Lưu vào CSDL
            $query = "UPDATE `users` SET `password`='$password',`email`='$email',`fullname`='$hoten', `role` = $quyen WHERE user_id =$id";
            
            if ($connect->query($query) === true) {
                $message = "Đã cập nhật lại thông tin tài khoản.";
            } else {
                $message = "Lỗi: " . $query . "<br>" . $connect->error;
            }
            
            $connect->close();
        }
    }
?>
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Đã cập nhật lại thông tin tài khoản."): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_user';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã cập nhật lại thông tin tài khoản."): ?>
		<script>
            window.location.href = 'index.php?page_layout=capnhattaikhoan.php&id=<?php echo"$id"?>';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>


