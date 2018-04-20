<?php
	session_start();

include 'include/ConnectionDb.php';

include "include/checklogin.php";

// echo "<br><br>-->".$_SESSION["ss_username"]."<br>";
// echo "-->".$_SESSION["ss_local_office_id"]."<br>";
// echo "-->".$_SESSION["ss_local_office_name"]."<br>";
// echo "-->".$_SESSION["ss_PROVINCE_ID"]."<br>";
// echo "-->".$_SESSION["ss_group"]."<br>";
//
// echo "-->level".$_SESSION["ss_user_role_level"]."<br>";
// echo "-->".$_SESSION["ss_user_role_project"]."<br>";
// echo "-->".$_SESSION["ss_user_role_sar"]."<br>";
// echo "-->".$_SESSION["ss_user_role_result"]."<br>";
// echo "-->".$_SESSION["ss_user_role_ita"]."<br>";
// echo "-->".$_SESSION["ss_user_role_sitevisit"]."<br>";
// echo "-->".$_SESSION["ss_user_role_compatibility"]."<br>";
// echo "-->".$_SESSION["ss_area"]."<br>";

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>e-PlanNACC - ข้อมูลพื้นฐาน</title>

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
		    function changeYear(){
					var selectValue = document.getElementById("yearProject").value;
					var localshow = document.getElementById("local_office").value;

					if(localshow !="")
						{//alert(localshow);
							var x = "&local1="+localshow;
						}
					else
					{
							var x = "";
					}

//alert('ajax/getProjectDisplayIndex.php?q=0'+x);
					if (selectValue == "0"){

							$("#projectDisplayIndex").load("ajax/getProjectDisplayIndex.php?q='0'"+x);
					} else {
							$("#projectDisplayIndex").load("ajax/getProjectDisplayIndex.php?q=" + selectValue+x);
					}
			}

		</script>
	</head>

	<body class="no-skin" onload='changeYear("0")'>
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
								<a href="index.php">หน้าแรก</a>
							</li>

						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								หน้าแรก
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									ข้อมูลโดยสรุป
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<?php
								 	if($_SESSION["ss_user_role_level"] == '3' )//user admin
										{
								?>

										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right text-right"> จังหวัด </label>
											<div class="col-sm-9" id="province1">
												<?php
															include"list/list_province.php";
												 ?>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right text-right"> อำเภอ </label>
											<div class="col-sm-9" id="amphures1">
												<?php
															include"list/list_amphures.php";
												 ?>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right text-right"> ชื่อ อปท. </label>
											<div class="col-sm-9" id="local_office1">
												<?php
															include"list/list_local_office.php";
												 ?>
											</div>
										</div>


										<?php
												}
										 	else if($_SESSION["ss_user_role_level"] == '2' )//user_area
												{

										?>
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right text-right"> จังหวัด </label>
											<div class="col-sm-9" id="province1">
												<?php
															include"list/list_province_edit.php";
												 ?>
											</div>
										</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right text-right"> อำเภอ </label>
													<div class="col-sm-9" id="amphures1">
														<?php
																	include"list/list_amphures_edit.php";
														 ?>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right text-right"> ชื่อ อปท. </label>
													<div class="col-sm-9" id="local_office1">
														<?php
																	include"list/list_local_office_edit.php";
														 ?>
													</div>
												</div>
											<?php
													}
											 	else if($_SESSION["ss_user_role_level"] == '1' )// user province
													{

														$sql_locals= "select * from local_office where PROVINCE_ID = '".$_SESSION["ss_local_office_id"]."' ";

														mysqli_set_charset($conn,"utf8");
														$result_locals = mysqli_query($conn,$sql_locals);
														$row_locals = mysqli_fetch_array($result_locals);

											?>


											<div class="row">
												 <div class="col-sm-12">
													 <label ><b>โครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงานของ <?php echo " จังหวัด ".$row_locals[local_office_province]; ?></b></label>
													 <input type="hidden" name="provinces" id="provinces" value="<?php echo $_SESSION["ss_local_office_id"]; ?>">
												 </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right text-right"> อำเภอ </label>
												<div class="col-sm-9" id="amphures1">
													<label for="amphures">

													           <select name="amphures" id="amphures" onchange="selectlocaloffice();selectlocaloffice();" required>
													           <option value="">-------------- กรุณาเลือก --------------</option>
													<?php

													    $sql_amphures = "select * from amphures where PROVINCE_ID = '$row_locals[PROVINCE_ID]' order by AMPHUR_NAME asc ";

															$result_amphures = mysqli_query($conn,$sql_amphures);
															while($amphures = mysqli_fetch_array($result_amphures))
														{
													?>

													              <option value="<?php echo $amphures[AMPHUR_ID]; ?>"><?php echo $amphures[AMPHUR_NAME]; ?></option>
													<?php

														}
													?>
													            </select>
													</label>

												</div>
											</div>
													<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right text-right"> ชื่อ อปท. </label>
														<div class="col-sm-9" id="local_office1">
															<?php
																		include"list/list_local_office.php";
															 ?>
														</div>
													</div>

											<?php
														}

											else
											{


												$sql_locals= "select * from local_office where local_office_id = '".$_SESSION["ss_local_office_id"]."' ";
												mysqli_set_charset($conn,"utf8");
												$result_locals = mysqli_query($conn,$sql_locals);
												$row_locals = mysqli_fetch_array($result_locals);
								?>

								<div class="row">
									 <div class="col-sm-12">
										 <label ><b>โครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงานของ <?php echo $row_locals[local_office_name]." อำเภอ ".$row_locals[local_office_amphures]." จังหวัด ".$row_locals[local_office_province]; ?></b></label>
									 </div>
								</div>
								<input type="hidden" name="local_office" id="local_office" value="<?php echo $row_locals['local_office_id']; ?>">
								<?php
											}
								?>

								<div class="form-group">
								<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1">กรุณาเลือกปีที่ต้องดำเนินการ</label>
								<div class="col-sm-9">
								<select name="yearProject" id="yearProject" onchange="changeYear()">
												<option value="0" selected>---ปี---</option>
												<option value="2561">2561</option>
												<option value="2562">2562</option>
												<option value="2563">2563</option>
												<option value="2564">2564</option>
										</select><br><br>
								</div>
								</div>
								<div id='projectDisplayIndex'></div>

								<div class="row">
									 <div class="col-sm-12 text-center">
										 <label ><b><font color='red'>*** กราฟแสดงภาพรวมโครงการ อยู่ระหว่างการปรับปรุง</font></b></label>
									 </div>
								</div>

							<!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->

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

		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>


	<!--  	<script type="text/javascript">
			jQuery(function($) {



				//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
				//but sometimes it brings up errors with normal resize event handlers
				$.resize.throttleWindow = false;

				var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
				var data = [
				{ label: "โครงการที่รายงานแล้ว",  data: 9, color: "#2091CF"},
				{ label: "โครงการที่ยังไม่ได้รายงาน",  data: 1, color: "#AF4E96"}
				]
				function drawPieChart(placeholder, data, position) {
					$.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);

			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);


			})
		</script>-->
	</body>

			<script type="text/javascript">

			//---------------------------Province------------------------
		function selectprovince1(){
		var provinces = document.getElementById('provinces').value;
		$.post("list/list_amphures.php", { provinces : provinces },
			function(data){
				$("#amphures1").html(data);
			}
		);
		}

			//---------------------------amphures------------------------
		function selectlocaloffice(){
		var amphures = document.getElementById('amphures').value;
		$.post("list/list_local_office.php", { amphures : amphures },
			function(data){
				$("#local_office1").html(data);
			}
		);
		}


			</script>
</html>
