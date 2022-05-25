<div id="footer" class="shadow">
  <div class="footer-wrapper">
    <div class="container">
      <div class="row">
        <div class="col col-lg-3">
          <div class="footer-left">
            <img src="images/logo.png" class="mb-3" alt="logo" width="100">
            <p class="desc">
              Xem phim mới miễn phí nhanh chất lượng cao. Xem Phim online Việt Sub, Thuyết minh, lồng tiếng chất lượng HD. Xem phim nhanh online chất lượng cao
            </p>
          </div>
        </div>
        <div class="col col-lg-7 justify-content-between">
          <div class="row">
            <div class="col col-lg-4">
              <div class="footer-title">Phim Mới</div>
              <ul class="footer-list">
                <?php
                  $sql = 'select * from `series-movie`';
                  $query1 = mysqli_query($link,$sql);
                  while($r=mysqli_fetch_assoc($query1)){
                ?>
                <?php
                  echo '<li class=""><a title="'.$r['name'].'" href="?mod=list&type=series-movie&year='.$r['year'].'">'.$r['name'].'</a></li>';
                ?>
                <?php
                  }
                ?>
              </ul>
            </div>

            <div class="col col-lg-4">
              <div class="footer-title">Phim Lẻ</div>
              <ul class="footer-list">
                <?php
                  $sql = 'select * from `single-movie`';
                  $query1 = mysqli_query($link,$sql);
                  while($r=mysqli_fetch_assoc($query1)){
                ?>
                <?php
                  echo '<li class=""><a title="'.$r['name'].'" href="?mod=list&type=single-movie&year='.$r['year'].'">'.$r['name'].'</a></li>';
                ?>
                <?php
                  }
                ?>
              </ul>
            </div>

            <div class="col col-lg-4">
              <div class="footer-title">Phim Chiếu Rạp</div>
              <ul class="footer-list">
                <?php
                  $sql = 'select * from `theater-movie`';
                  $query1 = mysqli_query($link,$sql);
                  while($r=mysqli_fetch_assoc($query1)){
                ?>
                <?php
                  echo '<li class=""><a title="'.$r['name'].'" href="?mod=list&type=theater-movie&year='.$r['year'].'">'.$r['name'].'</a></li>';
                ?>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col col-lg-2">
          <p style="font-size: 13px; color: #808080"> 
          <i class="fas fa-envelope d-inline-block"></i>
          Email liên hệ: 
            <a href="mailto:netflix@gmail.com">
              netflix@gmail.com
            </a>
          </p>
        </div>
    </div>
  </div>
</div>
