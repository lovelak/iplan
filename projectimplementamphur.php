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
            var amphurSelected = document.getElementById('selectAmphur');
            var roundSelected = document.getElementById('selectRound');
            var provinceSeleted = document.getElementById("selectProvince");
            //var provinceSeleted = document.getElementById('selectProvince');
            $("#projectImplement").load("ajax/getProjectImplementAmphurNew.php?y=" + selectValue + "&a=" + amphurSelected.value + "&r=" + roundSelected.value + "&p=" + provinceSeleted.value);


    //        if (selectValue == "0") {
    //            //var provinceSeleted = document.getElementById('selectProvince');
    //            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=0&y=" + provinceSeleted.value);
    //        } else {
    //            $("#projectImplement").load("ajax/getProjectImplementProvince.php?y=" + selectValue + "&p=" + provinceSeleted.value);
    //        }
        }
        function changeAmphur(selectValue2) {
            var yearSelected = document.getElementById('yearProject');
            var roundSelected = document.getElementById('selectRound');
            var provinceSeleted = document.getElementById("selectProvince");
            $("#projectImplement").load("ajax/getProjectImplementAmphurNew.php?a=" + selectValue2 + "&y=" + yearSelected.value + "&r=" + roundSelected.value + "&p=" + provinceSeleted.value);
    //        if (selectValue2 == "0") {
    //            //var yearSelected = document.getElementById('yearProject');
    //            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=0&y=" + yearSelected.value);
    //        } else {
    //
    //            //window.alert (yearSelected.value);
    //            //window.alert ("ajax/getProjectImplementProvince.php?p=" + selectValue2 + "&y=" + yearSelected.value);
    //            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=" + selectValue2 + "&y=" + yearSelected.value);
    //        }
        }
        function changeRound(selectValue3) {
    //        alert(selectValue3);
            var amphurSelected = document.getElementById("selectAmphur");
            var yearSelected = document.getElementById("yearProject");
            var provinceSeleted = document.getElementById("selectProvince");
            $("#projectImplement").load("ajax/getProjectImplementAmphurNew.php?r="+ selectValue3 + "&a=" + amphurSelected.value + "&y=" + yearSelected.value + "&p=" + provinceSeleted.value);

    //        alert(str);

        }
				//---------------------------amphures------------------------
			function selectlocaloffice(){

			var amphures = document.getElementById('selectAmphur').value;
			$.post("list/list_local_office_edit.php", { amphures : amphures },
				function(data){
					$("#localoffice").html(data);
				}
			);
			}
    </script>

	</head>
<body class="no-skin" onload="changeYear(0); changeAmphur(0); changeRound(1)">
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

					<div class="page-header">
						<h1>
							แสดงการรายงานผลการดำเนินงานตามแผนฯ

						</h1>
					</div><!-- /.page-header -->

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
            <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<!-- <div class="row"> -->
<select name="yearProject" id="yearProject" onchange="changeYear(this.value)" required>
    <option value="0" selected>กรุณาเลือกปีที่นำแผนไปสู่การปฏิบัติ</option>
    <option value="2561">2561</option>
    <option value="2562">2562</option>
    <option value="2563">2563</option>
    <option value="2564">2564</option>
</select><br><br>

<select name ="amphur" id="selectAmphur" onchange="changeAmphur(this.value);selectlocaloffice();" required>
    <option value="0" selected>กรุณาเลือกอำเภอที่ต้องการ</option>
    <?php
    $p = $_SESSION["ss_local_office_id"]; // ตัวแปรจังหวัด ********
    echo $p;
    require 'include/ConnectionDb.php';
    $sql="select * from amphures WHERE PROVINCE_ID = $p";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
        echo "<option value=" . $row['AMPHUR_ID'] . ">" . $row['AMPHUR_NAME'] . "</option>";
    }
    ?>
</select><br><br>


<div id="localoffice" class="form-group">
	<label for="local_office">

	           <select name="local_office" id="local_office" required onclick="changeYear();" >
	           <option value="">กรุณาเลือก อปท. ที่ต้องการ</option>
	            </select>
	</label>
</div>

<select name ="round" id="selectRound" onchange="changeRound(this.value)" required>
    <option value="1" selected>รอบ 6 เดือน</option>
    <option value="2">รอบ 12 เดือน</option>
</select>

<!-- เอาไว้ส่งค่าไปกับ javascript เพื่อเรียก ajax -->
<select name = "province" id="selectProvince" hidden="true">
   <option value="<?php echo $_SESSION["ss_local_office_id"]; ?>" selected>รหัสจังหวัด</option>
</select>

<form action="upload_file_visit.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

<div id='projectImplement'></div>


</form>
<!-- </div> -->
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

			function Check1(v,v1)
				{
					alert(v1);
					var extall =",bat";

					file = v1;
					ext = file.split('.').pop().toLowerCase();
					if(parseInt(extall.indexOf(ext)) > 0)
					{
						alert('ประเภทไฟล์ของท่านไม่ถูกต้อง');
						v.value ="";
						v.title ="";

						return false;
					}
					v.title = v1;
					return true;
				}

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
