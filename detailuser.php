<?php
	session_start();
    include 'include/ConnectionDb.php';
		include "include/checklogin.php";

    $sql_local= "select * from localdetail where local_office_id = '".$_SESSION["ss_local_office_id"]."' order by localdetail_id desc ";
    echo $sql_local;
		mysqli_set_charset($conn,"utf8");
		$result_local = mysqli_query($conn,$sql_local);
		$row_local = mysqli_fetch_array($result_local);
		if(empty($row_local[0]))
			{ //echo "0000";
				$lockedit = '1';
				$sql_local= "select * from local_office  where local_office_id = '".$_SESSION["ss_local_office_id"]."' ";
				mysqli_set_charset($conn,"utf8");
				$result_local = mysqli_query($conn,$sql_local);
				$row_local = mysqli_fetch_array($result_local);
			}
		else
			{
				$lockedit = '0';
			}

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
	</head>

	<body class="no-skin">
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
								<a href="#">ข้อมูลพื้นฐาน</a>
							</li>
							<li class="active">ลงทะเบียนข้อมูลพื้นฐานองค์กรปกครองส่วนท้องถิ่น</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								ข้อมูลพื้นฐาน
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									ลงทะเบียนข้อมูลพื้นฐานองค์กรปกครองส่วนท้องถิ่น
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->
								<form class="form-horizontal" role="form" action="savedetailuser.php" method="post">

									<div class="form-group">
										<div class="col-sm-12">
											<div class="tabbable">
												<ul class="nav nav-tabs" id="myTab">
													<li class="active">
														<a data-toggle="tab" href="#data1">
															<i class="green ace-icon fa fa-map-marker bigger-120"></i>
															ข้อมูลที่ตั้ง
														</a>
													</li>

													<li>
														<a data-toggle="tab" href="#data2">
															<i class="green ace-icon fa fa-street-view bigger-120"></i>
															ข้อมูลพื้นที่และผู้บริหาร
														</a>
													</li>

													<li class="dropdown">
														<a data-toggle="tab" href="#data3">
															<i class="green ace-icon fa fa-user bigger-120"></i>
															ข้อมูลผู้ประสานงาน
														</a>
													</li>
												</ul>

												<div class="tab-content">

<!-- -----------------------------------------------Tab 1 ------------------------------------------- -->
													<div id="data1" class="tab-pane fade in active">
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> จังหวัด </label>
															<div class="col-sm-9" id="province1">
																<?php
																			if($lockedit != '1' && $_SESSION["ss_user_role_level"] >= '2')
																				{
																					include"list/list_province_edit.php";
																				}
																			else
																				{
																					$sql_provinces = "select * from provinces where PROVINCE_ID='$row_local[PROVINCE_ID]'";
																					$result_provinces = mysqli_query($conn,$sql_provinces);
																					$provinces = mysqli_fetch_array($result_provinces);

																					echo "<label class='control-label' for='form-field-1'>".$provinces[PROVINCE_NAME]."</label>";

																?>
																					<input type="hidden" name="provinces" id="provinces" value="<?php echo $provinces[PROVINCE_ID]; ?>">
																<?php
																				}
																 ?>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> อำเภอ </label>
															<div class="col-sm-9" id="amphures1">
																<?php

																			if($lockedit != '1' && $_SESSION["ss_user_role_level"] >= '2')
																				{
																					include"list/list_amphures_edit.php";
																				}
																			else
																				{
																					$sql_amphures = "select * from amphures where PROVINCE_ID = '$row_local[PROVINCE_ID]' and AMPHUR_ID='$row_local[AMPHUR_ID]'";
																					$result_amphures = mysqli_query($conn,$sql_amphures);
																					$amphures = mysqli_fetch_array($result_amphures);

																					echo "<label class='control-label' for='form-field-1'>".$amphures[AMPHUR_NAME]."</label>";

																			?>
																					<input type="hidden" name="amphures" id="amphures" value="<?php echo $amphures[AMPHUR_ID]; ?>">
																			<?php
																				}
																			?>
															</div>
														</div>

														<!-- <div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ประเภท อปท. </label>
															<div class="col-sm-9">
																<?php
																			// include"list/list_local_type_edit.php";
																 ?>
															</div>
														</div> -->

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ขนาด </label>
															<div class="col-sm-9">
																<?php
																			include"list/list_local_size_edit.php";
																 ?>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อ อปท. </label>
															<div class="col-sm-9" id="local_office1">
																<?php

																			if($lockedit != '1' && $_SESSION["ss_user_role_level"] >= '2')
																				{
																					include"list/list_local_office_edit.php";
																				}
																			else
																				{
																					$sql_local_office = "select * from local_office WHERE PROVINCE_ID = '$row_local[PROVINCE_ID]' and local_office_id='$row_local[local_office_id]'";
																					$result_local_office = mysqli_query($conn,$sql_local_office);
																					$local_office = mysqli_fetch_array($result_local_office);

																					echo "<label class='control-label' for='form-field-1'>".$local_office[local_office_name]."</label>";

																			?>
																					<input type="hidden" name="local_office" id="local_office" value="<?php echo $local_office[local_office_id]; ?>">
																			<?php
																				}
																			?>

															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ที่ตั้งที่ทำการ </label>
															<div class="col-sm-3">
																<textarea class="form-control" id="form-field-8" placeholder="ที่ตั้งที่ทำการ" class="col-xs-10 col-sm-5" name='local_address' id='local_address'><?php echo $row_local[local_address]; ?></textarea>
															</div>
														</div>
													</div>

