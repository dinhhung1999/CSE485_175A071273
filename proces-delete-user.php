<?php
if (session_id() == '') {
    session_start();
}
require_once('database.php');
if ($_SESSION['lv'] == 2) {
    $id = $_GET['id'];
    $username = $_SESSION['name'];
    $row = getuserName($username);
    $myid = $row['userID'];
    if($myid != $id){
        $sql = "DELETE FROM user WHERE userID = '{$id}'";
        $result = query($sql);
        if ($result) {
            $_SESSION['update_message'] = "Đã xóa thành viên!";
            Header("Location:member.php");
        } else {
            $_SESSION['update_message'] = "Xóa không thành công !";
            Header("Location:member.php");
        }
    }else{
        $_SESSION['update_message'] = "Bạn không thể xóa chính mình !";
            Header("Location:member.php");
    }
}else {
    $_SESSION['dangky_message'] = "Trước tiên bạn phải đăng nhập";
    header("Location:login.php");
}
?>