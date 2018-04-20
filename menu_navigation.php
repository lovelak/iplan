<?php


//$sql_name="SELECT * FROM local_office  WHERE local_office_id = '".$_SESSION['ss_local_office_id']."'";

//mysqli_set_charset($conn,"utf8");
//$result_name=mysqli_query($conn, $sql_name);
//$num_name=mysqli_fetch_assoc($result_name);


 ?>

<div class="navbar-container ace-save-state" id="navbar-container">
  <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
    <span class="sr-only">Toggle sidebar</span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>
  </button>
<!-- ------------------------------ ข้อความหัวเว็บ --------------------------->
  <div class="navbar-header pull-left">
    <a href="index.php" class="navbar-brand">
      <small>
        <!--<i class="fa fa-leaf"></i>-->
        <div style="float:left;"><img src="images/logonacc.png" alt="NACC" border="0" /> </div>
          <div style="float:left">ระบบรายงานและติดตามประเมินผลงานการดำเนินงาน<br>ตามแผนปฏิบัติการป้องกันการทุจริตขององค์กรปกครองส่วนท้องถิ่น</div>
      </small>
    </a>
  </div>
<!-------------------------------- ----------------------------------------->

  <div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">


  <!--     <li class="purple dropdown-modal">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <i class="ace-icon fa fa-bell icon-animated-bell"></i>
          <span class="badge badge-important">8</span>
        </a>

        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
          <li class="dropdown-header">
            <i class="ace-icon fa fa-exclamation-triangle"></i>
            โครงการที่ถึงกำหนดจะต้องรายงาน
          </li>

          <li class="dropdown-content">
            <ul class="dropdown-menu dropdown-navbar navbar-pink">
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                      New Comments
                    </span>
                    <span class="pull-right badge badge-info">+12</span>
                  </div>
                </a>
              </li>

              <li>
                <a href="#">
                  <i class="btn btn-xs btn-primary fa fa-user"></i>
                  Bob just signed up as an editor ...
                </a>
              </li>

              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                      New Orders
                    </span>
                    <span class="pull-right badge badge-success">+8</span>
                  </div>
                </a>
              </li>

              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                      <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                      Followers
                    </span>
                    <span class="pull-right badge badge-info">+11</span>
                  </div>
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown-footer">
            <a href="#">
              See all notifications
              <i class="ace-icon fa fa-arrow-right"></i>
            </a>
          </li>
        </ul>
      </li> -->


      <li class="light-blue dropdown-modal">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
          <!--<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" /> -->
          <span class="user-info">
            <small>Login ชื่อ</small>
            <?php echo $_SESSION["ss_local_office_name"];   ?>
          </span>

          <i class="ace-icon fa fa-caret-down"></i>
        </a>

        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
          <?php

            if($_SESSION["ss_user_role_level"] == '0' )
                  {
          ?>
          <li>
            <a href="detailuser.php">
              <i class="ace-icon fa fa-user"></i>
              Profile
            </a>
          </li>
          <li class="divider"></li>
          <?php
                  }
          ?>

          <li>
            <a href="logout.php">
              <i class="ace-icon fa fa-power-off"></i>
              Logout
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div><!-- /.navbar-container -->
