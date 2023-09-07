<?php
// Kết nối đến cơ sở dữ liệu
include_once "cauhinh.php";

    $id = $_GET['id'];

    // Cập nhật lượt xem cho phim có ID tương ứng trong cơ sở dữ liệu
    $query = "UPDATE movies SET view = view + 1 WHERE movie_id = $id";
    $result = $connect->query($query);
    if ($result) {
        // Trả về thành công nếu cập nhật thành công
        echo "Cập nhật lượt xem thành công";
    }
// Đóng kết nối cơ sở dữ liệu
$connect->close();
?>
