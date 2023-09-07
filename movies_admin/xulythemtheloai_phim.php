<html>
	<body>
	<?php
	if (isset($_POST['btnThem'])) {

        // Lấy dữ liệu từ biểu mẫu
        $idtheloai = $_POST['cbb_tentheloai'];
        $idphim = $_POST['cbb_tenphim'];

		// Kiểm tra các trường không được trống
        if (empty($idtheloai) || empty($idphim)) {
            echo "Vui lòng điền đầy đủ thông tin!";
            exit;
        }
		else 
		{
			include_once "cauhinh.php";
			 // Lưu vào CSDL
             $query = "INSERT INTO `movie_genre`(`movie_id`, `theloai_id`) VALUES ($idphim,$idtheloai)";	
             if ($connect->query($query) === true) {
                 $message = "Đã thêm chi tiết thể loại - phim.";
             } else {
                 $message = "Lỗi: " . $query . "<br>" . $connect->error;
             }
             
             $connect->close();			
		}		
    }
	?>	
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Đã thêm chi tiết thể loại - phim."): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_theloai_phim';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã thêm chi tiết thể loại - phim."): ?>
		<script>
			window.location.href = 'index.php?page_layout=themtheloai_phim';
			alert("<?php echo $message.". Đã tồn tại chi tiết thể loại phim trong cở sở dữ liệu!"; ?>");
		</script>
	<?php endif; ?>
	</body>
</html>
