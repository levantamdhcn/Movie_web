<?php
  require('libs/db.php');
  session_start();
  error_reporting(E_ALL);
  $mod='choosePayment';
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
  <link href="css/choosePayment.css" type="text/css" rel="stylesheet">   

</head>
  <body style="position: relative;">
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
        <div class="simpleContainter">
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="paymentPickerTitle text-dark font-weight-bold">
                            Chọn gói dịch vụ của bạn
                        </div>
                        <ul class="paymentPickerSlogs" style="margin-left: 0">
                            <li class="paymentPickerSlog text-dark">
                                <i class="fas fa-check"></i>
                                Không yêu cầu cam kết, hủy bất kỳ lúc nào.</li>
                            <li class="paymentPickerSlog text-dark">
                                <i class="fas fa-check"></i>
                                Mọi thứ trên Netflix chỉ với mức giá thấp.</li>
                            <li class="paymentPickerSlog text-dark">
                                <i class="fas fa-check"></i>
                                Không quảng cáo, không phụ phí. Luôn luôn như vậy.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="plans-table">
                            <div class="plans-table-header">
                                <div style="flex: 4">

                                </div>
                                <?php
                                  $sql = "select * from plan";
                                  $result = mysqli_query($link, $sql);
                                  while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <div style="flex: 2">
                                      <div class="plans-label">
                                        <div class="plans-label-header" value="<?php echo $row["plan_id"] ?>">
                                          <?php echo $row['name'] ?>
                                        </div>
                                      </div>
                                    </div>
                                <?php } 
                                ?>
                            </div>
                            <div class="plans-table-body">
                                <div class="plans-table-row border border-secondary border-bottom-1 border-top-0 border-left-0 border-right-0 pb-2">
                                    <div style="flex: 4">
                                        <div class="plans-col-name text-dark">Giá gói dịch vụ</div>
                                    </div>
                                    <?php
                                      $sql = "select * from plan";
                                      $result = mysqli_query($link, $sql);
                                      while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <div style="flex: 2">
                                          <div class="plans-label text-dark"><?php echo $row["price"] ?>đ</div>
                                        </div>
                                    <?php } 
                                    ?>
                                </div>
                                <div class="plans-table-row border border-secondary border-bottom-1 border-top-0 border-left-0 border-right-0 pb-2 mt-2">
                                    <div style="flex: 4">
                                        <div class="plans-col-name text-dark">Tiết kiệm</div>
                                    </div>
                                    <?php
                                      $sql = "select * from plan";
                                      $result = mysqli_query($link, $sql);
                                      while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <div style="flex: 2">
                                          <div class="plans-label text-dark"><?php echo $row["save"] ?>đ</div>
                                        </div>
                                    <?php } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col col-md-12">
                      <form action="paymentPicker.php" method="POST" class="w-full d-flex justify-content-center align-items-center">
                        <button id="next" name="next_step" type="button" style="opacity: 0.7">Tiếp theo</button>
                      </form>
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
      var labels = document.querySelectorAll(".plans-label-header");
      labels.forEach(label => {
        label.addEventListener("click", (e) => {
          labels.forEach(element => {
            if(element.classList.contains("active")) {
              element.classList.remove("active");
            }
          });
          e.target.classList.add("active");

          document.querySelector("#next").value = e.target.getAttribute("value");
          document.querySelector("#next").setAttribute("type", "submit");
          document.querySelector("#next").style.opacity = "1";
        })
      })
      
    </script>
  </body>
</html>