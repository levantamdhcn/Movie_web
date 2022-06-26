<?php
if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
if (isset($_GET['episode'])) $episode = $_GET['episode'];
$sql = "select * from `episode` where `film_id` = '$film_id' and `episode` = '$episode'";
$query = mysqli_query($link, $sql);
$r = mysqli_fetch_assoc($query);
function view($id)
{
    $sqlView = "update film SET num_view = num_view + 1 WHERE id = $id";
    // $query1 = mysqli_query($link, $sqlView);
}
?>
<div id="content" style="margin-top:40px">
    <div id="movie-display">
        <div class="row no-gutters cur-location">
            <div class="col col-sm-12">
                <nav id="breadcrumb" class="w-100 h-100">
                    <ul class="breadcrumb w-100 h-100 rounded-0 shadow">
                        <li class="breadcrumb-item">
                            <a href="?mod=home">Xem phim</a>
                        </li>
                        /
                        <li class="breadcrumb-item">
                            <?php
                            if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
                            $sql = "select * from `film` where `id` = '$film_id'";
                            $query = mysqli_query($link, $sql);
                            $r1 = mysqli_fetch_assoc($query);
                            $type_movie = $r1['type_movie'];
                            $sql2 = "select * from `type-movie` where `id` = '$type_movie'";
                            $query = mysqli_query($link, $sql2);
                            $r2 = mysqli_fetch_assoc($query);
                            ?>
                            <a href="?mod=list&type=<?php echo $r2['handle'] ?>&year=2018"><?php echo $r2['name'] ?></a>
                        </li>
                        /
                        <?php
                        $sql = "select * from `film` where `id` = '$film_id'";
                        $query = mysqli_query($link, $sql);
                        $r3 = mysqli_fetch_assoc($query);
                        ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $r3['name'] ?></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row body_video">
            <div class="col-sm-12">
                <video width="100%" height="100%" controls id="#myvideo<?php echo $r['film_id'] ?>">
                    <source src="<?php echo $r['content'] ?>" type="video/mp4">
                    <!-- <src="https://www.w3schools.com/tags/movie.mp4" type="video/mp4"> -->
                </video>
            </div>
        </div>
        <script>
            var vid = document.getElementById("#myvideo<?php echo $r['film_id'] ?>");
            vid.ontimeupdate = function() {
                var data = onTrackedVideoFrame()
                if (da > 10) {
                    <?php
                    if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
                    $sqlGet = "select * from `film` where `id` = '$film_id'";
                    $queryGet = mysqli_query($link, $sqlGet);
                    $rGet = mysqli_fetch_assoc($queryGet);
                    $view = $rGet['num_view'] + 1;
                    $sqlUpdate = "UPDATE `film` SET`num_view`='$view' WHERE  `id` = '$film_id'";
                    $queryUpdate = mysqli_query($link, $sqlUpdate);
                    ?>
                }
            };

            function onTrackedVideoFrame() {
                var percent = (vid.currentTime / vid.duration) * 100
                return percent
            }
        </script>
        <div class="row video-info mt-3">
            <?php
            if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
            $sql = "select * from `film` where `id` = '$film_id'";
            $query = mysqli_query($link, $sql);
            $result1 = mysqli_fetch_assoc($query);
            ?>
            <div class="col col-sm-12">
                <h6>
                    <?php echo $result1['name'] ?>
                </h6>
            </div>
        </div>
    </div>
    <div id="server-list" class="d-flex">
        <p class="m-0 mr-2" style="font-size: 14px;">Chọn tập: </p>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col">
                        <ul class="episode-list">
                            <?php
                            $query = mysqli_query($link, "select * from `episode` where `film_id` = '$film_id'");
                            while ($r4 = mysqli_fetch_assoc($query)) {
                            ?>
                                <li>
                                    <a href="?mod=watch&film_id=<?php echo $r4['film_id'] ?>&episode=<?php echo $r4['episode'] ?>" class="button btn-secondary seat">
                                        <?php echo $r4['episode_name'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>