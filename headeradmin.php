<div class="container">
          <nav class="menu-admin d-flex" style="margin: 100px 0 20px 0;">
            <ul class="d-flex">
              <li class="user menuadmin" id="profile">
                <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>Thông tin tài khoản</a>
              </li>
              <li class="post-home menuadmin" id="post">
                <a href="posts.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Bài viết</a>
              </li>
              <li class="Slider menuadmin" id="slider"><a href="slider.php"><i class="fa fa-sliders" aria-hidden="true"></i> Slider</a></li>
<?php
if($_SESSION['lv']==2){
  ?>
  <li class='Member menuadmin' id="member"><a href='member.php'><i class ='fa fa-list' aria-hidden='true'></i>Hệ thống</a></li>
<?php
}else{
}
?>
            </ul>
          </nav>
        </div>
      </div>
