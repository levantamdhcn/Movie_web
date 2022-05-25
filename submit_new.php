<?php
    require_once("libs/db.php");
    if(isset($_POST['submit_password']))
    {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $select=mysqli_query($link,"update user set password='$hash' where md5(email)='$email'");
        echo "Khôi phục mật khảu thành công";
        echo "<a href='index.php'>Trở về trang chủ</a>";

        unset($email);
        unset($pass);
    }
?>