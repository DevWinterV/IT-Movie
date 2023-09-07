<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XEM DANH SÁCH THỂ LOẠI - PHIM </title>
    <link rel="stylesheet" href="style.css"></head>
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
<body>
    <div class="content">
    <?php
        include_once "cauhinh.php";    
        include_once "checkpermission.php";  

        $ListKH =  $connect->query("select * from movie_genre where 1");
        if(!$ListKH)
        {
            die("Unable to execute Sql statement".$connect->connect_error);
            exit();
        }
    ?>
    <table  class="List" border="0" cellpadding="3" width="700" align="center">
            <tr >
                    <th class ="tieude1" colspan="4">
                       DANH SÁCH THỂ LOẠI - PHIM 
                    </th>
                </tr>
            <Tr >
              <th>TÊN PHIM</th> <th>TÊN THỂ LOẠI</th> 
              <th colspan="2">HÀNH ĐỘNG</th>
            </Tr>
            <?php
                echo"<tr>";
                $ListGenres_Movies =  $connect->query("SELECT * FROM `movie_genre`, genres, movies WHERE movie_genre.theloai_id = genres.theloai_id and movie_genre.movie_id = movies.movie_id");
                if(!$ListGenres_Movies)
                {
                        die("Unable to execute Sql statement".$conn->connect_error);
                        exit();
                }
                while($rowGenres_Movie = $ListGenres_Movies->fetch_array(MYSQLI_ASSOC)){
                echo"<td>".$rowGenres_Movie["title"]."</td>";
                echo"<td>".$rowGenres_Movie["ten_theloai"]."</td>";
                echo "<td align='center'><a href='index.php?page_layout=capnhattheloai_phim&id=".$rowGenres_Movie['movie_id']."&id2=".$rowGenres_Movie['theloai_id']."'><img src='images\sua_1.png'/></a></td>";
                echo "<td align='center'><a href='index.php?page_layout=xuly_xoatheloai_phim&id=".$rowGenres_Movie['movie_id']."&id2=".$rowGenres_Movie['theloai_id']."' onclick='return confirm(\"Bạn có chắc chắn muốn xóa thể loại - phim không?\")'><img src='images\delete.png'/></a></td>";
                echo"</tr>";
                }
            ?>
            <tr>
              <td colspan="2" ><a href="index.php?page_layout=themtheloai_phim">THÊM</a></td>
            </tr>
    </table>     
    </div>    
</body>
</html>
