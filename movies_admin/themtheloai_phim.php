<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM THỂ LOẠI - PHIM </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        form {
            max-width: 310px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        input[type="text"],
        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }
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
        .cbb_tenphim{
            width: 100%;
        }
        .cbb_tentheloai{
            width: 100%;
        }
    </style>
</head>
<body>


    <!-- Nội dung -->
    <div class="content">
    <script>
        function goToAddFim() {
        window.location.href = "index.php?page_layout=list_theloai_phim";
    }
    </script>
    <h1>Thêm Thể Loại - Phim</h1>
    <form action="xulythemtheloai_phim.php" method="post">
        <table>
        <tr> 
            <td>
            <label for="txtTenQuocGia">Tên Phim:</label>
            <select name="cbb_tenphim" class= "cbb_tenphim" >
                <?php
                    include_once "cauhinh.php";    
                    $listPhim =  $connect->query("select * from movies where 1");
                    if(!$listPhim)
                    {
                        die("Unable to execute Sql statement".$connect->connect_error);
                        exit();
                    }
                    while($row = $listPhim->fetch_array(MYSQLI_ASSOC))
                    {
                        echo("<option value=".$row["movie_id"].">");
                        echo($row["title"]);
                        echo("</option>");
                    }
                ?>
            </select>
         </td>
        </tr>
        <tr> 
            <td>
            <label for="txtTenQuocGia">Tên Thể Loại:</label>
            <select name="cbb_tentheloai" class= "cbb_tentheloai" >
                <?php
                    $listtheloai =  $connect->query("select * from genres where 1");
                    if(!$listtheloai)
                    {
                        die("Unable to execute Sql statement".$connect->connect_error);
                        exit();
                    }
                    while($rowtheloai = $listtheloai->fetch_array(MYSQLI_ASSOC))
                    {
                        echo("<option value=".$rowtheloai["theloai_id"].">");
                        echo($rowtheloai["ten_theloai"]);
                        echo("</option>");
                    }
                ?>
            </select>   
            </td>
        </tr>
        <tr>
            <td>
            <input type="submit" value="Thêm" name="btnThem">
            <input type="button" value="Hủy" name="btnhuy" onclick ="goToAddFim()">
        </td>
        </tr>
        </table>
    </form>
    </div>
</body>
</html>
