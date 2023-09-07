<?php
// Kết nối đến cơ sở dữ liệu
include_once "cauhinh.php";
    $message ="";
    $id = $_GET['id'];
        // Cập nhật lượt xem cho phim có ID tương ứng trong cơ sở dữ liệu
        $query = "DELETE FROM watchlist WHERE `watchlist`.`watchlist_id` = $id";
        $result = $connect->query($query);
        $message ="";
        if ($result) {
            // Trả về thành công nếu cập nhật thành công
            $message= "Đã xóa phim khỏi danh sách xem sau!";
        }
    // Đóng kết nối cơ sở dữ liệu
    
$connect->close();
?>
	
	<!-- Hiển thị thông báo và form đăng nhập -->
	<?php if ($message != "" && $message = "Đã xóa phim khỏi danh sách xem sau!" ): ?>
		<script>
			alert("<?php echo $message; ?>");
            window.location.href = 'index.php?page_layout=danhsachxemsau';
		</script>
	<?php endif; ?>