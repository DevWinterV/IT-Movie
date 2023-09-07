<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thể Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        form {
            max-width: 300px;
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
    </style>
</head>
<body>


    <!-- Nội dung -->
    <div class="content">
    <script>
        function goToAddFim() {
        window.location.href = "index.php?page_layout=list_theloai";
    }
    </script>
    <h1>Thêm Thể Loại</h1>
    <form action="xuly_themtheloai.php" method="post">
        <label for="txtTenQuocGia">Tên Thể loại:</label>
        <input type="text" name="txtTenQuocGia" id="txtTenQuocGia" placeholder="Nhập tên thể loại" required>
        <input type="submit" value="Thêm" name="btnThem">
        <input type="button" value="Hủy" name="btnhuy" onclick ="goToAddFim()">
    </form>
    </div>
</body>
</html>
