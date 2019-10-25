<?php
if (session_id() == '') {
    session_start();
}
?>
<?php
require_once('database.php');
$id = $_GET['id'];
$sql = "SELECT * FROM post WHERE id = '$id'";
$result = query($sql);
$row = mysqli_fetch_assoc($result);
if (isset($_SESSION['name']) and $_SESSION['lv']==2) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $img = $_FILES['img'];
        $imgname = $img['name'];
        $des = "uploads/{$img['name']}";
        move_uploaded_file($img['tmp_name'], $des);
        $title = $_POST['title'];
        $body = $_POST['body'];
        $sql2 = "UPDATE post SET img = '$imgname', title = '$title', body='$body' WHERE id = '$id'";
        $result2 = query($sql2);
        if ($result2) {
            $_SESSION['update_message'] = "Sửa bài viết thành công !";
        } else {
            $_SESSION['update_message'] = "Sửa bài viết thất bại";
        }
    }
} else {
    header("Location:login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Chỉnh sửa bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin2.css">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require_once('topheader.php');
require_once('headeradmin.php');
?>

<body class="login-body">
    <div class="container">
        <form  enctype="multipart/form-data" method="Post" style="margin: 0 auto; max-width: 400px;">
            <h4 style=" text-align: center;">Bài viết ID : <?php echo $row['id']; ?></h4>
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
                <?php
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div></div>
                    <p>Ảnh tiêu đề:</p>
                    <div class="custom-file" style="max-width: 400px;">
                        <input type="file" id="inputGroupFile01" required="" name="img" ria-describedby="inputGroupFileAddon01">
                    </div>
                    <label for="">Tiêu đề: </label>
                    <input style="max-width: 400px;" type="text" class="form-control" name="title" id="title" required="" placeholder="Nhập tiêu đề" value="<?php echo $row['title']; ?>">
                    <label for="">Nội dung: </label>
                    <textarea style="max-width: 400px;" class="form-control" name="body" id="" required="" cols="30" rows="5"><?php echo $row['body']; ?></textarea>
                    <p><input style="border-radius: 5px; padding: 5px;margin-top: 10px;" type="submit" value="Lưu bài viết"></p>
                    <a href="member.php" style=" font-size: 20px; ">Quay lại</a>
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