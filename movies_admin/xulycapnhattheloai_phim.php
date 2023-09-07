<?php
    include_once "cauhinh.php";
    //
    $ID = $_GET['id'];
    $idtheloaicu = $_GET['id2'];
	$idtheloai = $_POST['cbb_tentheloai'];
	$idphim = $_POST['cbb_tenphim'];
	// Kiểm tra các trường không được trống
	if (empty($idtheloai) || empty($idphim)) {
		echo "Vui lòng điền đầy đủ thông tin!";
		exit;
	}
    else
    {
        // Lưu vào CSDL
        $query = "UPDATE `movie_genre` SET `theloai_id` = '$idtheloai' WHERE `movie_genre`.`movie_id` = $ID  AND `movie_genre`.`theloai_id` = $idtheloaicu";
        if($connect->query($query)=== true)
        {
            $message ="Đã cập nhật thành công!";
        }
        else
        {
            $message = "Lỗi: ".$query."<br>".$connect->error;
        }
        $connect->close();
    }
    if(isset( $_POST["btnhuy"]))
    {
        header("Location: index.php?page_layout=list_theloai_phim");
    }

?>
<!-- Hiển thị thông báo -->
<?php if ($message != "" && $message == "Đã cập nhật thành công!"): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_theloai_phim';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã cập nhật thành công!"): ?>
		<script>
            window.location.href = 'index.php?page_layout=capnhattheloai_phim&id=<?php echo"$ID"?>&id2=<?php echo"$idtheloaicu"?>';
			alert("<?php echo $message.". Đã tồn tại chi tiết thể loại phim trong cở sở dữ liệu!"; ?>");
		</script>
	<?php endif; ?>