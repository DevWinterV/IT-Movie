<?php
session_start();

// Hủy tất cả các phiên làm việc
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
header('Location: index.php');
