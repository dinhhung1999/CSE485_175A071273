<?php
if (session_id() == '') {
    session_start();
}
if (!isset($_SESSION['name'])) {
    $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
    header("Location:login.php");
}
?>
<?php
require_once('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['name'];
    $passwordcurrent = $_POST['passwordcurrent'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $getuser = getuserName($username);
    if (password_verify($passwordcurrent, $getuser['userPassword'])) {
        if ($password == $password2) {
            if ($password != $passwordcurrent) {
                $sql = "UPDATE user SET userPassword = '$password_hash' WHERE userName = '$username' ";
                $result = query($sql);
                if ($result) {
                    $_SESSION['update_message'] = "Bạn đã đổi mật khẩu thành công";
                } else {
                    $_SESSION['update_message'] = "Có lỗi xảy ra! Xin vui lòng thử lại";
                }
            } else {
                $_SESSION['update_message'] = "Lỗi, mật khẩu mới phải khác với mật khẩu hiện tại";
            }
        } else {
            $_SESSION['update_message'] = "Mật khẩu xác nhận không trùng khớp! Xin vui lòng thử lại";
        }
    } else {
        $_SESSION['update_message'] = "Mật khẩu bạn nhập không chính xác! Xin vui lòng thử lại.";
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
    require_once('headeradmin.php');
    ?>
    <div class="main">

        <body class="login-body">
            <div class="container">
                <form class="form-signin" style="padding-top:10px" action="changepassword.php" method="Post">
                    <div class="login-wrap">
                        <?php
                        if (isset($_SESSION['update_message'])) {
                            ?>
                            <div class="alert "><b style="color: blue;">
                                    <?php
                                        echo $_SESSION['update_message'];
                                        ?>
                                </b></div>
                        <?php
                        }
                        unset($_SESSION['update_message']);
                        ?>
                        <p>Đổi mật khẩu</p>
                        <span>Mật khẩu hiện tại</span>
                        <input type="password" class="form-control" id="password" placeholder="Mật khẩu hiện tại" name="passwordcurrent" required>
                        <span>Mật khẩu mới (từ 8 đến 12 kí tự):</span>
                        <input type="password" class="form-control" placeholder="Mật khẩu mới" required minlength="8" maxlength="12" name="password">
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" minlength="8" maxlength="12" required name="password2">
                        <button class="btn btn-lg btn-login btn-block" type="submit">Đổi mật khẩu</button>
                        <button class="btn btn-lg btn-login btn-block"><a style="color:#000; text-decoration: none;" href="profile.php">Quay lại</a></button>
                    </div>
                </form>
            </div>
            <!-- header -->
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
    <script src="js/crs.js"></script>
        </body>

</html>