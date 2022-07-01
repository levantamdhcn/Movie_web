<?php
  require('libs/db.php');
  session_start();
  error_reporting(E_ALL);
  $mod='setupPayment';
?>

<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/icons/css/all.css" type="text/css" rel="stylesheet" >
  <link href="css/owl.carousel.css" type="text/css" rel="stylesheet"> 
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/owl.carousel.js" type="text/javascript"></script>
  <script src="js/jwplayer.js"></script>

  <link href="css/style_info_account.min.css" type="text/css" rel="stylesheet"> 
  <link href="css/style.min.css" type="text/css" rel="stylesheet">   

</head>
  <body style="position: relative;">
    <div id="wrapper">
        <header 
          class="simple-header border border-secondary border-bottom-1 border-top-0 border-left-0 border-right-0">
            <div class="container d-flex justify-content-between align-items-center">
              <div id="logo">
                  <a href="index.php" title="Trang chủ"></a>
              </div>
              <button id="logout" name="log_out">Đăng xuất</button>
            </div>
        </header>
        <div class="simpleContainter">
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="d-flex flex-column align-items-center">
                            <div class="paymentPickerHeading">
                                <div class="securityCircle">
                                    <i class="far fa-lock"></i>
                                </div>
                            </div>
                            <div class="paymentPickerTitle">
                                Chọn gói dịch vụ của bạn
                            </div>
                            <ul class="paymentPickerSlogs">
                                <li class="paymentPickerSlog">
                                    <i class="fas fa-check"></i>
                                    Không yêu cầu cam kết, hủy bất kỳ lúc nào.</li>
                                <li class="paymentPickerSlog">
                                    <i class="fas fa-check"></i>
                                    Mọi thứ trên Netflix chỉ với mức giá thấp.</li>
                                <li class="paymentPickerSlog">
                                    <i class="fas fa-check"></i>
                                    Không quảng cáo, không phụ phí. Luôn luôn như vậy.</li>
                            </ul>
                            <a href="choosePayment.php" id="next" name="next_step">Tiếp theo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <?php
          include("footer.php");
        ?>
    </div>
  </body>
</html>