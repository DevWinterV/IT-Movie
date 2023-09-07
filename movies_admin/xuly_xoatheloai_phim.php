<?php
include_once "cauhinh.php";
    $idmovie = $_GET['id'];
    $idtheloai = $_GET['id2'];
    $query = "DELETE FROM movie_genre WHERE `movie_genre`.`movie_id` = $idmovie AND `movie_genre`.`theloai_id` = $idtheloai";
    if($connect->query($query) === true)
    {
        header("Location: index.php?page_layout=list_theloai_phim");
    }
    else
    {
        echo "Lỗi: ".$query."<br>".$connect->error;
    }
    $connect->close();
?>