<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITMOVIES-ADMIN</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS cho menu dọc */
        .menu-dock {
            float: left;
            width: 20%;
            background-color: #f1f1f1;
            height: 100vh;
        }

        .menu-dock ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu-dock li {
            padding: 8px 16px;
            border-bottom: 1px solid #ddd;
        }

        .menu-dock li a {
            display: block;
            color: black;
            text-decoration: none;
        }

        .menu-dock li a:hover {
            background-color: #ccc;
        }

        /* CSS cho menu ngang */
        .menu-ngang {
            background-color: #333;
            overflow: hidden;
        }

        .menu-ngang a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .menu-ngang a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            margin-top: 50px;
            padding: 1px 16px;
        }
        .btn_cuoitrang {
            margin-left: 80%;
        }
    </style>
</head>
<body>
    <!-- Menu ngang -->
    <div class="menu-ngang">
        <a href="">HOME</a>
        <a href="index.php?page_layout=listfilm">QUẢN LÝ PHIM</a>
        <a href="index.php?page_layout=list_theloai">QUẢN LÝ THỂ LOẠI PHIM</a>
        <a href="index.php?page_layout=list_theloai_phim">CHI TIẾT THỂ LOẠI - PHIM</a>
        <a href="index.php?page_layout=list_user">QUẢN LÝ TÀI KHOẢN XEM PHIM</a>
        <a href='logout.php' onclick='return confirm("Bạn có chắc chắn muốn ĐĂNG XUẤT không?")'>ĐĂNG XUẤT</a>
    </div>
    <!-- Nội dung -->
    <div>   
        <a href="#cuoitrang" class ="btn_cuoitrang">Cuối trang</a>
    </div>
    <?php include_once "doPage.php";?>
  <!-- Điểm neo-->
  <a id="cuoitrang"></a>
  <script>
    // hàm xử lý chuyển đến cuoiis trang
    function scrollToCuoiTrang() {
        var cuoiTrangElement = document.getElementById("cuoitrang");
        cuoiTrangElement.scrollIntoView({ behavior: 'smooth' });
    }
    // Gán hàm scrollToCuoiTrang vào liên kết "Cuối trang"
    var cuoiTrangLink = document.querySelector('a[href="#cuoitrang"]');
    cuoiTrangLink.addEventListener('click', scrollToCuoiTrang);
</script>
</body>
</html>
