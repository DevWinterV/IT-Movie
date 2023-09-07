<?php
  // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION['username']) && !isset($_SESSION['role'])) {
        // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập và truyền URL chi tiết phim
        $movieURL = "index.php?page_layout=xemphim&id=$id"; // Thay đổi URL chi tiết phim tương ứng
        $_SESSION['redirect'] = $movieURL;
       // header("Location: login.php?redirect=" . urlencode($movieURL));
        echo "<h2 class='thongbao'>Vui lòng đăng nhập để xem phim!</h2>";
        exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php
    include_once "doPage.php";
    include_once "cauhinh.php";
    $ID = $_GET['id'];
    $quey = "select * from users where user_id =$ID";
    $user = $connect->query($quey);
    if(!$user)
    {
        die("Unable to execute Sql statement".$connect->connect_error);
        exit();
    }
    $row = $user->fetch_array(MYSQLI_ASSOC);
?>
<style>
    /* stylenguoidung.css */
.chitietnguoidung {
    margin-top: 10px;
    align-items: center;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.name {
  font-weight: bold;
  color: #333;
}

.email {
  color: #007bff;
}

.quyen {
  font-style: italic;
  
}


</style>

</head>
<body>
    <div class="chitietnguoidung">   
        <?php
                echo "<p class='name'>Full name: " . $row['fullname'] . ".</p>";
                echo "<p class='email'>Địa chỉ Email: " . $row['email'] . "</p>";
                echo "<p class='name'>Tên tài khoản: " . $row['username'] . "</p>";
          ?>
        <form action="changepassword.php?id=<?php echo"$ID"; ?>" method="post">
        <input type="password" name="current_password" placeholder="Mật khẩu hiện tại" required>
        <input type="password" name="new_password" placeholder="Mật khẩu mới" required>
        <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu mới" required>
        <input type="submit" value="Đổi mật khẩu">
    </form>
    </div>
</body>
</html>
