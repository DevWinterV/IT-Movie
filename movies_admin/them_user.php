<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TẠO TÀI KHOẢN</title>
    <STyle>
        body {
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: auto;
            background-position: center;
            transition: background-image 0.5s ease-in-out;
            background-color: #000022; 
        }

        .container {
            max-width: 300px; /* Giảm kích thước max-width */
            margin: 0 auto;
            padding: 10px; /* Giảm khoảng cách */
            background-color: #f8f8f8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: none;
            background-color: #ddd;
            font-size: 14px;
            color: #333;
            margin-top: 5px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            cursor: pointer;
            background-color: green;
            color: white;
        }

        p {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            color: red;
        }
td, th {
  border: 1px solid #ddd;
  padding: 3px;
  text-align: left;
}
td{
    width: 300px;
    height: 5px;

}
th {
  background-color: #4CAF50;
  color: white;
  height: 10px;

}

input[type="text"], input[type="submit"], input[type="reset"] {
  padding: 8px;
  border-radius: 5px;
  border: none;
  background-color: #ddd;
  font-family: Arial, sans-serif;
  font-size: 14px;
  color: #333;
  margin-right: 10px;
}

input[type="submit"]:hover, input[type="reset"]:hover {
  cursor: pointer;
  background-color: green;
  color: white;
}
p{
    background-color:white;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Times New Roman', Times, serif;
    color: red
}

#tieudebang{
    text-align: center;
}
tr{
    height:10px;
    background-color: white;
    text-align:center;
    width: 30px;
}
#txt{
    width: 250px ;
}
#tenthuoctinh{
    width: 20px ;
    height: 10px;
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
</STyle>
</head>
<body>

    <!-- Nội dung -->
    <div class="content">
<script src="javascript_register.js"></script>
<form action="xuly_themuser.php" method="post" name ="f_themuser"onsubmit="return validateForm()">
            <table border="0" cellpadding="0" align="center">
            <tr >
                    <th id ="tieudebang" colspan="2">
                        <font face="Times New Roman" size="5" color="#FFFFFF" align="CENTER">TẠO TÀI KHOẢN</font>
                    </th>
                </tr>

            <tr>
                <td id="tenthuoctinh">
                    TÊN NGƯỜI DÙNG:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "fullname" id ="txt" placeholder="Enter your full name">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    TÊN TÀI KHOẢN:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "username" id ="txt" placeholder="Enter Username">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    MẬT KHẨU:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "password" id ="txt" placeholder="Enter Password">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    XÁC NHẬN MẬT KHẨU:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "passwordxacnhan" id ="txt" placeholder="Enter Password">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    Email:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "email" id ="txt" placeholder="Enter Email">
                   *</p>
                </td>
            </tr>   
            <tr >
                <td colspan ="2">
                  <input type="submit" value="ĐĂNG KÝ" name="btndangky">
                    <input type="submit" value="HỦY" name="btnhuy">
                </td>
            </tr>
        </table>
    </form>
    <script>
      var images = [];
        var numImages = 8; // Số lượng hình ảnh
        var folderPath = "anhnen/"; // Đường dẫn tới thư mục chứa hình ảnh
        for (var i = 0; i < numImages; i++) {
            images.push(folderPath + "hinh" + i + ".jpg");
        }

        var currentIndex = 0;

        function changeBackgroundImage() {
            document.body.style.backgroundImage = "url(" + images[currentIndex] + ")";
            currentIndex = (currentIndex + 1) % images.length;

            // Gọi lại hàm changeBackgroundImage sau 3 giây
            setTimeout(changeBackgroundImage, 3000);
        }

        // Gọi hàm changeBackgroundImage ban đầu
        changeBackgroundImage();
    </script>
    </div>
</body>
</html>