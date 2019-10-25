<?php
require_once('database.php');
session_start();
$sql = "SELECT * FROM post ORDER BY date DESC LIMIT 3";
$result = query($sql);
$sql2 = "SELECT * FROM slider ORDER BY date DESC";
$result2 = query($sql2);
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../BTLCNW/images/favicon.ico" type="image/x-icon">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111247479-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-111247479-1');
    </script>
    <!-- Global site tag (gtag.js) - End of Google Analytics -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-57FL7QN');
    </script>
    <!-- End Google Tag Manager -->
    <title>Đại học Nguyễn Tất Thành - NTTU</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="charset=utf-8">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style">

    <meta name="google-site-verification" content="vgLTH-ZO9I8WjvVuSDfvD3dT4eqnYS6TUjyjrMBrDEI" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    require_once('header.php');
    ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <section id="content">
                    <div id="slider-main" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="slide" role="listbox">
                         
                            <?php
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <div class="carousel-item" data-link="#">
                                    <img class="d-block w-100" src="uploads/<?php echo $row2['img']; ?>" alt="">
                                    <div class="carousel-caption d-block text-left">
                                        <h3><?php echo $row2['title']; ?></h3>
                                        <p></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="carousel-controls">
                            <a class="carousel-control-prev justify-content-end" href="#slider-main" data-slide="prev" role="button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next justify-content-start" href="#slider-main" data-slide="next" role="button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-flex section mt-4">
                        <div class="col-md-9">
                            <h2 class="heading-2"><a href="#">Tin tức</a></h2>
                            <div class="row">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <article class="col-md-4 col-sm-6 post-home">
                                        <a class="thumbnail" href="#">
                                            <img src="uploads/<?php echo $row['img']; ?>" alt="">
                                        </a>
                                        <a href="#" class="title" style="overflow: hidden; height: 65px;"><?php echo $row['title']; ?></a>
                                        <div class="content">
                                            <p><?php echo $row['body']; ?></p>
                                        </div>
                                    </article>
                                <?php }
                                ?>

                            </div>
                            <ul class="list-unstyled" style="float: right;">
                                <li><a class="c-blue-a5 font-weight-bold" href="news.php"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h2 class="heading-2">Media</h2>
                            <article class="post-video" style="width: inherit">
                                <iframe style="width: inherit;" src="https://www.youtube.com/embed/JViDyojZzhs" frameborder="0" allowfullscreen=""></iframe>
                                <div class="description">
                                    <ul class="list-style-1">
                                        <li><i class="fa fa-angle-right"></i><a href="https://www.youtube.com/watch?v=iZ1EUr2DAMs">ĐIỂM TIN THÁNG 8</a></li>
                                        <li><i class="fa fa-angle-right"></i><a href="https://www.youtube.com/watch?v=SwWJkVE6vMg">ĐH Nguyễn Tất Thành – 20 năm dấu ấn một chặng đường</a></li>
                                        <li><i class="fa fa-angle-right"></i><a href="https://www.youtube.com/watch?v=txdD9O_bGXA">NỎ THẦN - TẬP 8 | BẬT MÍ VỀ NỎ THẦN VÀ NHỮNG CÂU CHUYỆN CÓ THẬT</a></li>
                                    </ul>
                                    <a class="c-blue-a5 font-weight-bold row justify-content-end align-items-center m-0" href="https://www.youtube.com/channel/UCPuljJ0RsiXHf3odISzjqDw"><i class="fa fa-chevron-circle-right mr-2"></i>Xem thêm</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="section-reason mb-5">
                        <h3 class="title-carousel text-uppercase text-center py-4"><b>Tại sao chọn đại học nguyễn tất thành</b></h3>
                        <div class="container mb-5 py-5" style="background: #024282; max-height: 300px;">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_nguoithay-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">Chuẩn 3 sao QS-Stars (Anh Quốc)</h5>
                                                        <p class="card-text text-white text-center">Xếp hạng quốc tế 3 sao theo chuẩn QS-Stars, một trong các chuẩn xếp hạng hàng đầu dành cho các trường đại học trên thế giới.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_xhoi-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">Đạt chuẩn chất lượng quốc gia</h5>
                                                        <p class="card-text text-white text-center">Là trường đại học ngoài công lập đầu tiên tại TP.HCM được kiểm định đạt chất lượng theo bộ tiêu chí quốc gia do Bộ GD&ĐT ban hành.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_nhatruong-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">Đại học hạnh phúc</h5>
                                                        <p class="card-text text-white text-center">Đại học Nguyễn Tất Thành là ngôi trường tri thức và hạnh phúc dành cho sinh viên với 5 giá trị nổi bật.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_sinhvien-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">Top 10 thương hiệu nổi tiếng</h5>
                                                        <p class="card-text text-white text-center">Trong những năm qua, Trường ĐH Nguyễn Tất Thành đã không ngừng đổi mới công tác quản trị đại học, nâng cao chất lượng đào tạo, nghiên cứu khoa học, công tác hợp tác quốc tế, công tác sinh viên.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_doanhnghiep-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">95% sinh viên tốt nghiệp có việc làm</h5>
                                                        <p class="card-text text-white text-center">Định vị là trường ứng dụng và thực hành hướng tới mục tiêu đáp ứng nhu cầu giáo dục đại học đại chúng, trí thức hóa nguồn nhân lực, tạo môi trường học tập tích cực và trải nghiệm thực tiễn cho sinh viên.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card pt-5 border-0" style="background: url(images/hp_nguoithay-01.svg) no-repeat top/50%">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-white text-center">Chuẩn 3 sao QS-Stars (Anh Quốc)</h5>
                                                        <p class="card-text text-white text-center">Xếp hạng quốc tế 3 sao theo chuẩn QS-Stars, một trong các chuẩn xếp hạng hàng đầu dành cho các trường đại học trên thế giới.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev justify-content-start" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next justify-content-end" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div> <!-- section-reason  -->
                    <div class="section d-md-flex border-top pt-4">
                        <div class="col-lg-8">
                            <div class="row">
                                <article class="col-sm-6 post-home">
                                    <h2 class="heading-2"><a href="">Hợp tác quốc tế</a></h2>
                                    <a class="thumbnail large" href="#">
                                        <img src="images/DSC04631.jfif" alt="" width="100%">
                                    </a>
                                    <a href="#" class="title" style="overflow: hidden; height: 65px;">Khoa Công nghệ Sinh học ĐH Nguyễn Tất Thành làm việc với ĐH Hiroshima</a>
                                    <div class="content">
                                        <p>NTTU - Sáng ngày 17/09/2019, khoa Công nghệ Sinh học Trường ĐH Nguyễn Tất Thành đã có buổi làm việc với ĐH Hiroshima (Nhật Bản)</p>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><a class="c-blue-a5 font-weight-bold" href="#"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a></li>
                                    </ul>
                                </article>
                                <article class="col-sm-6 post-home">
                                    <h2 class="heading-2"><a href="#">Môi trường học tập</a></h2>
                                    <a class="thumbnail large" href="#">
                                        <img src="images/3e3.jfif" alt="" width="100%">
                                    </a>
                                    <a href="#" class="title" style="overflow: hidden; height: 65px;">Tìm hiểu về các câu lạc bộ tại Trường ĐH Nguyễn Tất Thành</a>
                                    <div class="content">
                                        <p>NTTU - Những năm gần đây, bên cạnh việc nâng cao chất lượng đào tạo, Trường ĐH Nguyễn Tất Thành không ngừng phát triển mô hình câu lạc bộ sinh viên nhằm tạo môi trường học tập và vui chơi tốt nhất cho người học. Thông qua mô hình CLB, các bạn sinh viên có thể dễ dàng trao đổi kiến thức, kinh nghiệm ngoài giờ học. Các CLB là nơi bạn thư giãn sau những giờ học căng thẳng, thể hiện niềm yêu thích, đam mê và góp công sức vào các chương trình tình nguyện vì cộng đồng. Mỗi CLB mang một màu sắc khác nhau bổ trợ rất nhiều cho các bạn có nhu cầu học ngoài sách vở, giao lưu giúp đỡ lẫn nhau như cùng nhau học tập kinh nghiệm từ các thế hệ anh chị đi trước .</p>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><a class="c-blue-a5 font-weight-bold" href="#"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a></li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="heading-2"><a href="#">Sự kiện nổi bật</a></h2>
                            <ul class="list-unstyled">
                                <li class="media event">
                                    <div class="d-flex align-items-center mr-3 thumb c-white">
                                        <span class="inner text-center w-100">
                                            Sep<br>
                                            <b>25</b>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="title mt-0"><a href="#">Đại hội đại biểu Đoàn TNCS Hồ CHí Minh - Trường ĐH Nguyễn Tất Thành lần VII, nhiệm kỳ 2019 - 2022</a></h5>
                                        <ul class="breadcrumb mb-0 bgm-white">
                                            <li class="breadcrumb-item col-xs-auto time">
                                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i>07:30
                                            </li>
                                            <li class="breadcrumb-item col-xs-auto">Hội trường A.801, 300A Nguyễn Tất Thành, phường 13, quận 4, TP. HCM</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="media event">
                                    <div class="d-flex align-items-center mr-3 thumb c-white">
                                        <span class="inner text-center w-100">
                                            Sep<br>
                                            <b>22</b>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="title mt-0"><a href="#">Chuyên đề tốt nghiệp lớp Việt Nam học - Khoa Du lịch và Việt Nam học</a></h5>
                                        <ul class="breadcrumb mb-0 bgm-white">
                                            <li class="breadcrumb-item col-xs-auto time">
                                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i>07:00
                                            </li>
                                            <li class="breadcrumb-item col-xs-auto">Sân bóng - cơ sở quận 7, 458/3F Nguyễn Hữu Thọ, phường Tân Hưng, quận 7</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="media event">
                                    <div class="d-flex align-items-center mr-3 thumb c-white">
                                        <span class="inner text-center w-100">
                                            Sep<br>
                                            <b>19</b>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="title mt-0"><a href="">Workshop, Chủ đề: "Youtube đã thay đổi cuộc sống của tôi như thế nào''</a></h5>
                                        <ul class="breadcrumb mb-0 bgm-white">
                                            <li class="breadcrumb-item col-xs-auto time">
                                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i>07:30
                                            </li>
                                            <li class="breadcrumb-item col-xs-auto">Hội trường L.HT1, 331 QL1A, phường An Phú Đông, quận 12</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a class="c-blue-a5 font-weight-bold" href="#"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <!-- row -->
        </div>
        <!-- container-->
    </div>
    <!--#main-->
    <?php
    require_once('footer.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/JS.js"></script>
    <script src="js/hotline.js"></script>
    <script src="js/crs.js"></script>
</body>

</html>