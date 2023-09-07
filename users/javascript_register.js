function validateForm() {
    var fullname = document.forms["f_themuser"]["fullname"].value;
    var username = document.forms["f_themuser"]["username"].value;
    var password = document.forms["f_themuser"]["password"].value;
    var email = document.forms["f_themuser"]["email"].value;

    if (fullname == "") {
        alert("Vui lòng nhập họ tên!");
        document.forms["f_themuser"]["fullname"].focus(); // Đặt trạng thái tập trung vào trường họ tên
        return false;
    }
      // Kiểm tra họ tên không chứa số
      var namePattern = /\D/;
      if (!namePattern.test(fullname)) {
          alert("Họ tên không được chứa số!");
          document.forms["f_themuser"]["fullname"].focus();
          return false;
      }
    if (username == "") {
        alert("Vui lòng nhập tên người dùng!");
        document.forms["f_themuser"]["username"].focus(); // Đặt trạng thái tập trung vào trường tên người dùng
        return false;
    }

    if (password == "") {
        alert("Vui lòng nhập mật khẩu!");
        document.forms["f_themuser"]["password"].focus(); // Đặt trạng thái tập trung vào trường mật khẩu
        return false;
    }

    if (email == "") {
        alert("Vui lòng nhập địa chỉ email!");
        document.forms["f_themuser"]["email"].focus(); // Đặt trạng thái tập trung vào trường địa chỉ email
        return false;
    }
      // Kiểm tra định dạng email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Vui lòng nhập địa chỉ email hợp lệ!. (example@gmail.com");
        document.forms["f_themuser"]["email"].focus();
        return false;
    }
    return true;
}
function goToLogin() {
    window.location.href = "login.php";
}