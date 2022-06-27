<?php
        if (!empty($_POST['film_id']) && !empty($_POST['percent'])) {
            $percent = $_POST['percent'];
            $film_id = $_POST['film_id'];
            if($percent >= 10){
                $sqlGet = "select * from `film` where `id` = '$film_id'";
                $queryGet = mysqli_query($link, $sqlGet);
                $rGet = mysqli_fetch_assoc($queryGet);
                $view = $rGet['num_view'] + 1;
                $sqlUpdate = "UPDATE `film` SET`num_view`='$view' WHERE  `id` = '$film_id'";
                $queryUpdate = mysqli_query($link, $sqlUpdate);
            }
        }
