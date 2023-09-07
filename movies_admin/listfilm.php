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
    </style>
</head>
<body>

    <!-- Nội dung -->
    <div class="content">
        <?php
            include_once "cauhinh.php";  
            include_once "checkpermission.php";  
            $ListKH =  $connect->query("select * from movies where 1");
            if(!$ListKH)
            {
                die("Unable to execute Sql statement".$connect->connect_error);
                exit();
            }
        ?>
        <table class="List" border="0" cellpadding="3" width="700" align="center">
            <tr>
                <th class="tieude1" colspan="12">
                    DANH SÁCH FILM
                </th> 
            </tr>
            <tr>
                <th>ID</th>
                <th>TÊN PHIM</th>
                <th>MÔ TẢ</th>
                <th>NĂM PHÁT HÀNH</th>
                <th>NGÔN NGỮ</th>
                <th>QUỐC GIA</th>
                <th>LINK 1</th>
                <th>LINK 2</th>
                <th>LƯỢT XEM</th>
                <th>HÌNH ẢNH</th>
                <th colspan="2">HÀNH ĐỘNG</th>
            </tr>
            <?php
                while($row = $ListKH->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<tr>";
                    echo "<td>".$row["movie_id"]."</td>";
                    echo "<td>".$row["title"]."</td>";
                    echo "<td>".$row["description"]."</td>";
                    echo "<td>".$row["release_year"]."</td>";
                    echo "<td>".$row["language"]."</td>";
                    $ListQG =  $connect->query("select country_name from country where country_id=".$row["country_id"]."");
                    if(!$ListQG)
                    {
                        die("Unable to execute Sql statement".$conn->connect_error);
                        exit();
                    }
                    $rowQG = $ListQG->fetch_array(MYSQLI_ASSOC);
                    echo "<td>".$rowQG["country_name"]."</td>";
                    echo "<td>".$row["link1"]."</td>";
                    echo "<td>".$row["link2"]."</td>";
                    echo "<td>".$row["view"]."</td>";
                    echo "<td><img src='hinhanhphim/".$row["img"]."'></td>";
                    echo "<td align='center'><a href='index.php?page_layout=capnhatfilm&id=".$row['movie_id']."'><img src='images\sua_1.png'/></a></td>";
                    echo "<td align='center'><a href='index.php?page_layout=xuly_xoafilm&id=".$row['movie_id']."' onclick='return confirm(\"Bạn có chắc chắn muốn xóa phim không?\")'><img src='images\delete.png'/></a></td>";
                    echo "</tr>";
                }
                $connect->close();
            ?>
            <tr>
                <td colspan="12" ><a href="index.php?page_layout=themmoi_film">THÊM PHIM</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
