<?php
include_once "cauhinh.php";
    $IDKH = $_GET['id'];
    $query = "delete FROM movies WHERE movie_id = $IDKH ";
    if($connect->query($query) === true)
    {
        header("Location: index.php?page_layout=listfilm");
    }
    else
    {
        echo "Lỗi: ".$query."<br>".$connect->error;
    }
    $connect->close();
?>