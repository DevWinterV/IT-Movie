<html>
	<body>
	<?php
	if (isset($_POST['btnThem'])) {

        // Lấy dữ liệu từ biểu mẫu
        $tenTheLoai = $_POST['txtTenQuocGia'];

		// Kiểm tra các trường không được trống
        if (empty($tenTheLoai) ) {
            echo "Vui lòng điền đầy đủ thông tin!";
            exit;
        }
		else 
		{
			include_once "cauhinh.php";
			 // Lưu vào CSDL
             $query = "INSERT INTO `genres`(`ten_theloai`) VALUES ('$tenTheLoai')";	
            
             if ($connect->query($query) === true) {
                 $message = "Đã thêm thể loại vào cơ sỡ dữ liệu.";
             } else {
                 $message = "Lỗi: " . $query . "<br>" . $connect->error;
             }
             
             $connect->close();			
		}		
    }

	?>	
	
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Đã thêm thể loại vào cơ sỡ dữ liệu."): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_theloai';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã thêm thể loại vào cơ sỡ dữ liệu."): ?>
		<script>
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>
	</body>
</html>
