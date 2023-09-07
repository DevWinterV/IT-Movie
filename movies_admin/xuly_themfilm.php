<html>
	<body>
	<?php
		$tenphim = $_POST['txthoten'];
		$mota = $_POST['txtmota'];
        $namphathanh = $_POST['txtnamphathanh'];
        $ngonngu = $_POST['txtngonngu'];
		$quocgia = $_POST['cbb_quocgia'];
        $link1 = $_POST['txtlink1'];
        $link2 = $_POST['txtlink2'];
        $img =  $_POST['taptin1'];
		$currentDateTime = date('Y-m-d');
        $message ="";
		if(isset($_POST['btnhuy']))
		{
			header("Location: index.php?page_layout=listfilm");
		}
		if(isset($_POST['btnthemquocgia']))
		{
			header("Location: themquocgia.php");
		}
		// Kiểm tra các trường không được trống
        if (empty($tenphim) || empty($mota) || empty($namphathanh) || empty($ngonngu) || empty($quocgia) || empty($link1) ||empty($img)) {
            echo "Vui lòng điền đầy đủ thông tin!";
            exit;
        }
        // Kiểm tra năm phát hành
        $currentYear = date("Y");
        if (!is_numeric($namphathanh) || $namphathanh > $currentYear) {
            echo "Năm phát hành không hợp lệ! Năm phát hành phải là số!";
            exit;
        }
		else 
		{
			include_once "cauhinh.php";
			 // Lưu vào CSDL
             $query = "INSERT INTO `movies`(`title`, `description`, `release_year`, `language`, `country_id`, `link1`, `link2`, `img`, `view`,`date_add`) VALUES (\"$tenphim\",\"$mota\",$namphathanh,'$ngonngu',$quocgia,'$link1','$link2','$img',0,'$currentDateTime')";	
            
             if ($connect->query($query) === true) {
                 $message = "Đã thêm mới phim thành công.";
             } else {
                 $message = "Lỗi: " . $query . "<br>" . $connect->error;
             }
             
             $connect->close();			
		}		
	
	?>	
	
	<!-- Hiển thị thông báo -->
	<?php if ($message != "" && $message == "Đã thêm mới phim thành công."): ?>
		<script>
			window.location.href = 'index.php?page_layout=listfilm';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã thêm mới phim thành công."): ?>
		<script>
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>
	</body>
</html>
