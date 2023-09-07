<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="style_users.css">
</head>

<body>
    <script>
        function validateForm() {
            var email = document.forms["forgot-password-form"]["email_username"].value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Vui lòng nhập địa chỉ email hợp lệ! (example@gmail.com)");
                document.forms["forgot-password-form"]["email_username"].focus();
                return false;
            }
            return true;
        }
    </script>
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
    <div class="forgot-password-container">
        <h2>Khôi phục mật khẩu</h2>
        <form id="forgot-password-form" action="xuly_forgot_password.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email_username">Email:</label>
                <input type="text" id="email_username" name="email_username" required>
            </div>
            <div class="button-container">
                <button type="submit" class="btn">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
</body>

</html>
