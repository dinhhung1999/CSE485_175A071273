<?php
  if(session_id()==''){
    session_start();
  }
?>
<?php
require_once('database.php');
require_once('PhpMailer/Sendmail.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['rspass'] = $_POST['email'];
    $email = $_SESSION['rspass'];
    $sql = "SELECT * FROM user WHERE userEmail = '$email'";
    $reset_password = md5(rand(0,1000000));
    $result = query($sql);
    if(mysqli_num_rows($result)==1){
        $subject = 'Dat lai mat khau trang web NTTU';
        $message = "
        <p> Bạn đã yêu cầu đặt lại mật khẩu <p>
        <p>Vì lí do bảo mật, tuyệt đối không chia sẻ đường dẫn này cho người khác dưới bất kì hình thức nào.</p>
        <p>Vui lòng ấn vào đường link sau để đặt lại mật khẩu của bạn</p>
        <a href='http://localhost:8888/web/BTLCNW/resetpassword.php?reset={$reset_password}'>http://localhost:8888/web/BTLCNW/resetpassword.php?reset={$reset_password}</a> 
          <p> Xin trân trọng cảm ơn !<p>
          ";
        $sended = sendmail($email,$subject,$message);
        if($sended){
          $_SESSION['update_message'] = 'Mail đặt lại mật khẩu đã được gửi tới hộp thư của bạn, vui lòng kiểm tra hộp thư để đặt lại mật khẩu của bạn';
          }else{
            $_SESSION['update_message'] = 'Có lỗi! Không gửi được mail, vui lòng thử lại';
          }
    }else{
        $_SESSION['update_message'] = "Email của bạn không khớp với hệ thống, vui lòng kiểm tra lại hoặc đăng ký mới";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>NTTU - Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin2.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <?php
    require_once('topheader.php');
    ?>
    <div class="main">

        <body class="login-body">
            <div class="container">
                <form class="form-signin" style="padding-top:100px" action="forgotpassword.php" method="Post">
                    <div class="login-wrap">
                        <p>Quên mật khẩu ?</p>
                        <?php
                        if (isset($_SESSION['update_message'])) {
                            ?>
                            <div class="alert alert-success"><b style="color: blue;">
                                    <?php
                                        echo $_SESSION['update_message'];
                                        ?>
                                </b></div>
                        <?php
                        }
                        unset($_SESSION['update_message']);
                        ?>
                        <span>Nhập địa chỉ Email của bạn dưới đây để đặt lại mật khẩu của bạn:</span>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" style="margin-bottom: 15px;border: 1px solid #eaeaea;box-shadow: none;font-size: 16px;" required>
                        <button class="btn btn-lg btn-login btn-block" type="submit">Đặt lại mật khẩu</button>
                        <button class="btn btn-lg btn-login btn-block"><a style="color:#000; text-decoration: none;" href="login.php">Quay lại</a></button>
                    </div>
                </form>
            </div>
            <!-- header -->
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <?php
            require_once('footer.php');
            ?>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>

</html>