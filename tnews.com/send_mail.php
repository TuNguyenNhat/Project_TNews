<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function sendMail($gmail, $name, $otp)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();  
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication //Send using SMTP

        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through

        $mail->Username   = 'nguyennhattu2905@gmail.com';                     //SMTP username
        $mail->Password   = 'emum znii zkxh jisr';                               //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('nguyennhattu2905@gmail.com', 'TNews');
        $mail->addAddress($gmail, $name);     //gui den cho ai

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $otp.' '.'Là Mã Xác Minh Của Bạn';
        $mail->addEmbeddedImage('imageMail/LogoTNews.png', 'logo', 'LogoTNews.png');
        $mail->Body = ' <div class="content" style="
                                width: 300px;
                                height: 500px;
                                font-family: sans-serif;
                            ">
                            <div class="anh">
                                <img src="cid:logo" alt="" width="100px" style="
                                        padding-left: 12px;
                                        margin-top: 20px;
                                        margin-bottom: 20px;
                                    ">
                            </div>
                            <div class="chu">
                                <div class="tieude" style="
                                    background-color: #f1f1f1;
                                    padding-top: 1px;
                                    padding-bottom: 1px;
                                    padding-left: 15px;
                                    margin-top: 5px;
                                    ">
                                    <h3>Mã xác minh</h3>
                                </div>
                                <div class="phancanthiet" style="
                                    background-color: #f8f8f8;
                                    padding: 15px;
                                    font-size: small;
                                ">
                                    <div>
                                        <p>Để xác minh tài khoản bạn cần nhập mã:</p>
                                    </div>
                                    <div>
                                        <h3>'.$otp.'</h3>
                                    </div>
                                    <div>
                                        <p>Bạn bắt buộc phải nhập mã thì mới có thể đăng kí tài khoản thành công</p>
                                    </div>
                                    <div>
                                        <p>Mọi thắc mắc xin liên hệ:</p>
                                        <p>SĐT: 0393804887</p>
                                    </div>
                                </div>
                                <div class="cuoi" style="
                                    background-color: #f1f1f1;
                                    padding: 5px;
                                    padding-left: 15px;
                                    font-size: small;
                                ">
                                    <p>© 2025 Copyright By: Nguyễn Nhật Tú</p>
                                </div>
                            </div>
                        </div>';

        $mail->send(); ?>
        <script>
            alert("<?php echo "Đăng kí tài khoản thành công, OTP đã được gửi đến: " . $gmail ?>");
            window.location.replace('xacnhan.php');
        </script>
    <?php } catch (Exception $e) {
        echo "Gui mail không thành công. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>

