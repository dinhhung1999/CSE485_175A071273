<?php
  if(session_id()==''){
    session_start();
  }
  ?>
  <?php
if(isset($_SESSION['name']) && $_SESSION['lv']==2 ){
    require_once('database.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM slider WHERE ID = '{$id}'";
    $result = query($sql);
    if($result){
        $_SESSION['update_message'] = "Đã xóa slide !";
        Header("Location:member.php");
    }else{
        $_SESSION['update_message'] = "Xóa không thành công !";}
        Header("Location:member.php");
}else{
    $_SESSION['dangky_message']="Trước tiên bạn phải đăng nhập";
    header("Location:login.php");
}
?>