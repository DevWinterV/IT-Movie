<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ TÀI KHOẢN</title>
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
</STyle>
</head>
<body>
<script src="javascript_register.js"></script>
<form action="xuly_register.php" method="post" name ="f_themuser"onsubmit="return validateForm()">
            <table border="0" cellpadding="0" align="center">
            <tr >
                    <th id ="tieudebang" colspan="2">
                        <font face="Times New Roman" size="5" color="#FFFFFF" align="CENTER">Đăng ký tài khoản</font>
                    </th>
                </tr>

            <tr>
                <td id="tenthuoctinh">
                    Họ tên:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "fullname" id ="txt" placeholder="Họ tên">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    Username:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "username" id ="txt" placeholder="Tên tài khoản">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    Mật khẩu:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="password" name = "password" id ="txt" placeholder="Nhập mật khẩu">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    Xác nhận mật khẩu:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="password" name = "passwordxacnhan" id ="txt" placeholder="Xác nhận lại mật khẩu">
                   *</p>
                </td>
            </tr>
            <tr>
                <td id="tenthuoctinh">
                    Email:
                </td>
                <td>
                <p id ="danhdau">
                    <input type="text" name = "email" id ="txt" placeholder="Nhập Email">
                   *</p>
                </td>
            </tr>   
            <tr>
                <td id="tenthuoctinh">
                   Quyền hạn:
                </td>
                <td>
                <p id ="danhdau">
                <input type="radio" name="myRadio" id="radio2" value="0" checked>Người dùng xem phim
                   *</p>
                </td>
            </tr>  
            <tr >
                <td colspan ="2">
                  <input type="submit" value="ĐĂNG KÝ" name="btndangky">
                    <input type="reset" value="HỦY" name="btnhuy" onclick="goToLogin()">
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
</body>
</html>