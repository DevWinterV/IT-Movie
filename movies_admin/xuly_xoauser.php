<?php
include_once "cauhinh.php";
    $IDKH = $_GET['id'];
    $query = "delete FROM users WHERE user_id = $IDKH ";
    if($connect->query($query) === true)
    {
        header("Location: index.php?page_layout=list_user");
    }
    else
    {
        echo "Lỗi: ".$query."<br>".$connect->error;
    }
    $connect->close();
?>