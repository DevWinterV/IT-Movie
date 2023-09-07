<!DOCTYPE html>
<html>
<head>
<?php
    include_once "cauhinh.php";
    $ID = $_GET['id'];
    $quey = "select * from movies, genres, movie_genre where movies.movie_id = $ID and movie_genre.movie_id =  movies.movie_id  and movie_genre.theloai_id= genres.theloai_id";
    $movies = $connect->query($quey);
    if(!$movies)
    {
        die("Unable to execute Sql statement".$connect->connect_error);
        exit();
    }
    $row = $movies->fetch_array(MYSQLI_ASSOC);
    if($row != null)
    {
        echo "<title>".$row['title']." - ".$row['language']." - Full HD - IT Phim</title>";
    }
?>
  <link rel="stylesheet" href="style_detailphim.css">
</head>
<body>
  </header>
    <div class="chitietphim">
        <?php
        $ID = $_GET['id'];
        $query = "SELECT * 
        FROM movies
        INNER JOIN movie_genre ON movies.movie_id = movie_genre.movie_id
        INNER JOIN genres ON movie_genre.theloai_id = genres.theloai_id
        WHERE movies.movie_id = $ID";
        $result = $connect->query($query);
        $rowmoviedetail = $result->fetch_assoc();
        if ($rowmoviedetail != null) {
            echo "<div class='chitietphim-img'>";
            echo "<img src='../movies_admin/hinhanhphim/" . $rowmoviedetail['img'] . "' alt='Movie Image' style='width: 210px; height: 330px;'>";
            echo "</div>";

            echo "<div class='chitietphim-info'>";
            echo "<h2 class='chitietphim-title'>" . $rowmoviedetail['title'] . "</h2>";
            echo "<p class='chitietphim-language'>Ngôn ngữ: " . $rowmoviedetail['language'] . "</p>";
            $listtheloai = $connect->query("SELECT * FROM movie_genre, genres WHERE movie_genre.movie_id = $ID AND movie_genre.theloai_id = genres.theloai_id");
            echo "<p class='chitietphim-genre'>Thể loại:</p>";
            while ($rowtheloai = $listtheloai->fetch_assoc()) {
                echo "<p class='chitietphim-genre'>- " . $rowtheloai['ten_theloai'] . ".</p>";
            }
            $listquocgia = $connect->query("SELECT * FROM movies, country  WHERE movies.movie_id = $ID AND movies.country_id = country.country_id");
            $rowqg = $listquocgia->fetch_assoc();
            echo "<p class='chitietphim-genre'>Quốc gia: " . $rowqg['country_name'] . ".</p>";
            echo "<p class='chitietphim-genre'>Lượt xem: " . $rowqg['view'] . "</p>";
            echo "<p class='chitietphim-description'>Nội dung phim: " . $rowmoviedetail['description'] . "</p>";
            echo "<a  href='index.php?page_layout=xemphim&id=" . $rowmoviedetail['movie_id'] . "'><button class='btnxemphim'type='button'>Xem Phim</button></a>";
            echo "<a  href='index.php?page_layout=reviewphim&id=" . $rowmoviedetail['movie_id'] . "'><button class='btnxemreview'type='button'>Xem Review</button></a>";
            echo "</div>";
        }
        ?>
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
    if($rowtheloai != null){
        $query = "SELECT * 
        FROM movies
        INNER JOIN movie_genre ON movies.movie_id = movie_genre.movie_id
        INNER JOIN genres ON movie_genre.theloai_id = genres.theloai_id
        WHERE genres.theloai_id = ".$rowtheloai['theloai_id']."
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
            echo "<span class='tenphim1' >" . $rowmoviesNew["title"] . "</span> <br />";
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
    WHERE movies.movie_id not like $ID  and genres.theloai_id = ".$rowtheloai['theloai_id']."
    ORDER BY `view` DESC";
    $result = $connect->query($queryCount);
    $row = $result->fetch_assoc();
    $totalItems = $row['total']; // Tổng số phim
    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
    // Hiển thị nút "Lùi" nếu trang hiện tại không phải là trang đầu tiên
    if ($currentPage > 1) {
        echo "<a href='?page_layout=chitietphim&id=$ID&page=". ($currentPage - 1) . "'><img src='anhnen/previous.png' alt='Back' style='width: 20px; height: 20px;'></a> ";
    }
    // Hiển thị các trang
    for ($i = 1; $i <= $totalPages; $i++) {
        // Hiển thị chỉ một phần các trang nếu có nhiều hơn 5 trang
        if ($totalPages > 5 && abs($i - $currentPage) > 2) {
            continue;
        }
        echo "<a href='?page_layout=chitietphim&id=$ID&page=" . $i . "'>" . $i . "</a> ";
    }

    // Hiển thị nút "Tiến" nếu trang hiện tại không phải là trang cuối cùng
    if ($currentPage < $totalPages) {
        echo "<a href='?page_layout=chitietphim&id=$ID&page=".($currentPage + 1) ."'><img src='anhnen/next.png' alt='Next' style='width: 20px; height: 20px;'></a> ";
    }
    ?>
</div>
</body>
</html>
