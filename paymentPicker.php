<?php
  require('libs/db.php');
  session_start();
  error_reporting(E_ALL);
  $mod='setupPayment';
  if(isset($_POST["next_step"])) {
    $plan_id = $_POST["next_step"];
    $sql = "select price from plan where plan_id = $plan_id";
    $result = mysqli_fetch_array(mysqli_query($link, $sql));
    $convertPrice  = number_format((float)$result["price"] / 22000, 2, '.', '');;
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
                                <div class="securityCircle">
                                    <i class="far fa-lock"></i>
                                </div>
                            </div>
                            <div class="paymentPickerTitle text-dark">
                                Chọn phương thức thanh toán
                            </div>
                            <ul class="paymentPickerSlogs">
                                <li class="paymentPickerSlog text-dark font-weight-bold text-center text-muted">
                                    Tư cách thành viên của bạn sẽ bắt đầu ngay khi bạn thiết lập thanh toán.
                                </li>
                                <li class="paymentPickerSlog text-dark font-weight-bold text-center">
                                    Không yêu cầu cam kết.
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
                    <div class="col col-md-6 offset-md-3 text-center">
                        <button id="next" name="next_step">Tiếp theo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <?php
          include("footer.php");
        ?>
    </div>
    <script>      
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: "<?php echo $convertPrice ?>" // Can also reference a variable or function
              }
            }],
            application_context: {
              shipping_preference: 'NO_SHIPPING'
            }
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            // $.post('./purchaseSuccess.php', {
            //   plan_id: <?php echo $plan_id;?>,
            // })
            window.location.assign('./purchaseSuccess.php?plan=<?php echo $plan_id ?>')
          });
        }
      }).render('#paypal-button-container');
    </script>
  </body>
</html>