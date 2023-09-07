<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="style_users.css">
</head>
<body>      
    <div class="login-container">
            <h2>Login to Film Website</h2>
            <form id="login-form" action="xuly_login.php" method="post" >
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="forgot-password">
                    <a href="forgot_password.php">Quên mật khẩu?</a>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn">Login</button>
                    <button type="button" class="btn-register">
                        <a href="register.php" style="text-decoration:none; color:inherit;">Register</a>
                    </button>
                </div>
            
            </form>
        </div>
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
            setTimeout(changeBackgroundImage, 2000);
        }

        // Gọi hàm changeBackgroundImage ban đầu
        changeBackgroundImage();
    </script>
</body>
</html>
