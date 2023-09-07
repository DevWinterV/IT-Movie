<?php
include_once "cauhinh.php";
    $IDKH = $_GET['id'];
    $query = "delete FROM genres WHERE theloai_id = $IDKH ";
    if($connect->query($query) === true)
    {
        header("Location: index.php?page_layout=list_theloai");
    }
    else
    {
        echo "Lỗi: ".$query."<br>".$connect->error;
    }
    $connect->close();
?>