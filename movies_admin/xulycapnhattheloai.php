<?php
    include_once "cauhinh.php";
    //
    $ID = $_GET['id'];
    $tenphim = $_POST['txthoten'];
    if(isset($_POST['btnhuy']))
    {
        header("Location: index.php?page_layout=list_theloai");
    }
    // Kiểm tra các trường không được trống
    if (empty($tenphim) ) {
        echo "Vui lòng điền đầy đủ thông tin!";
        exit;
    }

    else
    {
        // Lưu vào CSDL
        $query = "UPDATE `genres` SET `ten_theloai` =\"$tenphim\" WHERE `theloai_id`= $ID ";
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
    if(isset( $_POST["btnhuy"]))
    {
        header("Location: index.php?page_layout=list_theloai");
    }

?>
<!-- Hiển thị thông báo -->
<?php if ($message != "" && $message == "Đã cập nhật thành công!"): ?>
		<script>
			window.location.href = 'index.php?page_layout=list_theloai';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>

	<?php if ($message != ""  && $message != "Đã cập nhật thành công!"): ?>
		<script>
            window.location.href = 'index.php?page_layout=capnhattheloai';
			alert("<?php echo $message; ?>");
		</script>
	<?php endif; ?>