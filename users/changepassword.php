<?php
// Kết nối đến cơ sở dữ liệu
include_once "cauhinh.php";
    $id = $_GET['id'];
    $matkhaucu = $_POST['current_password'];
    $matkhaumoi = $_POST['new_password'];
    $query = "UPDATE `users` SET `password`='$matkhaumoi' WHERE user_id = $id and `password` ='$matkhaucu' ";
    $result = $connect->query($query);
    $error="";
    if ($result) {
        $error= "Cập nhật mật khẩu thành công!";
    }
// Đóng kết nối cơ sở dữ liệu
$connect->close();
?>
	<!-- Hiển thị thông báo và form đăng nhập -->
	<?php if ($error != "" && $error = "Cập nhật mật khẩu thành công!" ): ?>
		<script>
			window.location.href = 'index.php?page_layout=nguoidung&id= <?php echo "$id";   ?>';
			alert("<?php echo $error; ?>");
		</script>
	<?php endif; ?>
	
