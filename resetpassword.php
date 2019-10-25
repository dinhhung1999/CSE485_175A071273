<?php
if (session_id() == '') {
    session_start();
}
?>
<?php
if (!isset($_SESSION['name'])) {
    require_once('database.php');
    if (isset($_SESSION['rspass'])) {
        $email = $_SESSION['rspass'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            if ($password == $password2) {
                $sql = "UPDATE user SET userPassword = '$password_hash' WHERE userEmail = '$email' ";
                $result = query($sql);
                if ($result) {
                    $_SESSION['updated_message'] = "Mật khẩu của bạn đã được cập nhật ! ";
                    unset($_SESSION['rspass']);
                } else {
                    $_SESSION['update_message'] = "Có lỗi xảy ra! Xin vui lòng thử lại !";
                }
            } else {
                $_SESSION['update_message'] = "Mật khẩu xác nhận không trùng khớp! Xin vui lòng thử lại !";
            }
        }
    } else {
        header("Location:login.php");
    }
} else {
    header("Location:profile.php");
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
                <form class="form-signin" style="margin: 50px auto; max-width: 400px;" action="resetpassword.php" method="Post">
                    <div class="login-wrap">
                        <?php
                        if (isset($_SESSION['updated_message'])) {
                            ?>
                            <div class="alert "><b style="color: blue;">
                                    <?php
                                        echo $_SESSION['updated_message'];
                                        ?>
                                        <br>
                                        <a href="login.php">Click vào đây</a> để tiếp tục đăng nhập !
                                </b></div>
                        <?php
                        }
                        unset($_SESSION['updated_message']);
                        ?>
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
                        <p>Đặt lại mật khẩu</p>
                        <span>Mật khẩu mới (từ 8 đến 12 kí tự):</span>
                        <input type="password" class="form-control" placeholder="Mật khẩu mới" required minlength="8" maxlength="12" name="password">
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" minlength="8" maxlength="12" required name="password2">
                        <button class="btn btn-lg btn-login btn-block" type="submit">Lưu mật khẩu</button>
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
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>

</html>