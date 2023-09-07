<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH TÀI KHOẢN XEM PHIM </title>
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

            $ListKH =  $connect->query("select * from users where 1");
            if(!$ListKH)
            {
                die("Unable to execute Sql statement".$connect->connect_error);
                exit();
            }
        ?>
        <table class="List" border="0" cellpadding="3" width="700" align="center">
            <tr>
                <th class="tieude1" colspan="6">
                    DANH SÁCH TÀI KHOẢN
                </th> 
            </tr>
            <tr>
                <th>ID</th>
                <th>TÊN</th>
                <th>USERNAME</th>
                <th>MẬT KHẨU</th>
                <th>EMAIL</th>
                <th colspan="2">HÀNH ĐỘNG</th>
            </tr>
            <?php
                while($row = $ListKH->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<tr>";
                    echo "<td>".$row["user_id"]."</td>";
                    echo "<td>".$row["fullname"]."</td>";
                    echo "<td>".$row["username"]."</td>";
                    echo "<td>".$row["password"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td align='center'><a href='index.php?page_layout=capnhattaikhoan&id=".$row['user_id']."'><img src='images\sua_1.png'/></a></td>";
                    echo "<td align='center'><a href='index.php?page_layout=xuly_xoauser&id=".$row['user_id']."' onclick='return confirm(\"Bạn có chắc chắn muốn xóa người dùng không?\")'><img src='images\delete.png'/></a></td>";
                    echo "</tr>";
                }
                $connect->close();
            ?>
            <tr>
                <td colspan="12" ><a href="index.php?page_layout=them_user">THÊM TÀI KHOẢN</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
