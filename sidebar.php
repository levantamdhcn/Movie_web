<div id="sidebar">
  <div class="block" id="chart">
    <div class="blocktitle rounded-top justify-content-center"><i class="icon top"></i>
      <div class="title">Phim xem nhiều</div>
    </div>
    <div class="tabs d-flex w-100" data-target="#topview">
      <div id="topviewday" class="tab active px-2 order-1" style="border-top-left-radius: 0.25rem">Phim lẻ</div>
      <div id="topviewweek" class="tab px-2 order-1">Phim bộ</div>
      <div id="topviewmonth" class="tab px-2 order-1" style="border-top-right-radius: 0.25rem">Phim chiếu rạp</div>
    </div>
    <div class="blockbody rounded-bottom" id="topview">
      <ul class="tab topviewday w-100 p-0">
        <?php
          $sql = 'select * from `film` where `type_movie` = 1 order by `num_view` DESC limit 10';
          $query = mysqli_query($link, $sql);
          while($r=mysqli_fetch_assoc($query)){
        ?>
        <li>
          <div class="detail">
            <div class="name"><a style="display: block; width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" href="?mod=detail&film_id=<?php echo $r['id'] ?>" title="<?php echo $r['name'] ?>"><?php echo $r['name'] ?></a></div>
            <div class="views">Lượt xem <?php echo $r['num_view'] ?></div>
          </div>
        </li>
        <?php
          }
        ?>
      </ul>
      <ul class="tab topviewweek hide w-100 p-0">
        <?php
          $sql = 'select * from `film` where `type_movie` = 2 order by `num_view` DESC limit 10';
          $query = mysqli_query($link, $sql);
          while($r=mysqli_fetch_assoc($query)){
        ?>
        <li>
          <div class="detail">
            <div class="name"><a style="display: block; width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" href="?mod=detail&film_id=<?php echo $r['id'] ?>" title="<?php echo $r['name'] ?>"><?php echo $r['name'] ?></a></div>
            <div class="views">Lượt xem <?php echo $r['num_view'] ?></div>
          </div>
        </li>
        <?php
          }
        ?>
      </ul>
      <ul class="tab topviewmonth hide w-100 p-0">
        <?php
          $sql = 'select * from `film` where `type_movie` = 3 order by `num_view` DESC limit 10';
          $query = mysqli_query($link, $sql);
          while($r=mysqli_fetch_assoc($query)){
        ?>
        <li>
          <div class="detail">
            <div class="name"><a style="display: block; width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" href="?mod=detail&film_id=<?php echo $r['id'] ?>" title="<?php echo $r['name'] ?>"><?php echo $r['name'] ?></a></div>
            <div class="views">Lượt xem <?php echo $r['num_view'] ?></div>
          </div>
        </li>
        <?php
          }
        ?>
      </ul>
    </div>
    <script type="text/javascript">
      $('#topviewday').click(function(){
        $(this).addClass('active');
        $('#topviewweek').removeClass('active');
        $('#topviewmonth').removeClass('active');
        $('ul.topviewday').removeClass('hide');
        $('ul.topviewweek').addClass('hide');
        $('ul.topviewmonth').addClass('hide');
      })
      $('#topviewweek').click(function(){
        $(this).addClass('active');
        $('#topviewday').removeClass('active');
        $('#topviewmonth').removeClass('active');
        $('ul.topviewweek').removeClass('hide');
        $('ul.topviewday').addClass('hide');
        $('ul.topviewmonth').addClass('hide');
      })
      $('#topviewmonth').click(function(){
        $(this).addClass('active');
        $('#topviewweek').removeClass('active');
        $('#topviewday').removeClass('active');
        $('ul.topviewmonth').removeClass('hide');
        $('ul.topviewweek').addClass('hide');
        $('ul.topviewday').addClass('hide');
      })
    </script>
  </div>
</div>
