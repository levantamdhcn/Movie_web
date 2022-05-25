<?php
    require_once("libs/db.php");
    // if(isset($_POST["button_update"])){
    //     $username = $_POST["username"];
    //     $password = $_POST["password"];
    //     echo $username;
    //         $hash = password_hash($password, PASSWORD_BCRYPT);
    //     $email = $_POST["email"];
    //     $fullName = $_POST["fullname"];
    //     $birthday = $_POST["birthday"];
    //     $gender = $_POST["gender"];

    //     //thực hiện việc lưu trữ dữ liệu vào db
    //     $sql = "SELECT* FROM user WHERE username = '$username'";
    //     $check = mysqli_query($link,$sql);
    //     if(mysqli_num_rows($check) > 0){
    //       echo "Tài khoản $username đã tồn tại";
    //     }
    //     else{
    //         $sql = "INSERT INTO user(username,fullname,password,email,birthday,sex,usertype)
    //                     VALUES ('$username', '$fullName','$hash','$email','$birthday','$gender',20)";
    //         mysqli_query($link,$sql);
    //         echo "Signup successful";
    //         header('Location:index.php');
    //     }
    // }
?>

<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Quên mật khẩu</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/icons/css/all.css" type="text/css" rel="stylesheet" >
  <link href="css/owl.carousel.css" type="text/css" rel="stylesheet"> 
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/owl.carousel.js" type="text/javascript"></script>
  <script src="js/jwplayer.js"></script>

  <link href="css/style_info_account.min.css" type="text/css" rel="stylesheet"> 
  <link href="css/style.min.css" type="text/css" rel="stylesheet">   

</head>

<body>
    <div id="wrapper">
      <?php
        include("header.php");
      ?>

      <h3 style="font-size:30px;text-align:center;margin-bottom:0px;margin-top:40px;color: white;">Quên mật khẩu</h3>

      <div class="form-update">
        <form 
          method="post" 
          id="form-update" 
          name="form-update" 
          class="form-horizontal" 
          action="send_link.php" role="form" 
          style="padding: 20px; height: calc(100vh - 63px - 4px - 175px)"
        >
          <div class="container">
            <div class="row">
              <div class="col col-sm-12 offset-sm-3">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-7"><input type="email" class="form-control" name="email" id="email">
                    <label class="notifyerror" style="visibility: hidden; height: 0px" id="emailerror">Email không đúng định dạng name@domain</label>  
                    </div>
                </div>

                <div class="col col-sm-12 offset-sm-3">
                  <button 
                    type="submit" 
                    class="btn btn-primary" 
                    id="submit_email" 
                    name="submit_email" 
                    style="background-color: var(--main-color); border: none; padding: 9px 16px; font-weight: 500;"
                  >
                    Quên mật khẩu
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
      <?php
          include("footer.php");
        ?>
    </div>

    <script language="javascript">
      var email = document.getElementById("email");
      var phone = document.getElementById("phone");

      var emailerror =  document.getElementById("emailerror");

      var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      email.onchange = function(){
        checkemail();
      }

      button_update.onclick = function(){
        if(email.value.toString().length <= 0){
          alert("Bạn chưa nhập email");
          checkemail();
          return false;
        }
        if(validEmail){
          return true;
        }
        return false;
      }

      function checkemail(){
        if(!regEmail.test(email.value)){
          emailerror.style.visibility = 'visible';
          emailerror.style.height = 'auto';
          return false;
        }
        else{
          emailerror.style.visibility = 'hidden';
          emailerror.style.height = '0px';
          return true;
        }
      }
    </script>

</body>