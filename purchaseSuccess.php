<?php
  session_start();
  require('libs/db.php');
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  error_reporting(E_ALL);
  if(isset($_GET["plan"])) {
    $plan_id = $_GET["plan"];
    $sqlDate = "select date_count from plan where plan_id = $plan_id";
    $dateCount = mysqli_fetch_array(mysqli_query($link, $sqlDate))['date_count'];
    $till_date = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s") . '+ ' . (int)$dateCount . ' days'));
    $currentDate = date('Y-m-d H:i:s');
    $user_id = $_SESSION['user_id'];
    $duplicateSub = mysqli_fetch_array(mysqli_query($link, "select * from subscriptions where user_id = $user_id"));
    if(mysqli_num_rows(mysqli_query($link, "select * from subscriptions where user_id = $user_id")) > 0) {
        if($duplicateSub["valid_till"] <= $currentDate) {
            $sqlUpdateData = "update subscriptions set valid_till = '$till_date' where user_id = $user_id";
            mysqli_query($link,$sqlUpdateData);
        }
        else {
            $new_till_date = date('Y-m-d H:i:s', strtotime($duplicateSub["valid_till"] . '+ ' . (int)$dateCount . ' days'));
            $sqlUpdateData = "update subscriptions set valid_till = '$new_till_date' where user_id = $user_id";
            mysqli_query($link,$sqlUpdateData); 
        }
        
    }
    else {
        $sqlInsertData = "INSERT INTO subscriptions(user_id,plan_id,valid_till,createAt) VALUES($user_id, $plan_id,'$till_date','$currentDate')";
        mysqli_query($link, $sqlInsertData);
    }

    mysqli_query($link, "INSERT INTO bill(user_id,plan_id,create_at) VALUES($user_id,$plan_id,'$currentDate')"); 
  }
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
  <link href="css/paymentPicker.css" type="text/css" rel="stylesheet">   
  <link href="css/style.min.css" type="text/css" rel="stylesheet">   

</head>
  <body style="position: relative;">
    <script src="https://www.paypal.com/sdk/js?client-id=Acu4zqMtKmxNgKNlHJDnX3YkwqKpPJX75uvSg3sODnU8v_Hpj_Hy9BEyGeILiSV8EfXbu7EQWWR2ChSX&currency=USD"></script>
    <div id="wrapper" class="bg-white">
        <header 
          class="simple-header border border-secondary border-bottom-1 border-top-0 border-left-0 border-right-0">
            <div class="container d-flex justify-content-between align-items-center">
              <div id="logo">
                  <a href="index.php" title="Trang chủ"></a>
              </div>
              <button id="logout" name="log_out">Đăng xuất</button>
            </div>
        </header>
        <div class="simpleContainter" style="overflow: scroll">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6 offset-md-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="paymentPickerHeading">
                                <div class="successCircle">
                                </div>
                            </div>
                            <div class="paymentPickerTitle text-dark">
                                Thanh toán thành công
                            </div>
                            <ul class="paymentPickerSlogs">
                                <li class="paymentPickerSlog text-dark font-weight-bold text-center text-muted">
                                    Bạn có thể bắt đầu trải nghiệm thế giới phim ngay bây giờ
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6 offset-md-3 text-center mt-3">
                        <div id="paypal-button-container"></div>
                        <!-- <ul class="payment-method-list w-full">
                            <li class="payment-method w-full">
                                <div class="d-flex align-items-center">
                                    <a href="">Ví điện tử Paypal</a>
                                    <img src="./images/paypal.png" alt="">
                                </div>
                                <div class="px-3">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </li>
                            <li class="payment-method w-full">
                                <div class="d-flex align-items-center">
                                    <a href="">Ví điện tử Momo</a>
                                    <img src="./images/momo.png" alt="">
                                </div>
                                <div class="px-3">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <div class="row">
                    <form action="index.php" method="POST" class="col col-md-6 offset-md-3 text-center">
                        <button id="next" name="next_step">Tiếp theo</button>
                    </form>
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

