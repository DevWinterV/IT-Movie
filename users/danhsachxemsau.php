<?php
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username']) && !isset($_SESSION['role'])) {
    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập và truyền URL chi tiết phim
    $movieURL = "index.php?page_layout=danhsachxemsau"; // Thay đổi URL chi tiết phim tương ứng
    $_SESSION['redirect'] = $movieURL;
    // header("Location: login.php?redirect=" . urlencode($movieURL));
    echo "<h2 class='thongbao'>Vui lòng đăng nhập!</h2>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Danh Sách Xem Sau</title>
  <link rel="stylesheet" href="style_detailphim.css">
</head>
<body>
  </header>
  <h2 class="phimhot">Danh Sách Phim Xem Sau</h2>
  <section>
  <?php
    include_once "doPage.php";
    include_once "cauhinh.php";
      $ListKH = $connect->query("SELECT * FROM `watchlist`, movies, users WHERE watchlist.movie_id = movies.movie_id and watchlist.user_id = users.user_id and watchlist.user_id = ".$_SESSION['user_id']."");
      if (!$ListKH) {
        die("Unable to execute Sql statement" . $connect->connect_error);
        exit();
      }
      while ($row = $ListKH->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='card_xemsau'>";
        echo "<a href='index?page_layout=chitietphim&id=" . $row["movie_id"] . "' class ='card-link'>";
        echo "<img class='hinhanhphim' src='../movies_admin/hinhanhphim/" . $row["img"] . "' style='width: 180px; height: 280px;'>";
        echo "<span class='tenphim' >" . $row["title"] . "</span> <br />";
        echo "</a>";
        echo "<a href='xoaphimxemsau.php?id=" . $row["watchlist_id"] . "' class='delete-button'>Xóa</a>";
        echo "</div>";
    }
  ?>
</section>

<h2 class="phimcapnhat">PHIM MỚI CẬP NHẬT</h2>
<section>
  <div class='left-column'>
    <?php
    $itemsPerPage = 10; // Số phim mới cập nhật hiển thị trên mỗi trang
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
    $offset = ($currentPage - 1) * $itemsPerPage; // Vị trí bắt đầu lấy dữ liệu từ CSDL
    $query = "SELECT *
              FROM `movies`
              ORDER BY `date_add` DESC
              LIMIT $offset, $itemsPerPage";
    $ListMovieNew = $connect->query($query);
    if (!$ListMovieNew) {
        die("Unable to execute SQL statement" . $connect->connect_error);
        exit();
    }
    while ($rowmoviesNew = $ListMovieNew->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='card_moivenew'>";
        echo "<a href='index?page_layout=chitietphim&id=" . $rowmoviesNew["movie_id"] . "' class ='card-link'>";
        echo "<img class='hinhanhphim_new' src='../movies_admin/hinhanhphim/" . $rowmoviesNew["img"] . "' style='width: 140px; height: 180px;'>";
        echo "<span class='tenphim1' >" . $rowmoviesNew["title"] . "</span> <br />";
        echo "</a>";
        echo "</div>";
    }
    ?>
</div>
  <div class='right-column'>
    <h2 class="phimsapchieu">PHIM SẮP CHIẾU</h2>
  </div>
</section>

<div class='pagination'>
    <?php
    // Phần trang
    $queryCount = "SELECT COUNT(*) AS total FROM `movies`";
    $result = $connect->query($queryCount);
    $row = $result->fetch_assoc();
    $totalItems = $row['total']; // Tổng số phim

    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang

    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1

    // Hiển thị nút "Lùi" nếu trang hiện tại không phải là trang đầu tiên
    if ($currentPage > 1) {
        echo "<a href='?page_layout=danhsachxemsau&page=" . ($currentPage - 1) . "'>  <img src='anhnen/previous.png' alt='Back' style='width: 20px; height: 20px;'>
        </a> ";
    }

    // Hiển thị các trang
    for ($i = 1; $i <= $totalPages; $i++) {
        // Hiển thị chỉ một phần các trang nếu có nhiều hơn 5 trang
        if ($totalPages > 5 && abs($i - $currentPage) > 2) {
            continue;
        }

        echo "<a href='?page_layout=danhsachxemsau&page=" . $i . "'>" . $i . "</a> ";
    }

    // Hiển thị nút "Tiến" nếu trang hiện tại không phải là trang cuối cùng
    if ($currentPage < $totalPages) {
        echo "<a href='?page_layout=danhsachxemsau&page=" . ($currentPage + 1) . "'><img src='anhnen/next.png' alt='Next'style='width: 20px; height: 20px;'>
        </a> ";
    }
    ?>
</div>
</body>
</html>
