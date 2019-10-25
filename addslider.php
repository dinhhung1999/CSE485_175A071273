<?php
require_once('database.php');
session_start();
if (!isset($_SESSION['name'])) {
  $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
  header("Location:login.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_SESSION['name'];
  $img = $_FILES['img'];
  $imgname = $img['name'];
  $des = "uploads/{$img['name']}";
  move_uploaded_file($img['tmp_name'], $des);
  $title = $_POST['title'];
  $sql = "INSERT INTO slider(userName,img,title) VALUES ('$username','$imgname','$title')";
  $result = query($sql);
  if ($result) {
    $_SESSION['addslider_message'] = "Thêm slider thành công";
  } else {
    $_SESSION['addslider_message'] = "Có lỗi trong quá trình đăng tải bài viết, vui lòng thử lại";
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
  <link rel="stylesheet" href="css/index.css">

</head>

<body>
  <?php
  require_once('topheader.php');
  require_once('headeradmin.php');
  ?>
  <div class="container">
    <div class="main">
      <h3 style="text-align: center; color: #0067ac;">Thêm slider</h3>
      <p style="text-align: center;"><span id="Error" style="color:Red;"><b>
            <?php
            if (isset($_SESSION['addslider_message'])) {
              echo $_SESSION['addslider_message'];
            }
            unset($_SESSION['addslider_message']);
            ?>
          </b></span></p>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div></div>
        <p>Ảnh slider:</p>
        <div class="custom-file" style="max-width: 400px;">
          <input type="file" class="custom-file-input" id="inputGroupFile01" required="" name="img" ria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Chọn hình ảnh</label>
        </div>
        <p>Tiêu đề: </p>
        <input style="max-width: 400px;" type="text" class="form-control" name="title" id="title" required="" placeholder="Nhập tiêu đề">
        <p><input style="border-radius: 5px; padding: 5px;margin: 10px;" type="submit" value="Đăng bài"></p>
      </form>
    </div>
    <?php
    require_once('footer.php');
    ?>
  </div>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/JS.js"></script>
  <script src="js/hotline.js"></script>
  <script src="js/crs.js"></script>