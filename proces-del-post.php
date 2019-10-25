<?php
  if(session_id()==''){
    session_start();
  }
  ?>
  <?php
if(isset($_SESSION['name'])){
    $username = $_SESSION['name'];
    require_once('database.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM post WHERE ID = '{$id}' and userName = '$username'";
    $result = query($sql);
    if($result){
        $_SESSION['update_message'] = "Đã xóa bài viết !";
        Header("Location:posts.php");
    }else{
        $_SESSION['update_message'] = "Xóa không thành công !";}
}else{
    $_SESSION['dangky_message']="Trước tiên bạn phải đăng nhập";
    header("Location:login.php");
}
?>