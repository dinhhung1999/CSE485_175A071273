<?php
if (session_id() == '') {
    session_start();
}
require_once('database.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userEmail = getEmail($email);
    if ($userEmail) {
        if (password_verify($password, $userEmail['userPassword'])) {
            if ($user['active'] == 1 or $userEmail['active'] == 1) {
                $_SESSION['email'] = $userEmail['userEmail'];
                $_SESSION['name'] = $userEmail['userName'];
                $_SESSION['lv'] = $userEmail['userlever'];
                header("Location:user.php");
            } else {
                $_SESSION['dangky_message'] = 'Vui lòng kích hoạt tài khoản trước khi đăng nhập';
            }
        } else {
            $_SESSION['dangnhap_message'] = 'Bạn đã nhập sai tên hoặc mật khẩu!';
        }
    } else {
        $_SESSION['dangnhap_message'] = 'Tên đăng nhập hoặc email không đúng';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
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

<body>,
    <div class="login-body">
        <div class="container">
            <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="login-wrap">
                    <span id="messeger_dangky" style="color: blue;"><b>
                            <?php
                            if (isset($_SESSION['dangky_message'])) {
                                echo $_SESSION['dangky_message'];
                            }
                            unset($_SESSION['dangky_message']);
                            ?>
                        </b></span>
                    <input type="text" class="form-control" name="email" placeholder="Email" required id="txtUser">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required id="txtPass">
                    <p><span id="lblErrorInfo" style="color:Red;"><b>
                                <?php
                                if (isset($_SESSION['dangnhap_message'])) {
                                    echo $_SESSION['dangnhap_message'];
                                }
                                unset($_SESSION['dangnhap_message']);
                                ?>
                            </b></span>
                        <label class="checkbox">
                            <!-- <input type="checkbox" value="remember-me"> Tự động đăng nhập <br> -->
                            <span class="pull-right">
                                <a  href="forgotpassword.php"> Bạn quên mật khẩu ?</a>
                            </span>
                        </label>
                        <button class="btn btn-lg btn-login btn-block" type="submit" name="submit" id="btnlogin0">Đăng nhập</button>
                        <p>Chưa có tài khoản! <a href="register.php">Đăng ký ngay</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php
    require_once('footer.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/JS.js"></script>
    <script src="js/hotline.js"></script>
</body>

</html>