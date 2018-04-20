<?php
	session_start();
    include 'include/ConnectionDb.php';
		include "include/checklogin.php";
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>e-PlanNACC</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

    <script type="text/javascript">
        function changeYear(selectValue) {
            var provinceSelected = document.getElementById('selectProvince');
            var roundSelected = document.getElementById('selectRound');
            var districtSelected = document.getElementById('selectDistrict');
            $("#projectImplement").load("ajax/getProjectImplementProvinceNew.php?y=" + selectValue + "&p=" + provinceSelected.value + "&r=" + roundSelected.value);
            //var str = "y=" + selectValue + "&p=" + provinceSelected.value + "&r=" + roundSelected.value + "&a=" + districtSelected.value";
            //alert(str);
        }
        function changeProvince(selectValue2) {
            var yearSelected = document.getElementById('yearProject');
            var roundSelected = document.getElementById('selectRound');
            var districtSelected = document.getElementById('selectDistrict');
            $("#projectImplement").load("ajax/getProjectImplementProvinceNew.php?p=" + selectValue2 + "&y=" + yearSelected.value + "&r=" + roundSelected.value);
        }
        function changeRound(selectValue3) {
            var provinceSelected = document.getElementById('selectProvince');
            var yearSelected = document.getElementById('yearProject');
            var districtSelected = document.getElementById('selectDistrict');
            $("#projectImplement").load("ajax/getProjectImplementProvinceNew.php?r=" + selectValue3 + "&y=" + yearSelected.value + "&p=" + provinceSelected.value);
        }
    </script>
	</head>

<body class="no-skin" onload="changeYear(0); changeProvince(0); changeRound(1);">
  <div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
<?php
    include"menu_navigation.php";
?>
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
      try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed sidebar-scroll">
      <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
      </script>


      <?php
            include"menu_side.php";
       ?>

      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>
    </div>

    <div class="main-content">
      <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a href="#">หน้าแรก</a>
            </li>

            <li>
              <a href="#">โครงการ</a>
            </li>
            <li class="active">ผลการนำแผนไปสู่ปฏิบัติ</li>
          </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">



          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
            <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<div class="row">

<select name="yearProject" id="yearProject" onchange="changeYear(this.value)" required>
    <option value="0" selected>กรุณาเลือกปีที่นำแผนไปสู่การปฏิบัติ</option>
    <option value="2561">2561</option>
    <option value="2562">2562</option>
    <option value="2563">2563</option>
    <option value="2564">2564</option>
</select><br><br>

<select name ="province" id="selectProvince" onchange="changeProvince(this.value)" required>
    <option value="0" selected>กรุณาเลือกจังหวัดที่ต้องการ</option>
    <?php

    require 'include/ConnectionDb.php';
    $sql="select * from provinces order by CONVERT(PROVINCE_NAME USING tis620)  asc";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
        echo "<option value=" . $row['PROVINCE_ID'] . ">" . $row['PROVINCE_NAME'] . "</option>";
    }
    ?>
</select><br><br>

<select name="round" id="selectRound" onchange="changeRound(this.value)" required>
    <option value="1" selected>6 เดือน</option>
    <option value="2">12 เดือน</option>
</select>

<!--  ตัวแปรภาคเอาไว้ส่งค่าไป javascript -->
<!-- <select name = "district" id="selectDistrict" hidden="true">
   <option value="8" selected>รหัสภาค</option>
</select> -->
<div id='projectImplement'></div>

<!-- <div id='projectImplement'></div> -->

</div>
</form>
<!-- ----------------------------------------------------------------------------------------- -->


							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php
						include"footer.php";
			 ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->


		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
  </body>
</html>
