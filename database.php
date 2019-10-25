<?php
    function connect(){
    $host = "localhost";
    $userdtb = "root";
    $passdtb = "";
    $dtbname ="dbnttu";
    $conn = mysqli_connect($host, $userdtb, $passdtb, $dtbname);
    if ($conn) {
        return $conn;
    }else{
        return false;
    }
    }
?>
<!-- sql -->
<?php
    function query($sql){
        $conn = connect();
        if($conn){
            $result = mysqli_query($conn, $sql);
            return $result;
        }else{
            die('Không thực hiện được câu lệnh sql');
        }
    }
?>
<?php
function checkActive($active){
        $active = $_GET['active'];
        $sql = "SELECT * FROM user WHERE verify_code = '{$active}'";
        $result = query($sql);
        $user = mysqli_fetch_assoc($result);
        if($user){
            $status = $user['active'];
            if($status == 0){
            $sql = "UPDATE user SET active = 1 WHERE userID ={$user['userID']}";
                $updated = query($sql);
                if($updated){
                    return true;
                }
            }else{
                header("location:index.php");
            }
        }else{  
            die('Mã active không tồn tại trên hệ thông, vui lòng kiểm tra lại!');
        }
    }
?>
<?php
function getEmail($email){
    $sql = "SELECT * FROM user WHERE userEmail = '{$email}'";
    $result = query($sql);
    $userEmail = mysqli_fetch_assoc($result);
    return $userEmail;
}
?>
<?php
function getuserName($userName){
    $sql = "SELECT * FROM user WHERE userName = '{$userName}'";
    $result = query($sql);
    $userName = mysqli_fetch_assoc($result);
    return $userName;
}
?>
<?php
function checkEmail($email){
        $sql = "SELECT * FROM user WHERE userEmail = '{$email}'";
        $result = query($sql);
        if($result){
            // header("Location:resetpassword.php");
        }else{
            die('Email không tồn tại, vui lòng kiểm tra lại!');
        }
    }
?>