<?php
session_start();
unset($_SESSION["lv"]);
unset($_SESSION["name"]);
unset($_SESSION["email"]);
session_destroy($_SESSION);
$_SESSION['dangky_message'] = "Bạn đã đăng xuất!";
header("Location:login.php");
?>
