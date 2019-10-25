<?php
require_once('database.php');
session_start();
if (!isset($_SESSION['name'])) {
  $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
  header("Location:login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>NTTU</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/admin2.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/index.css">

</head>

<body>
  <?php
  require_once('topheader.php');
  require_once('headeradmin.php');
  ?>

  <div class="main">
    <h3 style="text-align: center;">Thông tin tài khoản đăng nhập</h3>
    <p class="Name">User Name:
      <?php
      echo $_SESSION['name'];
      ?>
    </p>
    <p class="email">Email:
      <?php
      echo $_SESSION['email'];
      ?>
    </p>
    <p class="userLevel">Vai trò:
      <?php
      if ($_SESSION['lv'] == 2) {
        echo "Quản trị viên";
      } else {
        echo "Biên tập viên";
      }
      ?>
    </p>
    <p>
      <a style="background-color: red; padding:10px; border-radius: 5px; color: #fff; text-decoration: none;" href="changepassword.php">Đổi mật khẩu</a>
      <a style="background-color: red; padding:10px; border-radius: 5px; color: #fff; text-decoration: none;" href="logout.php">Đăng xuất</a>
    </p>
  </div>
  <?php
  require_once('footer.php');
  ?>
  <!-- header -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/JS.js"></script>
  <script src="js/hotline.js"></script>
</body>

</html>