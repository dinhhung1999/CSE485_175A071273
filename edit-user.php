<?php
if (session_id() == '') {
    session_start();
}
?>
<?php
if (isset($_SESSION['name']) && $_SESSION['lv'] == 2) {
    require_once('database.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE userID = '{$id}'";
    $result = query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lvEdit = $_POST['lv'];
        $status = $_POST['status'];
        $sql3 = "UPDATE user SET userlever = '$lvEdit', active = '$status' WHERE userID = '$id'";
        $result3 = query($sql3);
        if ($result3) {
            $_SESSION['update_message'] = "Chỉnh sửa thông tin thành công !";
        } else {
            $_SESSION['update_message'] = "Chỉnh sửa thông tin thất bại !";
        }
    }
} else {
    header("Location:profile.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Chỉnh sửa thành viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/admin2.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require_once('topheader.php');
require_once('headeradmin.php');
?>

<body class="login-body">
    <div class="container">
        <form class="form-signin" method="Post">
            <h4 style=" text-align: center;">Tài khoản : <?php echo $row['userName'] ?> </h4>
            <div class="login-wrap">
                <?php
                if (isset($_SESSION['update_message'])) {
                    ?>
                    <div class="alert alert-success"><b style="color: blue;">
                            <?php
                                echo $_SESSION['update_message'];
                                unset($_SESSION['update_message']);
                                ?>
                        </b></div>
                <?php
                } else {
                    ?>
                    <p>Chỉnh sửa tài khoản: </p>
                <?php
                }
                ?>
                Vai trò :
                </label> <br>
                <select name="lv" id="">
                    <optgroup>
                        <?php if ($row['userlever'] == 2) { ?>
                            <option value="2">Quản trị viên</option>
                            <option value="1">Biên tập viên</option>
                        <?php } else { ?>
                            <option value="1">Biên tập viên</option>
                            <option value="2">Quản trị viên</option>
                        <?php } ?>
                    </optgroup>
                </select> <br>
                <label for="">
                    Trạng thái :
                </label> <br>
                <select name="status" id="">
                    <optgroup>
                        <?php if ($row['active'] == 1) { ?>
                            <option value="1">Đã kích hoạt</option>
                            <option value="0">Chưa kích hoạt</option>
                            <option value="2">Khóa</option>
                        <?php } else if ($row['active'] == 0) { ?>
                            <option value="0">Chưa kích hoạt</option>
                            <option value="1">Đã kích hoạt</option>
                            <option value="2">Khóa</option>
                        <?php } else { ?>
                            <option value="2">Khóa</option>
                            <option value="0">Chưa kích hoạt</option>
                            <option value="1">Đã kích hoạt</option>
                        <?php } ?>
                    </optgroup>
                </select>
                <button style="margin: 10px auto;" class="btn btn-lg btn-login btn-block" type="submit">Lưu</button>
                <a href="member.php" style=" font-size: 20px; ">Quay lại</a>
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
</body>

</html>