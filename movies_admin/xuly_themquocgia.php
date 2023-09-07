<html>
	<body>
	<?php
	if (isset($_POST['btnThem'])) {

        // Lấy dữ liệu từ biểu mẫu
        $tenQuocGia = $_POST['txtTenQuocGia'];

		// Kiểm tra các trường không được trống
        if (empty($tenQuocGia) ) {
            echo "Vui lòng điền đầy đủ thông tin!";
            exit;
        }
		else 
		{
			include_once "cauhinh.php";
			 // Lưu vào CSDL
             $query = "INSERT INTO `country`( `country_name`) VALUES ('$tenQuocGia')";	
            
             if ($connect->query($query) === true) {
                 $message = "Đã thêm mới quốc gia vào cơ sỡ dữ liệu.";
             } else {
                 $message = "Lỗi: " . $query . "<br>" . $connect->error;
             }
             
             $connect->close();			
		}		
    }

	?>	
	
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Đã thêm mới quốc gia vào cơ sỡ dữ liệu."): ?>
		<script>
			window.location.href = 'index.php?page_layout=themmoi_film';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã thêm mới quốc gia vào cơ sỡ dữ liệu."): ?>
		<script>
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>
	</body>
</html>
