<?php
// Kết nối đến cơ sở dữ liệu
include_once "cauhinh.php";
    $message ="";
    $id = $_GET['id'];
    $iduser = $_GET['iduser'];
    $currentDateTime = date('Y-m-d');
    $kiemtra =  $connect->query("SELECT * FROM `watchlist` WHERE movie_id =$id and user_id =$iduser ");
    $row =  $kiemtra ->fetch_array(MYSQLI_ASSOC);
    if($row)
    {
        $message= "Phim đã có trong danh sách xem sau.";
    }
    else{
        // Cập nhật lượt xem cho phim có ID tương ứng trong cơ sở dữ liệu
        $query = "INSERT INTO `watchlist`( `movie_id`, `user_id`, `added_date`) VALUES ($id,$iduser,'$currentDateTime')";
        $result = $connect->query($query);
        $message ="";
        if ($result) {
            // Trả về thành công nếu cập nhật thành công
            $message= "Đã thêm vào danh sách xem sau";

        }
    }
$connect->close();
?>

	<!-- Hiển thị thông báo và form đăng nhập -->
	<?php if ($message != "" && $message = "Đã thêm vào danh sách xem sau" ): ?>
		<script>
			alert("<?php echo $message; ?>");
            window.location.href = 'index.php?page_layout=danhsachxemsau';
		</script>
	<?php endif; ?>