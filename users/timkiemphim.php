<!DOCTYPE html>
<html>
<head>
  <title>ITmovie</title>
  <link rel="stylesheet" href="stylehome.css">
</head>
<body>
  </header>
  <?PHP
        $tenphim = $_GET['txttimkiem'];
        echo "<h2 class='phimhot'>Kết quả tìm kiếm: $tenphim</h2>";
  ?>
  <section>
  <?php
    include_once "doPage.php";
    include_once "cauhinh.php";
      $ListKH = $connect->query(
      "SELECT *
      FROM `movies`
      WHERE `title` like '%$tenphim%' or `description` like '%$tenphim%'
      ORDER BY `view` DESC
      LIMIT 10");
      if (!$ListKH) {
        die("Unable to execute Sql statement" . $connect->connect_error);
        exit();
      }
      while ($row = $ListKH->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='card'>";
        echo "<a href='index?page_layout=chitietphim&id=" . $row["movie_id"] . "' class ='card-link'>";
        echo "<img class='hinhanhphim' src='../movies_admin/hinhanhphim/" . $row["img"] . "' style='width: 180px; height: 280px;'>";
        echo "<span class='tenphim' >" . $row["title"] . "</span> <br />";
        echo "</a>";
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
        echo "<a href='?page=" . ($currentPage - 1) . "'>  <img src='anhnen/previous.png' alt='Back' style='width: 20px; height: 20px;'>
        </a> ";
    }

    // Hiển thị các trang
    for ($i = 1; $i <= $totalPages; $i++) {
        // Hiển thị chỉ một phần các trang nếu có nhiều hơn 5 trang
        if ($totalPages > 5 && abs($i - $currentPage) > 2) {
            continue;
        }

        echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
    }

    // Hiển thị nút "Tiến" nếu trang hiện tại không phải là trang cuối cùng
    if ($currentPage < $totalPages) {
        echo "<a href='?page=" . ($currentPage + 1) . "'><img src='anhnen/next.png' alt='Next'style='width: 20px; height: 20px;'>
        </a> ";
    }
    ?>
</div>
</body>
</html>
