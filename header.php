<div id="header">
  <div class="container d-flex align-items-center justify-content-between">
    <h1 id="logo"><a href="index.php" title="Trang chủ"></a></h1>
    <div id="search">
      <form method="post" action="?mod=search">
        <input type="text" autocomplete="off" name="kw" placeholder="Tìm phim..." class="keyword">
        <button type="submit" class="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <div id="sign">
<!-- Van modified ↓↓ -->
<?php if(empty($_SESSION["username"])){?>
  <div class="login"><a rel="nofollow" id="log">Đăng nhập</a>
      <div class="login-form" id="login-form" style="display: none;">
        <form method="post" action="login.php">
          <div>
            <input type="text" placeholder="Tên đăng nhập" class="input username" name="username">
          </div>
          <div>
            <input type="password" placeholder="Mật khẩu" class="input password" name="password">
          </div>
          <div class="mt-2 text-right">
            <a href="forget.php" style="font-size:12px">Quên mật khẩu</a>
          </div>
          <div class="mt-2 d-flex align-items-center justify-content-between">
            <div>
              <label for="remember" class="remember d-flex align-items-center">
                <input id="remember" type="checkbox" checked="checked" class="checkbox" name="remember"> Remember
              </label>
            </div>
          <button type="submit" class="submit" name="btn_login">Đăng nhập</button>
          </div>
        </form>
      </div>
  </div>
  <div class="links"><a rel="nofollow" href="register.php">Đăng ký thành viên</a></div>

<?php } else {?>
<!-- <div class="login"><a rel="nofollow" href="" name="log_out">Đăng xuất</a></div> -->
  <form method="post" action="">
      <button id="logout" name="log_out">Đăng xuất</button>
      <a rel="nofollow" href="info_account.php">Thay đổi thông tin</a></div>
      <span type="text" style="margin-top:10px">&nbsp&nbsp Xin chào <?php echo $_SESSION["username"]?>
  </form>
<?php } ?>
<style>
  #logout {
    background-color: var(--main-color);
    cursor: pointer;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    padding: 9px 16px;
    border-radius: 4px;
    text-align: center;
    transition: all 0.2s;
    color: #fff;
    border: none;
    margin-right: 10px;
  }
</style>

</div>
</div>
</div>
    <script type="text/javascript">
      var x = document.getElementById("login-form");
      $('#log').on('click', function(){
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
      });
    </script>

    <?php
        if(isset($_POST["log_out"])){
            ?>
            <!-- <script>
            alert("ádfghjh");
            </script> -->
            <?php
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
            header('Location:index.php');
        }
    ?>
<!-- Van modified ↑↑ -->
<div id="nav">
  <ul class="">
    <li class="home">
      <a href="index.php" title="">
        <i class="fas fa-home"></i>
      </a>
    </li>
    <?php
      $sql = 'select * from `nav-menu`';
      $query = mysqli_query($link,$sql);
      while($r=mysqli_fetch_assoc($query)){
    ?>
      <li class=""><a class="nav-menu-item"><?php echo $r['name']; ?></a>
        <ul class="sub-menu shadow" style="width: 300px; display: none;">
          <?php
            $handle = $r['handle'];
            $sql = 'select * from `'.$handle.'`';
            $query1 = mysqli_query($link,$sql);
            while($r1=mysqli_fetch_assoc($query1)){
          ?>
          <?php
            if ($handle == 'category' or $handle == 'nation') {
              echo '<li class=""><a title="'.$r1['name'].'" href="?mod=list&type='.$handle.'&id='.$r1['id'].'">'.$r1['name'].'</a></li>';
            }
            else {
              echo '<li class=""><a title="'.$r1['name'].'" href="?mod=list&type='.$handle.'&year='.$r1['year'].'">'.$r1['name'].'</a></li>';
            }
          ?>
          <?php
            }
          ?>
        </ul>
      </li>
    <?php
      }
    ?>
  </ul>
</div>
