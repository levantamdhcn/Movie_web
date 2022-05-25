<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/icons/css/all.css" type="text/css" rel="stylesheet" >
  <link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
  <link href="css/owl.theme.default.min.css" type="text/css" rel="stylesheet">
  <link href="css/style.min.css" type="text/css" rel="stylesheet">
</head>

<body>
    <?php
        require_once("libs/db.php");
        if($_GET['key'] && $_GET['reset'])
        {
            $email=$_GET['key'];
            $pass=$_GET['reset'];
            $select=mysqli_query($link,"select email,password from user where md5(email)='$email' and md5(password)='$pass'");
            if(mysqli_num_rows($select)==1)
            {
                ?>
                    <div id="wrapper">
                        <?php
                            include("header.php");
                        ?>
                        <div id="body-wrap" class="container">
                            <h3 style="font-size:30px;text-align:center;margin-bottom:10px;margin-top:40px;color: white;">Nhập mật khẩu mới</h3>
                            <form method="post" action="submit_new.php" style="padding: 20px; height: calc(100vh - 63px - 4px - 175px)">
                                <input type="hidden" name="email" value="<?php echo $email;?>">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col col-sm-12">
                                            <div class="row">
                                                <div class="col col-sm-6 offset-sm-3">
                                                    <label class="control-label">Mật khẩu mới</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-sm-6 offset-sm-3">
                                                    <input type="password" class="form-control" name="password" id="password" value="">
                                                    <label 
                                                        class="notifyerror" 
                                                        style="visibility: hidden; height: 0px" 
                                                        id="password1error"
                                                    >
                                                        Mật khẩu phải bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col offset-sm-3">
                                        <button 
                                            type="submit" 
                                            id="submit-btn"
                                            name="submit_password" 
                                            class="rounded hover-effect"
                                            style="
                                                background-color: var(--main-color); 
                                                border: none; 
                                                padding: 12px 16px; 
                                                color: white; 
                                                font-size: 14px; 
                                                font-weight: 600;
                                                cursor: pointer;"
                                        >
                                            Khôi phục
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                            include("footer.php");
                        ?>
                    </div>
                <?php
            }
        }
    ?>

    <script language="javascript">
        const submit = document.getElementById("submit-btn");
        const password = document.getElementById("password1");
        const passwordError =  document.getElementById("password-error");
        const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/

        password.onchange = function(){
            checkNewpassword();
        }

        submit.onclick = function(){

        const validName = checkname();

        const validNewPass = true;

        if(password.value.toString().length > 0){
            validNewPass = checkNewpassword();
        }

        if(validNewPass){
            return true;
        }
            return false;
        }
        function checkNewpassword(){
        if(!regPassword.test(password.value)){
            passwordError.style.visibility = 'visible';
            password1error.style.height = 'auto';
            return false;
        }
        else{
            password1error.style.visibility = 'hidden';
            password1error.style.height = '0px';
            
            if(password2.value.toString().length > 0){
            if(password2.value.localeCompare(password1.value) == 0){
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
            }
            else{
                password2error1.innerHTML = "Mật khẩu không khớp";
                password2error1.style.visibility = 'visible';
                password2error1.style.height = 'auto';
                return false;
            }
            }   
            return true;
        }
        }

        function checkname(){
        if(!regUsername.test(username.value)){
            usernameerror.style.visibility = 'visible';
            usernameerror.style.height = 'auto';
            return false;
        }
        else{
            usernameerror.style.visibility = 'hidden';
            usernameerror.style.height = '0px';
            return true;
        }
        }

        function checkpass(){
        if(!regPassword.test(password.value)){
            passworderror.style.visibility = 'visible';
            passworderror.style.height = 'auto';
            return false;
        }
        else{
            passworderror.style.visibility = 'hidden';
            passworderror.style.height = '0px';
            return true;
        }
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

        function checkfullname(){
        if(!regFullname.test(fullname.value)){
            fullnameerror.style.visibility = 'visible';
            fullnameerror.style.height = 'auto';
            return false;
        }
        else{
            fullnameerror.style.visibility = 'hidden';
            fullnameerror.style.height = '0px';
            return true;
        }
        }

        function checkNewpassword2(){
        if(!regPassword.test(password2.value)){
            //password2error1.innerHTML = errorPasswordDefault;
            password2error1.style.visibility = 'visible';
            password2error1.style.height = 'auto';
            return false;
        }
        else{
            if(password1.value.toString().length > 0){
            if(password2.value.localeCompare(password1.value) == 0){
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
            }
            else{
                password2error1.innerHTML = "Mật khẩu không khớp";
                password2error1.style.visibility = 'visible';
                password2error1.style.height = 'auto';
                return false;
            }
            }
            else{
            password2error1.style.visibility = 'hidden';
            password2error1.style.height = '0px';
            return true;
            }
        }
        }
    </script>
</body>