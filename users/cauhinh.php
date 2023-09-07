<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movefilm";			
	$connect = new mysqli($servername, $username, $password, $dbname);	
	//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
	if ($connect->connect_error) {
	    die("Không thể kết nối :" . $connect->connect_error);
	    exit();
	}	
	
?>
