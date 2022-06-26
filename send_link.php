<?php
    require_once("libs/db.php");
    require './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/");
    $dotenv->load();
    require_once __DIR__."/PHPMailer/src/PHPMailer.php";
    require_once __DIR__."/PHPMailer/src/Exception.php";
    require_once __DIR__."/PHPMailer/src/OAuth.php";
    require_once __DIR__."/PHPMailer/src/POP3.php";
    require_once __DIR__."/PHPMailer/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['submit_email']) && $_POST['email'])
    {
        $email = $_POST['email'];
        $select = mysqli_query($link,"select email,password,fullname from user where email='$email'");
    if(mysqli_num_rows($select)==1)
    {
        while($row=mysqli_fetch_array($select))
        {
            $email=md5($row['email']);
            $pass=md5($row['password']);

            $link="<a href='http://localhost/phim/reset_password.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
            $mail = new PHPMailer(true);
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username
            $mail->Username = $_ENV['email']; ;
            // GMAIL password
            $mail->Password = $_ENV['password']; ;
            $mail->SMTPSecure = "ssl";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "465";
            $mail->From='levantamdhcn@gmail.com';
            $mail->FromName='Netflix';
            $mail->AddAddress($row['email'], $row['fullname']);
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
            if($mail->Send())
            {
                echo "Check Your Email and Click on the link sent to your email";
            }
            else
            {
                echo "Mail Error - >".$mail->ErrorInfo;
            }
        }
    }	
}
?>