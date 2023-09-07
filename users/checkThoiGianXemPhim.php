<?php
// Hàm gửi yêu cầu cập nhật số lượt xem trong CSDL
function updateViewCount() {
    $movieId = $_GET['id'];
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movefilm";			
	$connect = new mysqli($servername, $username, $password, $dbname);	
	//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
	if ($connect->connect_error) {
	    die("Không thể kết nối :" . $connect->connect_error);
	    exit();
	}
    // Thực hiện truy vấn cập nhật số lượt xem
    $sql = "UPDATE movies SET view = view + 1 WHERE movie_id = $movieId";
    if ($connect->query($sql) === TRUE) {

    } else {
        echo "Có lỗi xảy ra khi cập nhật số lượt xem: " . $connect->error;
    }
    // Đóng kết nối đến CSDL
    $connect->close();
}

// Hàm kiểm tra thời gian và gửi yêu cầu cập nhật số lượt xem
// Hàm kiểm tra thời gian và gửi yêu cầu cập nhật số lượt xem
function checkTimeout() {
    $currentTime = time();
    $elapsedTime = $currentTime - $_SESSION['start_time'];

    // Thiết lập thời gian timeout  (12000 giây)
    $timeout = 120000;

    if ($elapsedTime >= $timeout) {
        // Gửi yêu cầu cập nhật số lượt xem
        updateViewCount();
    } else {
        // Tiếp tục kiểm tra sau mỗi giây
        sleep(1);
        checkTimeout();
    }
}
// Bắt đầu session
// Kiểm tra xem session đã tồn tại hay chưa
if (!isset($_SESSION['start_time'])) {
    // Nếu session chưa tồn tại, tạo mới và gán thời gian bắt đầu
    $_SESSION['start_time'] = time();
}
// Bắt đầu kiểm tra timeout
checkTimeout();
?>
