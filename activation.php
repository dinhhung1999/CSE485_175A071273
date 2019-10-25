<?php   
    if(session_id() == ''){
        session_start();
    }
    require_once('database.php');
    if(isset($_GET)){
        $active = $_GET['active'];
        $result = checkActive($active);
        if($result){
            $_SESSION['dangky_message'] = 'Bạn đã kích hoạt tài khoản thành công! Vui lòng đăng nhập';
            header("Location:login.php");
        }   
    }
?>