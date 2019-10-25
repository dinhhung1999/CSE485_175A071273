<?php
  if(session_id()==''){
    session_start();
  }
?>
<div class="top-header">
    <div class="container">
        <div class="d-flex text-uppercase d-flex justify-content-between" id="hnav">
        <button data-toggle="dropdown" type="button" class="btn btn-hnav hidden-lg-up" id="hnav-trigger" ><i class="fa fa-bars"></i>
        <div class="dropdown">
            <ul class="dropdown-menu extended logout" style="" id="menutop">
                <li><ul class="pl-0 ">
                        <li class="hot1">Hotline
                            <a href="tel:0912.298.300"> 0902.298.300</a> &nbsp;-&nbsp;
                            <a href="tel:0906.298.300"> 0906.298.300</a>
                        </li>
                        <li class="hot2" style="display: none;">Hotline
                            <a href="tel:0912.298.300">0912.298.300</a>&nbsp;-&nbsp;
                            <a href="tel:0914.298.300">0914.298.300</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Sinh viên</a></li>
                <li><a href="#">Giảng viên</a></li>
                <li><a href="#">Đào tạo quốc tế</a></li>
                <?php
if(!isset($_SESSION['name'])){
?>
    <li><a href='login.php'> Đăng nhập </a></li>
    <li><a href='register.php'> Đăng ký </a></li>
<?php
}else{
?>
    <li><a href='user.php'> Xin chào <?php echo $_SESSION['name']; ?></a></li>
    <li><a href='logout.php'> Đăng xuất </a></li>
<?php
}
?>   
            </ul>
        </div></button>
            <div class="h-wrapper">
                <div class="mr-auto d-flex">
                    <div class="hotline mb-0 d-lg-flex align-items-center h-100" id="phoneList">
                        <p class="mb-0">Hotline:</p>
                        <ul class="list-unstyled" style="left: 30px;">
                            <li id="hotline1" style="display: block; top: -60px;">
                                <a href="tel:0902.298.300">0902.298.300</a>&nbsp;-&nbsp;<a href="tel:0906.298.300">0906.298.300</a>
                            </li>
                            <li id="hotline2" style="top: 9px; display: block;">
                                <a href="tel:0912.298.300">0912.298.300</a>&nbsp;-&nbsp;<a href="tel:0914.298.300">0914.298.300</a>
                            </li>
                        </ul>
                    </div> <!-- hotline -->
                    <nav class="hnav col-lg-8">
                        <ul class="d-lg-flex justify-content-between">
                            <li><a href="#">Sinh viên</a></li>
                            <li><a href="#">Giảng viên</a></li>
                            <li><a href="#">Đào tạo quốc tế</a></li>
                            <?php
if(!isset($_SESSION['name'])){
?>
    <li><a href='login.php'> Đăng nhập </a></li>
    <li><a href='register.php'> Đăng ký </a></li>
<?php
}else{
?>
    <li><a href='user.php'> Xin chào <?php echo $_SESSION['name']; ?></a></li>
    <li><a href='logout.php'> Đăng xuất </a></li>
<?php
}
?>                                                               
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- h-wrapper -->
            <div class="search ml-lg-3 ml-lg-0 flex-fill h-39">
                <form class="form-inline  mb-0 border-0" method="get" action="">
                    <input type="text" class="form-control border-0" placeholder="Tìm kiếm thông tin">
                    <span class="btn btn-link">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </form>
            </div>
                <!-- search -->
            <div class="language">
                <a href=""><img src="images/ico-flagen.jpg" alt="English"></a>
            </div>
                <!-- language -->
        </div>
        <div class="header" style="box-shadow: 0 1px 1px rgba(0,0,0,0.15);">
            <div class="d-flex align-items-center py-2">
                <h1 class="logo m-0">
                    <a href="index.php"> <img src="images/logo_ntt.png" style="height: 70px !important;" alt="logo"></a>
                </h1>
                <div class=" w-100 d-none d-lg-block">
                    <ul class="h-nav list-unstyled mb-0 d-flex justify-content-between align-items-center"
                        style="margin-left: 20px;">
                        <li><a href="gioithieu.php" class="d-flex align-items-center">
                                <span class="bdr-round"><i class="fa fa-info-circle"></i></span>
                                <span class="txt">Giới thiệu</span>
                            </a></li>
                        <li><a href="tuyensinh.php" class="d-flex align-items-center">
                                <span class="bdr-round"><i class="fa fa-graduation-cap"></i></span>
                                <span class="txt">Tuyển sinh</span>
                            </a></li>
                        <li><a href="daotao.php" class="d-flex align-items-center">
                                <span class="bdr-round"><i class="fa fa-book"></i></span>
                                <span class="txt">Đào tạo</span>
                            </a></li>
                        <li><a href="nghiencuu.php" class="d-flex align-items-center">
                                <span class="bdr-round"><i class="fa fa-bookmark"></i></span>
                                <span class="txt">Nghiên cứu</span>
                            </a></li>
                        <li><a href="hoptacdn.php" class="d-flex align-items-center">
                                <span class="bdr-round"><i class="fa fa-handshake-o"></i></span>
                                <span class="txt">Hợp tác doanh nghiệp</span>
                            </a></li>
                        <!-- /h-nav -->
                    </ul>
                </div>
                <!-- /d-flex -->
            </div>
        </div>
        <!-- container -->
    </div>
        <!-- container -->
</div>
<script src="js/hotline.js"></script>
