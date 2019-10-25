<?php
require_once('database.php');
session_start();
if (!isset($_SESSION['name'])) {
  $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
  header("Location:login.php");
} else if ($_SESSION['lv'] == 1) {
  header("Location:thongtin.php");
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
  <link rel="stylesheet" href="css/member.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <?php
  require_once('topheader.php');
  require_once('headeradmin.php');
  ?>
  <?php
  $sql = "SELECT * FROM user";
  $result = query($sql);
  $users = mysqli_num_rows($result);
  ?>
  <div class="container">
    <h3 style="text-align: center;">Tổng số thành viên: <?php echo $users; ?> </h3>
    <h4 style="text-align: center;">Danh sách thành viên:</h4>
    <p style="text-align: center;"><span id="Error" style="color:Red;"><b>
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
          <table id="listmember">
            <tr id="firstcol">
              <td>ID</td>
              <td>User Name</td>
              <td>Email</td>
              <td>Vai trò</td>
              <td>Sửa</td>
              <td>Xóa</td>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td>
                  <?php
                    echo $row['userID'];
                    ?>
                </td>
                <td>
                  <?php
                    echo  $row['userName'];
                    ?>
                </td>
                <td>
                  <?php
                    echo  $row['userEmail'];
                    ?>
                </td>
                <td>
                  <?php
                    if ($row['userlever'] == 1) {
                      if ($row['active'] == 0) {
                        echo "Tài khoản chưa được kích hoạt";
                      } else {
                        echo "Biên tập viên";
                      }
                    } else {
                      echo "Quản trị viên";
                    }
                    ?>
                </td>
                <td>
                  <a href="edit-user.php?id=<?php echo $row['userID']; ?>"><i class="fa fa-pencil-square-o" style="color: ;"></i></a>
                </td>
                <td>
                <a class="btn" href="proces-delete-user.php?id=<?php echo $row['userID']; ?>" onclick="confirmDelete();"><i class="fa fa-trash" style="color: red;"></i></a>
                </td>
              </tr>
            <?php
            }
            mysqli_free_result($result);

            ?>
          </table>
          <div class="edit">
            <button class="btn-admin"><a href="register.php"><i class="fa fa-user-plus"></i>Thêm tài khoản</a></button>
            <button class="btn-admin"><a href="#">Sửa</a></button>
            <button class="btn-admin"><a href="#">Xóa</a></button>
            <button class="btn-admin"><a href="#">Cập nhật</a></button>
          </div>
          <h3 style="padding-top: 10px;">Các bài viết đã đăng:</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Người đăng</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Thời gian đăng bài</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql2 = "SELECT * FROM post";
              $result2 = query($sql2);
              while ($row2 = mysqli_fetch_assoc($result2)) {
                ?> <tr>
                  <td><?php echo $row2['id']; ?></td>
                  <td><?php echo $row2['userName']; ?></td>
                  <td><?php echo $row2['title']; ?></td>
                  <td><?php echo $row2['date']; ?></td>
                  <td>
                    <a href="edit-post-mb.php?id=<?php echo $row2['id']; ?>"><i class="fa fa-pencil-square-o" style="color: ;"></i></a>
                  </td>
                  <td>
                  <a class="btn" onclick="confirmDelete();" href="proces-del-post-mb.php?id=<?php echo $row2['id']; ?>" ><i class="fa fa-trash" style="color: red;"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <h3 style="padding-top: 10px;">Các slider đã đăng</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Người đăng</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Thời gian đăng bài</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql3 = "SELECT * FROM slider";
              $result3 = query($sql3);
              while ($row3 = mysqli_fetch_assoc($result3)) {
                ?> <tr>
                  <td><?php echo $row3['id']; ?></td>
                  <td><?php echo $row3['userName']; ?></td>
                  <td><?php echo $row3['title']; ?></td>
                  <td><?php echo $row3['date']; ?></td>
                  <td>
                    <a href="edit-slide-mb.php?id=<?php echo $row3['id']; ?>"><i class="fa fa-pencil-square-o" style="color: ;"></i></a>
                  </td>
                  <td>
                  <a class="btn" href="proces-del-slide-mb.php?id=<?php echo $row3['id']; ?>" onclick="confirmDelete();"><i class="fa fa-trash" style="color: red;"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
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
 <script src="js/cofirmdelete-mb.js"></script>
</body>

</html>