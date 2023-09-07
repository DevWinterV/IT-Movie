<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header('Location: ../users/login.php');
    exit();
}
?>