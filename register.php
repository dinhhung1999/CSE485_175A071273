<?php 
  if(session_id()==''){
    session_start();
  }
  require_once('database.php');
  require_once('PhpMailer/Sendmail.php');
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password2= $_POST['password2'];
  $password = $_POST['password'];
  $password_hash = password_hash($password,PASSWORD_DEFAULT);
  $verify_code = md5(rand(0,1000000));
  $sql1 = "SELECT * FROM user WHERE userEmail = '$email' or userName = '$username'";
  query($sql1);
  $result = query($sql1);
  if(mysqli_num_rows($result)==0){
    if($password == $password2){
      $sql = "INSERT INTO user(userName, userEmail, userPassword, verify_code) VALUES ('$username', '$email', '$password_hash', '$verify_code')";
      if (query($sql)) {
        $subject = 'Kich hoat tai khoan dang ky trang NTTU';
        $message = "
        <p> Cảm ơn bạn đã đăng ký và sử dụng website <p>
        <p>Vui lòng ấn vào đường link sau để kích hoạt tài khoản</p>
        <a href='http://localhost:8888/web/BTLCNW/activation.php?active={$verify_code}'>http://localhost:8888/web/BTLCNW/activation.php?active={$verify_code}</a> 
          <p> Xin trân trọng cảm ơn <p>
          ";
        $sended = sendmail($email,$subject,$message);
        if($sended){
          $_SESSION['dangky_message'] = 'Bạn đã đăng ký tài khoản thành công!, vui lòng check mail để kích hoạt';
          }else{
            $_SESSION['dangky_message'] = 'Có lỗi! Không gửi được mail kích hoạt, vui lòng thử lại';
          }
      }
    }else{
      $_SESSION['dangky_message'] = 'Mật khẩu xác nhận không khớp, vui lòng thử lại';
      }
    }else{
      $_SESSION['dangky_message'] = 'Email đã tồn tại, vui lòng thử lại';
    }
  }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Đăng ký</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require_once('header.php');
?>
  <body class="login-body">
    <div class="container">
      <form class="form-signin" action="register.php" method="Post">
        <div class="login-wrap">
            <p><b>Nhập thông tin tài khoản của bạn tại đây</b></p>
            <div class="alert "><b style="color: blue;">
<?php
if(isset($_SESSION['dangky_message'])){
  echo $_SESSION['dangky_message'];
}
unset($_SESSION['dangky_message']);
?>
            </b></div>
            <input type="text" class="form-control" placeholder="Tên đăng nhập" required name="username">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" style="margin-bottom: 15px;border: 1px solid #eaeaea;box-shadow: none;font-size: 16px;">
            <span id='message'>Mật khẩu từ 8 đến 12 ký tự.</span>
            <input type="password" class="form-control" placeholder="Mật khẩu" required minlength="8" maxlength="12" name="password">
            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" minlength="8" maxlength="12" required name="password2">
            <button class="btn btn-lg btn-login btn-block" type="submit">Đăng ký</button>
            <p>Đã có tài khoản <a href="login.php">Đăng nhập</a></p> 
        </div>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
require_once('footer.php');
?>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/JS.js"></script>
    <script src="js/hotline.js"></script>
  </body>
</html>