<!-- -----------------------------------------------Tab 2 ------------------------------------------- -->
													<div id="data2" class="tab-pane fade">
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ขนาดพื้นที่ให้บริการ : ตร.กม. </label>
															<div class="col-sm-9">
																	<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='local_large'	id='local_large' value="<?php echo $row_local[local_large]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ประชากรในเขตพื้นที่ : คน </label>
															<div class="col-sm-9">
																<input type="number" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='local_population'	id='local_population' value="<?php echo $row_local[local_population]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> รายได้ไม่รวมเงินอุดหนุน </label>
															<div class="col-sm-9">
																<input type="number" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='local_income'	id='local_income' value="<?php echo $row_local[local_income]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  รายได้จากเงินอุดหนุน : บาท </label>
															<div class="col-sm-9">
																<input type="number" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='local_income_plus'	id='local_income_plus' value="<?php echo $row_local[local_income_plus]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  ซื่อผู้บริหารท้องถิ่น (ชื่อ-สกุล) </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='localadmin_name'	id='localadmin_name' value="<?php echo $row_local[localadmin_name]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  ชื่อปลัดองค์กรปกครองส่วนท้องถิ่น (ชื่อ-สกุล) </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='per_localadmin_name'	id='per_localadmin_name' value="<?php echo $row_local[per_localadmin_name]; ?>"/>
															</div>
														</div>

													</div>


<!-- -----------------------------------------------Tab 3 ------------------------------------------- -->
													<div id="data3" class="tab-pane fade">
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อ - สกุล </label>
															<div class="col-sm-9">
																	<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_name'	id='officer_name' value="<?php echo $row_local[officer_name]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ตำแหน่ง </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_position'	id='officer_position' value="<?php echo $row_local[officer_position]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> สังกัด (ฝ่าย/กลุ่ม/กอง/สำนัก) </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_under'	id='officer_under' value="<?php echo $row_local[officer_under]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> โทรศัพท์ </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_tel'	id='officer_tel' value="<?php echo $row_local[officer_tel]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> โทรศัพท์เคลื่อนที่ </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_mobile'	id='officer_mobile' value="<?php echo $row_local[officer_mobile]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> โทรสาร </label>
															<div class="col-sm-9">
																<input type="text" id="officer_fax" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_fax'	id='officer_fax' value="<?php echo $row_local[officer_fax]; ?>"/>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> อีเมล </label>
															<div class="col-sm-9">
																<input type="email" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='officer_email'	id='officer_email' value="<?php echo $row_local[officer_email]; ?>" required/><font color="red">*</font>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> เว็บไซต์ อปท. </label>
															<div class="col-sm-9">
																<input type="text" id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='local_website'	id='local_website' value="<?php echo $row_local[local_website]; ?>"/>
															</div>
														</div>

                            <div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> รหัสผ่านสำหรับเข้าสู่ระบบครั้งต่อไป </label>
															<div class="col-sm-9">
																<input  id="form-field-1-1" placeholder="Text Field" class="col-xs-10 col-sm-5" name='password1'	id='password1' value="" type="password"/ required><font color="red">*</font>
															</div>
														</div>

													</div>

												</div>
											</div>
										</div><!-- /.col -->
									</div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">

											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึก
											</button>

										</div>
									</div>

									<div class="hr hr-24"></div>
								</form>

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
	</body>
</html>
