<?php
  if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
  $sql = "select * from `film` where `id` = '$film_id'";
  $query= mysqli_query($link, $sql);
  $r=mysqli_fetch_assoc($query);
?>
<div id="content">
  <div class="block" id="page-info">
    <div class="blocktitle breadcrumbs mt-4 mb-3">
        <div class="item">
            <a href="?mod=home" title="Xem Phim Nhanh, Xem Phim Online chất lượng cao miễn phí">
                <span>Xem phim <i class="fas fa-chevron-right ml-2"></i></span>
            </a>
        </div>
        <div class="item">
            <?php
              $type_movie = $r['type_movie'];
              $sql = "select * from `type-movie` where `id` = '$type_movie'";
              $query= mysqli_query($link, $sql);
              $r1=mysqli_fetch_assoc($query);

              $category = $r['category_id'];
              $cat_sql = "select * from `category` where `id` = '$category'";
              $cat_query= mysqli_query($link, $cat_sql);
              $cat_result=mysqli_fetch_assoc($cat_query);  
            ?>
            <a href="?mod=list&type=<?php echo $r1['handle'] ?>&year=2018"><span><?php echo $r1['name'] ?></span> <i class="fas fa-chevron-right ml-2"></i></a>
        </div>
        <div class="item last-child">
            <span itemprop="title"><?php echo $r['name'] ?></span>
        </div>
    </div>
    <div class="info">
        <h2 class="title fr"><?php echo $r['name'] ?></h2>
        <div class="poster"><a href="#" title="Xem phim <?php echo $r['name'] ?>"><img class="rounded" src="<?php echo $r['image'] ?>" alt="<?php echo $r['name'] ?>"></a></div>
        <div class="name2 fr">
            <h3><?php echo $r['name2'] ?></h3><span class="year" style="font-size:12px"></span>
        </div>
        <div class="dinfo">
            <div class="col1 fr">
                <ul>
                    <li>Trạng thái: <span style="color: var(--main-color); font-size: 13px;"><?php echo $r['status'] ?></span></li>
                    <li>Đạo diễn: <?php echo $r['director'] ?></li>
                    <li>Diễn viên: <?php echo $r['actor'] ?></li>
                    <li>Thể loại: <a href="the-loai/phim-hanh-dong/" title="Phim Hành Động"><?php echo $cat_result['name'] ?></a></li>
                </ul>
            </div>
            <div class="col2">
                <ul>
                    <?php
                      $nation_id = $r['nation_id'];
                      $sql = "select * from `nation` where `id` = '$nation_id'";
                      $query=mysqli_query($link,$sql);
                      $r2=mysqli_fetch_assoc($query);
                    ?>
                    <li>Quốc gia: <a href="?mod=list&type=nation&id=<?php echo $r2['id'] ?>" title="Phim <?php echo $r2['name'] ?>"><?php echo $r2['name'] ?></a></li>
                    <li>Thời lượng: <?php echo $r['duration'] ?> Phút</li>
                    <li>Lượt xem: <?php echo $r['num_view'] ?></li>
                    <li>Đăng bởi: <?php echo $r['author'] ?></li>
                </ul>
            </div>
        </div>
        <div class="groups-btn">
            <a href=<?php if($_SESSION["vip"] == true) {
                echo "?mod=watch&film_id=" . $r['id'] . "&episode=1";
            } else {
                echo "choosePayment.php";
            } ?>>
                <div class="btn-watch fr hover-effect">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <?php if($_SESSION["vip"] == true) {
                        echo "Xem ngay";
                    } else {
                        echo "Đăng ký để xem ngay";
                    } ?>
                </div>
            </a>
        </div>
    </div>
    <div class="detail">
        <div class="blocktitle tab" style="font-size: 14px; font-weight: 600;">Thông tin phim: </div>
        <div class="content rounded">
            <p class="mb-2" style="font-size: 14px;">Nội dung phim <span class="ml-1" style="color: var(--main-color); font-weight: 500;"><?php echo $r['name'] ?></span> :</p>
            <p><?php echo $r['description'] ?></p>
        </div>
    </div>
  </div>
</div>
