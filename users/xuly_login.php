<html>
	<body>
	<?php	
		session_start();
		$email = $_POST['email'];
		$MatKhau = $_POST['password'];
		$error = "";
		
		if(trim($email) == "")
			$error = "Vui lòng nhập tên đăng nhập!";
		else if(trim($MatKhau) == "")
			$error = "Vui lòng nhập mật khẩu!";
		else 
		{
			include_once "cauhinh.php";
			
			$sql = "SELECT * FROM `Users` WHERE email = '$email' AND password= '$MatKhau'";
			$danhsach = $connect->query($sql);
			
			//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
			if (!$danhsach) {
				die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
				exit();
			}
			
			$row = $danhsach->fetch_array(MYSQLI_ASSOC);
			
			if($row != null)
			{
				if(($email == $row['email']) && ($MatKhau = $row['password']))
				{
					//thiết lập SESSION mã người dùng
					$_SESSION['username'] =  $row['username'];		
					$_SESSION['user_id'] =  $row['user_id'];	
					$_SESSION['email'] =  $row['email'];	
					$_SESSION['role'] =  $row['role'];	
					//thiết lập SESSION họ và tên
					$_SESSION['fullname'] =  $row['fullname'];		
					if (isset($_SESSION['redirect'])) {
						$redirectURL = $_SESSION['redirect'];
						if($_SESSION['role']==0)// nguoi  dùng
						{
							unset($_SESSION['redirect']); // Xóa thông tin trang chuyển hướng khỏi phiên
							header("Location: " . $redirectURL);
							exit();
						}
						else// admin
						{
							header("Location: ../movies_admin/index");
							exit();
						}
					} else {
						// Nếu không có URL chuyển hướng, chuyển hướng đến trang mặc định (ví dụ: index.php)
						if($_SESSION['role'] ==1)
						{
							header("Location: ../movies_admin/index");
							exit();
						}
						else
						{
							header("Location: ../users/index");
							exit();
						}
					}
				}	
				else
				{
					$error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.";
				}	
				
				//Đóng database
				$connect->close();
			}
			else
			{
				$error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.";
				$connect->close();
			}
		}		
	
	?>	
	
	<!-- Hiển thị thông báo và form đăng nhập -->
	<?php if ($error != "" && $error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại." ): ?>
		<script>
			window.location.href = 'login.php';
			alert("<?php echo $error; ?>");
		</script>
	<?php endif; ?>
	
	
	</body>
</html>
