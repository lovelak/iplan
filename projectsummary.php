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

    <script type="text/javascript">
        function changeYearPlan(selectValue){
            if (selectValue == ""){
                $("#summaryPlan").load("ajax/getSummaryPlan.php?y=0");
            } else {
                $("#summaryPlan").load("ajax/getSummaryPlan.php?y=" + selectValue);
            }
        }

			// 	function changeYearPlan(selectValue){
			// 		var y = selectValue;
			// //	var provinces = document.getElementById('provinces').value;
			// 	$.post("ajax/getSummaryPlan.php", { data : y },
			// 		function(data){
			// 			$("#summaryPlan").html(data);
			// 		}
			// 	);
			// 	}

        function changeYearTrue(selectValue){
            if (selectValue == ""){
                $("#summaryTrue").load("ajax/getSummaryTrue.php?y=0");
            } else {
                $("#summaryTrue").load("ajax/getSummaryTrue.php?y='" + selectValue + "'");
            }
        }
        function changeYearPaid(selectValue){
            if (selectValue == ""){
                $("#summaryTrue").load("ajax/getSummaryTrue.php?y=0");
            } else {
                $("#summaryPaid").load("ajax/getSummaryPaid.php?y='" + selectValue + "'");
            }
        }
        function changeYearStatus(selectValue){
            if (selectValue == ""){
                $("#summaryTrue").load("ajax/getSummaryTrue.php?y=0");
            } else {
                $("#summaryStatus").load("ajax/getSummaryStatus.php?y='" + selectValue + "'");
            }
        }
    </script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
  </head>

  <body class="no-skin" onload="changeYearPlan('0'); changeYearTrue('0'); changeYearPaid('0'); changeYearStatus('0');">
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
                <a href="#">บันทึกการรายงานผลการดำเนินงาน</a>
              </li>
              <li class="active">แสดงการรายงานผลการดำเนินงานตามแผนฯ</li>
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

    โครงการ/งบประมาณ (ตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ.
    <select name="sltYearPlan" onchange="changeYearPlan(this.value); changeYearTrue(this.value); changeYearPaid(this.value); changeYearStatus(this.value);">
            <option value="0" selected>เลือกดูตามปีงบประมาณ
            <option value="2561">2561</option>
            <option value="2562">2562</option>
            <option value="2563">2563</option>
            <option value="2564">2564</option>
    </select><br>
    <div id='summaryPlan'></div>
    <br>
    โครงการ/งบประมาณ (ตามข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน) ประจำปีงบประมาณ พ.ศ.
    <select name="sltYearTrue" onchange="changeYearTrue(this.value)">
            <option value="0" selected>เลือกดูตามปีงบประมาณ
            <option value="2561">2561</option>
            <option value="2562">2562</option>
            <option value="2563">2563</option>
            <option value="2564">2564</option>
    </select><br>
    <div id='summaryTrue'></div>
    <br>
    การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ.
    <select name="sltYearPaid" onchange="changeYearPaid(this.value)">
            <option value="0" selected>เลือกดูตามปีงบประมาณ
            <option value="2561">2561</option>
            <option value="2562">2562</option>
            <option value="2563">2563</option>
            <option value="2564">2564</option>
    </select><br>
    <div id='summaryPaid'></div>
    <br>
    สถานะโครงการ/กิจกรรม/มาตรการ ประจำปีงบประมาณ พ.ศ.
    <select name="sltYearStatus" onchange="changeYearStatus(this.value)">
            <option value="0" selected>เลือกดูตามปีงบประมาณ
            <option value="2561">2561</option>
            <option value="2562">2562</option>
            <option value="2563">2563</option>
            <option value="2564">2564</option>
    </select><br>
    <div id='summaryStatus'></div>
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


    		</script>
    	</body>
    </html>
