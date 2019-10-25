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
if(isset($_SESSION['name'])){
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
if(isset($_SESSION['name'])){
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
    </div>
        <!-- container -->
</div>
    <!-- top-header -->
    <!-- </div> -->
    <!-- header -->
    
    <div class="header" style="box-shadow: 0 1px 1px rgba(0,0,0,0.15);">
        <div class="container">
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
            <button type="button" id="toggle-nav" class ="btn btn-gnav" data-target="" data-toggle="">
                <i class="fa fa-bars c-blue-a5"></i>
            </button>
        </div>
        <!-- container -->
    </div>
    <!-- header -->
    <div class="menu-container"  id="menu-main">
        <div class="container">
            <nav class>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <p><a href="gioithieu.php">Giới thiệu chung</a></p>
                        <ul class="sub-nav">
                            <li><a href="gioithieu.php"><i class="fa fa-angle-double-right"></i>Giới
                                    thiệu chung</a></li>
                            <li><a href="#"><i
                                        class="fa fa-angle-double-right"></i>Toàn cảnh ĐH Nguyễn Tất Thành</a></li>
                            <li><a href="#"><i
                                        class="fa fa-angle-double-right"></i>Hệ thống Cơ sở vật chất</a></li>
                            <li><a href="#"><i
                                        class="fa fa-angle-double-right"></i>Thông tin 3 công khai</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Đảm bảo chất
                                    lượng</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Phát
                                    triển bền vững</a></li>
                        </ul>

                        <p><a href="hoptacdn.php">Hợp tác doanh nghiệp</a></p>
                        <ul class="sub-nav">
                            <li><a href="daotao.php"><i class="fa fa-angle-double-right"></i>Giới
                                    thiệu việc làm</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Giới thiệu thực tập</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Câu lạc bộ Doanh nghiệp</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Ban liên lạc Cựu sinh viên</a></li>
                            <li><a href=""><i
                                        class="fa fa-angle-double-right"></i>Liên kết - Hợp tác</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <p><a href="tuyensinh.php">Tuyển sinh</a></p>
                        <ul class="sub-nav">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Các bậc đào tạo</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Thông tin tuyển sinh</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Chính sách học bổng</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Hướng nghiệp</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Xét tuyển trực tuyến</a></li>
                        </ul>

                        <p><a href="nghiencuu.php">Nghiên cứu</a></p>
                        <ul class="sub-nav">
                            <li><a href="#"><i
                                        class="fa fa-angle-double-right"></i>Hoạt động khoa học công nghệ</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Viện - Trung
                                    tâm nghiên cứu</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Công bố khoa
                                    học</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <p><a href="daotao.php">Đào tạo</a></p>
                        <ul class="sub-nav">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối Khoa học sức khỏe</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối Kinh tế - Quản trị</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối Kỹ thuật - Công nghệ</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối Khoa học xã hội - Nhân văn</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối Mỹ thuật - Nghệ thuật</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Khối đào tạo quốc tế</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <ul class="sub-page">
                            <li><a href="http://facbook.com/daihocnguyentatthanh" class="btn"><i
                                        class="fa fa-facebook-official"></i>Facebook</a></li>
                            <li><a href="https://plus.google.com/112750194814925795608" class="btn"><i
                                        class="fa fa-google-plus"></i>Google Plus</a></li>
                            <li><a href="http://youtube.com/daihocntt" class="btn"><i
                                        class="fa fa-youtube-play"></i>Youtube</a></li>
                            <li><a href="mailto:#" class="btn"><i class="fa fa-envelope"></i>E-mail</a></li>
                            <li><a href="https://zalo.me/1656351623584574728" class="btn"><i
                                        class="fa fa-wechat"></i>Zalo</a></li>
                            <li><a href="https://eo1.ntt.edu.vn" class="btn"><i
                                        class="fa fa-mortar-board"></i>E-office</a></li>
                            <li><a href="http://tcns.ntt.edu.vn" class="btn"><i class="fa fa-users"></i>Tuyển dụng</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--/container -->
        </div>
        <!--/gnav -->
    </div>
  </body>
