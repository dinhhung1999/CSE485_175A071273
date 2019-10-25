<?php
require_once('database.php');
session_start();
if (!isset($_SESSION['name'])) {
  $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
  header("Location:login.php");
}
$username = $_SESSION['name'];
$sql = "SELECT * FROM post WHERE userName = '{$username}'";
$result = query($sql);
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
  <link rel="stylesheet" href="css/post.css">
  <link rel="stylesheet" href="css/index.css">

</head>

<body>
  <?php
  require_once('topheader.php');
  require_once('headeradmin.php');
  ?>
  <div class="container">
    <div class="main">
      <a href="addpost.php" style="background-color: #007bff; padding: 10px;"><i class="fa fa-plus-circle" style="color: #fff;">Thêm bài viết</i></a>
      <h3 style="text-align: center;">Bài viết bạn đã đăng</h3>
      <?php
      if (isset($_SESSION['update_message'])) {
        ?>
        <div class="alert alert-success" style="text-align: center;max-width: 500px; margin: 0 auto;"><b style="color: blue;">
            <?php
              echo $_SESSION['update_message'];
              ?>
          </b></div>
      <?php
      }
      unset($_SESSION['update_message']);
      ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Thời gian đăng bài</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            ?> <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td>
                <a href="edit-post.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" style="color: ;"></i></a>
              </td>
              <td>
              <a class="btn" onclick="confirmDelete();" href="proces-del-post.php?id=<?php echo $row['id']; ?>" ><i class="fa fa-trash" style="color: red;"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  require_once('footer.php');
  ?>
  <!-- header -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/hotline.js"></script>
  <script src="js/cf-del-post.js"></script>
</body>

</html>