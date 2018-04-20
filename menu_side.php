<?php

include 'include/ConnectionDb.php';



 ?>

<ul class="nav nav-list">
  <li class="">
    <a href="index.php">
      <i class="menu-icon fa fa-home"></i>
      <span class="menu-text"> หน้าแรก </span>
    </a>

    <b class="arrow"></b>
  </li>
<?php
  if($_SESSION["ss_group"] <= '2' )
    {
      $sql_detail="SELECT * FROM localdetail WHERE local_office_id = '".$_SESSION["ss_local_office_id"]."' ";
      mysqli_set_charset($conn,"utf8");
      $result_detail=mysqli_query($conn, $sql_detail);
      $num_detail=mysqli_fetch_assoc($result_detail);
      if(!empty($num_detail[localdetail_id]))
        {



?>
  <li class="">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-list"></i>
      <span class="menu-text"> โครงการ </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">

<?php

        if($_SESSION["ss_user_role_project"] >= '2')
              {
?>
      <li class="">
        <a href="projectcreate.php">
          <i class="menu-icon fa fa-caret-right"></i>
          บันทึกแผน
        </a>

        <b class="arrow"></b>
      </li>
<?php
            }

?>

      <li class="">
        <a href="projectdisplay.php">
          <i class="menu-icon fa fa-caret-right"></i>
<?php
  if($_SESSION["ss_user_role_level"] < '1')
    {
?>
          บันทึกการรายงานผลการดำเนินงาน
<?php
    }
    else
    {
?>
          การติดตามการรายงานผลการดำเนินงาน

<?php
    }
?>

        </a>

        <b class="arrow"></b>
      </li>

      <li class="">
        <a href="projectreportdisplay.php">
          <i class="menu-icon fa fa-caret-right"></i>
          รายงานโครงการทั้งหมด
        </a>

        <b class="arrow"></b>
      </li>
      <?php

        if($_SESSION["ss_user_role_level"] == '3' )// admin
              {
      ?>

      <li class="">
        <a href="projectimplementprovince.php">
          <i class="menu-icon fa fa-caret-right"></i>
          ผลการนำแผนไปปฏิบัติ (ทั่วประเทศ)
        </a>
        <b class="arrow"></b>
      </li>
      <?php
              }
       if($_SESSION["ss_group"] == '3' )// จังหวัด
              {
            ?>

            <li class="">
              <a href="projectimplementamphur.php">
                <i class="menu-icon fa fa-caret-right"></i>
                ผลการนำแผนไปปฏิบัติ (จังหวัด)
              </a>
              <b class="arrow"></b>
            </li>
            <?php
              }

        //if($_SESSION["ss_user_role_level"] > '0' &&  $_SESSION["ss_user_role_level"] != '3')
        if($_SESSION["ss_group"] == '4' )// ภาค
              {
      ?>
      <li class="">
        <a href="projectimplementdistrict.php">
          <i class="menu-icon fa fa-caret-right"></i>
          ผลการนำแผนไปปฏิบัติ (ภาค)
        </a>
        <b class="arrow"></b>
      </li>
<?php
              }
 ?>
    </ul>
  </li>
<?php

    if($_SESSION["ss_user_role_sar"] >= '1' ||  $_SESSION["ss_user_role_result"] == '1' || $_SESSION["ss_user_role_ita"] >= '1' || $_SESSION["ss_user_role_sitevisit"] >= '1')
          {
?>
  <li class="">
    <a href="#" class="dropdown-toggle">
      <i class="menu-icon fa fa-star"></i>
      <span class="menu-text"> ขั้นสูง </span>

      <b class="arrow fa fa-angle-down"></b>
    </a>

    <b class="arrow"></b>

    <ul class="submenu">
<?php

  if($_SESSION["ss_user_role_level"] == '3' )
        {
?>
      <li class="">
        <a href="manageuser.php">
          <i class="menu-icon fa fa-caret-right"></i>
          จัดการผู้ใช้งาน
        </a>

        <b class="arrow"></b>
      </li>
<?php
  }
if($_SESSION["ss_user_role_sar"] >= '1' )
  {
?>
      <li class="">
        <a href="sar.php">
          <i class="menu-icon fa fa-caret-right"></i>
          ผลการประเมิน
        </a>

        <b class="arrow"></b>
      </li>
<?php
  }
if($_SESSION["ss_user_role_ita"] >= '1')
  {
 ?>
      <li class="">
        <a href="scoreita.php">
          <i class="menu-icon fa fa-caret-right"></i>
          บันทึก ITA
        </a>

        <b class="arrow"></b>
      </li>
<?php
}
if($_SESSION["ss_user_role_level"] == '3' )
      {
?>
    <li class="">
      <a href="criterionscore.php">
        <i class="menu-icon fa fa-caret-right"></i>
        คะแนนขั้นต่ำ
      </a>

      <b class="arrow"></b>
    </li>
<?php
}
?>
      <!--   <li class="">
        <a href="projectcompatibility.php">
          <i class="menu-icon fa fa-caret-right"></i>
          ความสอดคล้องแต่ละโครงการ
        </a>

        <b class="arrow"></b>
      </li>-->

    </ul>
  </li>
<?php
    }
 ?>
  <li class="">
    <a href="projectsummary.php">
      <i class="menu-icon fa fa-pie-chart"></i>
      <span class="menu-text"> ออกรายงาน </span>
    </a>

    <b class="arrow"></b>
  </li>

<?php

  }
}
else
{
?>
<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-list"></i>
    <span class="menu-text"> โครงการ </span>

    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">

<?php

      if($_SESSION["ss_user_role_project"] >= '2')
            {
?>
    <li class="">
      <a href="projectcreate.php">
        <i class="menu-icon fa fa-caret-right"></i>
        บันทึกแผน
      </a>

      <b class="arrow"></b>
    </li>
<?php
          }

?>

    <li class="">
      <a href="projectdisplay.php">
        <i class="menu-icon fa fa-caret-right"></i>
<?php
if($_SESSION["ss_user_role_level"] < '1')
  {
?>
        บันทึกการรายงานผลการดำเนินงาน
<?php
  }
  else
  {
?>
        การติดตามการรายงานผลการดำเนินงาน

<?php
  }
?>

      </a>

      <b class="arrow"></b>
    </li>

    <li class="">
      <a href="projectreportdisplay.php">
        <i class="menu-icon fa fa-caret-right"></i>
        รายงานโครงการทั้งหมด
      </a>

      <b class="arrow"></b>
    </li>
    <?php

      if($_SESSION["ss_user_role_level"] == '3' )// admin
            {
    ?>

    <li class="">
      <a href="projectimplementprovince.php">
        <i class="menu-icon fa fa-caret-right"></i>
        ผลการนำแผนไปปฏิบัติ (ทั่วประเทศ)
      </a>
      <b class="arrow"></b>
    </li>
    <?php
            }
     if($_SESSION["ss_group"] == '3' )// จังหวัด
            {
          ?>

          <li class="">
            <a href="projectimplementamphur.php">
              <i class="menu-icon fa fa-caret-right"></i>
              ผลการนำแผนไปปฏิบัติ (จังหวัด)
            </a>
            <b class="arrow"></b>
          </li>
          <?php
            }

      //if($_SESSION["ss_user_role_level"] > '0' &&  $_SESSION["ss_user_role_level"] != '3')
      if($_SESSION["ss_group"] == '4' )// ภาค
            {
    ?>
    <li class="">
      <a href="projectimplementdistrict.php">
        <i class="menu-icon fa fa-caret-right"></i>
        ผลการนำแผนไปปฏิบัติ (ภาค)
      </a>
      <b class="arrow"></b>
    </li>
<?php
            }
?>
  </ul>
</li>
<?php

  if($_SESSION["ss_user_role_sar"] >= '1' ||  $_SESSION["ss_user_role_result"] == '1' || $_SESSION["ss_user_role_ita"] >= '1' || $_SESSION["ss_user_role_sitevisit"] >= '1')
        {
?>
<li class="">
  <a href="#" class="dropdown-toggle">
    <i class="menu-icon fa fa-star"></i>
    <span class="menu-text"> ขั้นสูง </span>

    <b class="arrow fa fa-angle-down"></b>
  </a>

  <b class="arrow"></b>

  <ul class="submenu">
<?php

if($_SESSION["ss_user_role_level"] == '3' )
      {
?>
    <li class="">
      <a href="manageuser.php">
        <i class="menu-icon fa fa-caret-right"></i>
        จัดการผู้ใช้งาน
      </a>

      <b class="arrow"></b>
    </li>
<?php
}
if($_SESSION["ss_user_role_sar"] >= '1' )
{
?>
    <li class="">
      <a href="sar.php">
        <i class="menu-icon fa fa-caret-right"></i>
        ผลการประเมิน
      </a>

      <b class="arrow"></b>
    </li>
<?php
}
if($_SESSION["ss_user_role_ita"] >= '1')
{
?>
    <li class="">
      <a href="scoreita.php">
        <i class="menu-icon fa fa-caret-right"></i>
        บันทึก ITA
      </a>

      <b class="arrow"></b>
    </li>
<?php
}
if($_SESSION["ss_user_role_level"] == '3' )
    {
?>
  <li class="">
    <a href="criterionscore.php">
      <i class="menu-icon fa fa-caret-right"></i>
      คะแนนขั้นต่ำ
    </a>

    <b class="arrow"></b>
  </li>
<?php
}
?>
    <!--   <li class="">
      <a href="projectcompatibility.php">
        <i class="menu-icon fa fa-caret-right"></i>
        ความสอดคล้องแต่ละโครงการ
      </a>

      <b class="arrow"></b>
    </li>-->

  </ul>
</li>
<?php
  }
?>
<li class="">
  <a href="projectsummary.php">
    <i class="menu-icon fa fa-pie-chart"></i>
    <span class="menu-text"> ออกรายงาน </span>
  </a>

  <b class="arrow"></b>
</li>
<?php
}
 ?>

    </ul>
  </li>
</ul><!-- /.nav-list -->
