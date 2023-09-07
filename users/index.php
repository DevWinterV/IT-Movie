<!DOCTYPE html>
<html>
<head>
  <title>ITmovie</title>
  <link rel="stylesheet" href="stylehome.css">
</head>
<body>
  <header>
  <nav class="navbar">
  <button class="show-menu-btn" onclick="toggleMenu()"></button>
    <ul class="menu">
      <li><img class="logofilm" src="anhnen/IT (4).png"  alt="LOGO"></li>
      <li><a href="index.php?page_layout=home">TRANG CHỦ</a></li>
      <li><a class="menutheloai" href="">THỂ LOẠI</a>
        <ul class="menucontheloai">
          <?php
              include_once "cauhinh.php";
              $listtheloai =  $connect->query("select * from genres where 1");
              if(!$listtheloai)
              {
                  die("Unable to execute Sql statement".$connect->connect_error);
                  exit();
              }
              while($rowtl = $listtheloai->fetch_array(MYSQLI_ASSOC))
              {
                echo" <li><a class ='menucon' href='index.php?page_layout=theloai&id=".$rowtl['theloai_id']."'>".$rowtl ["ten_theloai"]."</a></li>";
              }
          ?>
        </ul>
      </li>
      <li><a href="#">PHIM BỘ</a></li>
      <li><a href="#">PHIM CHIẾU RẠP</a></li>
      <li><a href="index.php?page_layout=danhsachxemsau">DANH SÁCH XEM SAU</a></li>
      <?php 
        session_start();
        if (isset($_SESSION['username']) || isset($_SESSION['role'])) 
        {
          echo" <li><a class ='tennguoidung' href='index.php?page_layout=nguoidung&id=".$_SESSION['user_id']."'>Xin chào: ".$_SESSION['fullname']."</a></li>";
          echo" <li><a class ='btndangxuat' href='logout.php' onclick='return confirm(\"Bạn có chắc chắn muốn ĐĂNG XUẤT không?\")'>ĐĂNG XUẤT</a></li>";
        }
        else
        {
          echo "<li> <a class='btndangxuat' href='login.php'>ĐĂNG NHẬP</a></li>";
        }
      ?>
    </ul>
    <ul class="menu menu-vertical">
      <li><a href="index.php?page_layout=home">TRANG CHỦ</a></li>
      <li><a class="menutheloai" href="">THỂ LOẠI</a>
        <ul class="menucontheloai">
          <?php
              include_once "cauhinh.php";
              $listtheloai =  $connect->query("select * from genres where 1");
              if(!$listtheloai)
              {
                  die("Unable to execute Sql statement".$connect->connect_error);
                  exit();
              }
              while($rowtl = $listtheloai->fetch_array(MYSQLI_ASSOC))
              {
                echo" <li><a class ='menucon' href='index.php?page_layout=theloai&id=".$rowtl['theloai_id']."'>".$rowtl ["ten_theloai"]."</a></li>";
              }
          ?>
        </ul>
      </li>      <li><a href="#">PHIM BỘ</a></li>
      <li><a href="#">PHIM CHIẾU RẠP</a></li>
      <li><a href="index.php?page_layout=danhsachxemsau">DANH SÁCH XEM SAU</a></li>
      <?php 
        if (isset($_SESSION['username']) || isset($_SESSION['role'])) 
        {
          echo" <li><a class ='tennguoidung' href='index.php?page_layout=nguoidung&id=".$_SESSION['user_id']."'>Xin chào: ".$_SESSION['fullname']."</a></li>";
          echo" <li><a class ='btndangxuat' href='logout.php' onclick='return confirm(\"Bạn có chắc chắn muốn ĐĂNG XUẤT không?\")'>ĐĂNG XUẤT</a></li>";
        }
        else
        {
          echo "<li> <a class='btndangxuat' href='login.php'>ĐĂNG NHẬP</a></li>";
        }
      ?>
    </ul>    
    <form action="index.php" method="get">
    <input type="hidden" name="page_layout" value="timkiemphim">
    <input type="text" name="txttimkiem" class="txttimkiem" placeholder="Nhập tên phim hoặc nội dung để tìm kiếm" style="width: 250px; height: 20px; padding: 5px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; border-radius: 5px; margin-right: 10px;">
    <input type="submit" value="Tìm Kiếm" style="width: 100px; height: 30px; padding: 5px 10px; background-color: yellow; color: red; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
      </form>
  </nav>
  <script>
function toggleMenu() {
  var screenWidth = window.innerWidth;
  var menu = document.querySelector('.menu-vertical');
  var showMenuBtn = document.querySelector('.show-menu-btn');
  if (menu.style.display === 'none') {
    menu.style.display = 'flex';
  } else {
    menu.style.display = 'none';
  }
}

window.addEventListener('resize', function() {
  var screenWidth = window.innerWidth;
  var menu = document.querySelector('.menu-vertical');
  var hinhanh = document.querySelector('.logofilm');
  var showMenuBtn = document.querySelector('.show-menu-btn');
  if (screenWidth > 600) {
    hinhanh.style.width= "80px";
    hinhanh.style.height="50px";
    menu.style.display = 'none';
    showMenuBtn.style.display = 'none';
  } else {
    hinhanh.style.width = '0px'; // Đặt chiều rộng là 200px
    hinhanh.style.height = '0px'; // Đặt chiều cao là 300px
    menu.style.display = 'flex';
    showMenuBtn.style.display = 'block  ';
  }
});
</script>
    <?php
        include_once "doPage.php";
    ?>
  <footer>
    <ul>
      <li><a href="#">Về chúng tôi</a></li>
      <li><a href="#">Điều khoản sử dụng</a></li>
      <li><a href="#">Quảng cáo</a></li>
    </ul>
  </footer>
</body>
</html>
