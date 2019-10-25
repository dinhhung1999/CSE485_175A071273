<?php
require_once('database.php');
session_start();
    $sql = "SELECT * FROM post ORDER BY date DESC";
    $result = query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../BTLCNW/images/favicon.ico" type="image/x-icon">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111247479-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-111247479-1');
    </script>
    <!-- Global site tag (gtag.js) - End of Google Analytics -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-57FL7QN');</script>
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
            <h2 style="text-align: center;padding-top: 80px;">Tin tức</h2>
            <div class="row">
        <?php
while($row = mysqli_fetch_assoc($result)){
?>  
                            <article class="col-12 col-sm-12 col-md-12 col-lg-4 my-3 post-home" style="padding-top: 20px ;">
                                <a class="thumbnail" href="#">
                                    <img src="uploads/<?php echo $row['img'];?>" alt="">
                                </a>
                                <a href="#" class="title" style="overflow: hidden; height: 65px;"><?php echo $row['title'];?></a>
                                <div class="content">
                                    <p><?php echo $row['body'];?></p>
                                </div>
                            </article>
                            
<?php } 
?>
            </div>
        </div>
    </div>
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
</body>
</html>