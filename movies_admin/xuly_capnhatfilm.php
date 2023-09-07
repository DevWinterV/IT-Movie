<?php
    include_once "cauhinh.php";
    //
    $ID = $_GET['id'];
    $tenphim = $_POST['txthoten'];
    $mota = $_POST['txtmota'];
    $namphathanh = $_POST['txtnamphathanh'];
    $ngonngu = $_POST['txtngonngu'];
    $quocgia = $_POST['cbb_quocgia'];
    $link1 = $_POST['txtlink1'];
    $link2 = $_POST['txtlink2'];
    $img =  $_POST['duongdan_input'];
    $message ="";
    if(isset($_POST['btnhuy']))
    {
        header("Location: index.php?page_layout=listfilm");
    }
    // Kiểm tra các trường không được trống
    if (empty($tenphim) || empty($mota) || empty($namphathanh) || empty($ngonngu) || empty($quocgia) || empty($link1) || empty($link2) || empty($img)) {
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
        // Lưu vào CSDL
        $query = "UPDATE `movies` SET `title`=\"$tenphim\",`description`=\"$mota\",`release_year`=$namphathanh,`language`='$ngonngu',`country_id`= $quocgia,`link1`='$link1',`link2`='$link2',`img`='$img' WHERE `movie_id`= $ID ";
        if($connect->query($query)=== true)
        {
            $message ="Đã cập nhật thành công!";
        }
        else
        {
            echo "Lỗi: ".$query."<br>".$connect->error;
        }
        $connect->close();
    }
?>
<!-- Hiển thị thông báo -->
<?php if ($message != "" && $message == "Đã cập nhật thành công!"): ?>
		<script>
			window.location.href = 'index.php?page_layout=listfilm';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã cập nhật thành công!"): ?>
		<script>
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>