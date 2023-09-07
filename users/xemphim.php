<?php
    $ID = $_GET['id'];
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username']) && !isset($_SESSION['role'])) {
    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập và truyền URL chi tiết phim
    $movieURL = "index.php?page_layout=xemphim&id=$ID"; // Thay đổi URL chi tiết phim tương ứng
    $_SESSION['redirect'] = $movieURL;
    // header("Location: login.php?redirect=" . urlencode($movieURL));
    echo "<h2 class='thongbao'>Vui lòng đăng nhập để xem phim!</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include_once "doPage.php";
    include_once "cauhinh.php";
    $quey = "select * from movies, genres, movie_genre where movies.movie_id = $ID and movie_genre.movie_id =  movies.movie_id  and movie_genre.theloai_id= genres.theloai_id";
    $movies = $connect->query($quey);
    if (!$movies) {
        die("Unable to execute SQL statement" . $connect->connect_error);
        exit();
    }
    $row = $movies->fetch_array(MYSQLI_ASSOC);
    if ($row != null) {
        echo "<title>" . $row['title'] . " - " . $row['language'] . " - Full HD - IT Phim</title>";
    }
    ?>
    <link rel="stylesheet" href="style_detailphim.css">
</head>
<body>
    <div class="chitietphim">
        <?php
        echo "<h2 style='color: white'>Bạn đang xem phim " . $row['title'] . " - " . $row['language'] . " - Full HD - IT Phim</h2>";
        ?>
    </div>
    <div class="videophim">
        <iframe class="video" width="800" height="500" src="https://www.youtube.com/embed/<?php echo "" . $row['link1'] . "";?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="chitiet">
     <?php
        echo "<h3 style='color: white'>Lượt xem: ".$row['view']."</h3>";
        echo "<a  href='xemsau?id=$ID&iduser=".$_SESSION['user_id']."'><button class='btnxemphim'type='button'>Lưu Xem Sau</button></a>";
        ?>
    </div>

</div>
<h2 class="phimcapnhat">PHIM ĐỀ CỬ CHO BẠN</h2>
<section>
    <div class='left-column'>
        <?php
        $itemsPerPage = 10; // Số phim mới cập nhật hiển thị trên mỗi trang
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
        $offset = ($currentPage - 1) * $itemsPerPage; // Vị trí bắt đầu lấy dữ liệu từ CSDL

        $listIDtheloai = $connect->query("SELECT * 
        FROM movies
        INNER JOIN movie_genre ON movies.movie_id = movie_genre.movie_id
        INNER JOIN genres ON movie_genre.theloai_id = genres.theloai_id
        where movies.movie_id = $ID
        ORDER BY `view` DESC
        ");
        if (!$listIDtheloai) {
            die("Unable to execute SQL statement" . $connect->connect_error);
            exit();
        }
        $rowtheloai = $listIDtheloai->fetch_array(MYSQLI_ASSOC);
        if ($rowtheloai != null) {
            $query = "SELECT * 
            FROM movies
            INNER JOIN movie_genre ON movies.movie_id = movie_genre.movie_id
            INNER JOIN genres ON movie_genre.theloai_id = genres.theloai_id
            WHERE genres.theloai_id = " . $rowtheloai['theloai_id'] . "
            and movies.movie_id not like $ID
            ORDER BY `view` DESC
            LIMIT $offset, $itemsPerPage";
            $ListMovieNew = $connect->query($query);
            if (!$ListMovieNew) {
                die("Unable to execute SQL statement" . $connect->connect_error);
                exit();
            }
            while ($rowmoviesNew = $ListMovieNew->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='card_moivenew'>";
                echo "<a href='index.php?page_layout=chitietphim&id=" . $rowmoviesNew["movie_id"] . "' class ='card-link'>";
                echo "<img class='hinhanhphim_new' src='../movies_admin/hinhanhphim/" . $rowmoviesNew["img"] . "' style='width: 140px; height: 180px;'>";
                echo "<span class='tenphim' >" . $rowmoviesNew["title"] . "</span> <br />";
                echo "</a>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class='right-column'>
        <h2 class="phimsapchieu">PHIM SẮP CHIẾU</h2>
    </div>
</section>
<div class='pagination'>
    <?php
    // Phân trang
    $queryCount = "SELECT COUNT(*) as total
    FROM movies
    INNER JOIN movie_genre ON movies.movie_id = movie_genre.movie_id
    INNER JOIN genres ON movie_genre.theloai_id = genres.theloai_id
    WHERE movies.movie_id not like $ID  and genres.theloai_id = " . $rowtheloai['theloai_id'] . "
    ORDER BY `view` DESC";
    $result = $connect->query($queryCount);
    $row = $result->fetch_assoc();
    $totalItems = $row['total']; // Tổng số phim
    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang
    // Hiển thị nút "Lùi" nếu trang hiện tại không phải là trang đầu tiên
    if ($currentPage > 1) {
        echo "<a href='?page_layout=xemphim&id=$ID&page=" . ($currentPage - 1) . "'><img src='anhnen/previous.png' alt='Back' style='width: 20px; height: 20px;'></a> ";
    }
    // Hiển thị các trang
    for ($i = 1; $i <= $totalPages; $i++) {
        // Hiển thị chỉ một phần các trang nếu có nhiều hơn 5 trang
        if ($totalPages > 5 && abs($i - $currentPage) > 2) {
            continue;
        }
        echo "<a href='?page_layout=xemphim&id=$ID&page=" . $i . "'>" . $i . "</a> ";
    }

    // Hiển thị nút "Tiến" nếu trang hiện tại không phải là trang cuối cùng
    if ($currentPage < $totalPages) {
        echo "<a href='?page_layout=xemphim&id=$ID&page=" . ($currentPage + 1) . "'><img src='anhnen/next.png' alt='Next' style='width: 20px; height: 20px;'></a> ";
    }
    ?>
</div>


<script>
// Lưu thời gian bắt đầu
var startTime = new Date().getTime();
var timeout;
function changeBackgroundImage() {
    // Tính toán thời gian đã trôi qua
    var currentTime = new Date().getTime();
    // quy đổi giây
    var elapsedTime = Math.floor((currentTime - startTime) / 1000);
    // Kiểm tra nếu đã đạt đủ 4 phút (240 giây)
    if (elapsedTime >= 240) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                        
                } else {
                    alert('Error Code: ' + xhr.status);
                    alert('Error Message: ' + xhr.statusText);
                }
            }
        };
        xhr.open('GET', 'update_view_count.php?id=<?php echo $ID;?>');
        xhr.send();
        // Dừng timeout nếu đã đạt điều kiện
        clearTimeout(timeout);
    } else {
        // Gọi lại hàm changeBackgroundImage sau 3 giây
        timeout = setTimeout(changeBackgroundImage, 3000);
    }
}
// Gọi hàm changeBackgroundImage ban đầu
changeBackgroundImage();
</script>

</body>
</html>
