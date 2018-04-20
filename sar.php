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



	</head>

<body class="no-skin" >
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
              <a href="#">ขั้นสูง</a>
            </li>
            <li class="active">ผลการประเมิน</li>
          </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

          <div class="page-header">
            <h1>
              ผลการประเมิน
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
            <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<div class="row">


	<?php
		if($_SESSION["ss_user_role_level"] == '3' )//user admin
			{
	?>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1"> จังหวัด </label>
				<div class="col-sm-9" id="province1">
					<?php
								include"list/list_province.php";
					 ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1"> อำเภอ </label>
				<div class="col-sm-9" id="amphures1">
					<?php
								include"list/list_amphures.php";
					 ?>
				</div>
			</div>

			<?php
					}
				else if($_SESSION["ss_user_role_level"] == '2' )//user_area
					{

			?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1"> จังหวัด </label>
				<div class="col-sm-9" id="province1">
					<?php
								include"list/list_province_edit.php";
					 ?>
				</div>
			</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1"> อำเภอ </label>
						<div class="col-sm-9" id="amphures1">
							<?php
										include"list/list_amphures_edit.php";
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
						 <label><b>โครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงานของ <?php echo " จังหวัด ".$row_locals[local_office_province]; ?></b></label>
					 </div>
					 <input type="hidden" name="checktype" id="checktype" value="enable1">
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right text-right" for="form-field-1"> อำเภอ </label>
					<div class="col-sm-9" id="amphures1">
						<label for="amphures">

											 <select name="amphures" id="amphures" onchange="selectlocaloffice();" required>
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
	<input type="hidden" name="checktype" id="checktype" value="enable">
	<input type="hidden" name="local_office" id="local_office" value="<?php echo $row_locals['local_office_id']; ?>">
	<?php
				}
	?>

	<form action="saradd.php" method="post" enctype="multipart/form-data" name="frmProject" >

		<div class="form-group">
			<label class="col-sm-2 control-label no-padding-right text-right"> ผลการประเมินประจำปี</label>
			<div class="col-sm-9">
			<select name="sltYear" idea id="sltYear" onclick="selectlocaloffice()">

					<option value="2561">2561</option>
					<option value="2562">2562</option>
					<option value="2563">2563</option>
					<option value="2564">2564</option>
					<option value="2565">2565</option>
					<option value="2566">2566</option>
					<option value="2567">2567</option>
			</select><br>
			</div>
		</div>


	<div class="space-5 row"></div>



	<div id="sar"></div>




	<div class="space-10"></div>

				<!-- <input type="submit" name="btnSubmit"> -->
		<?php
				if($_SESSION["ss_group"] >= '2' )
			    {
						?>
				<button class="btn btn-info" type="submit" name="btnSubmit" value="บันทึก">
					<i class="ace-icon fa fa-floppy-o bigger-120"></i>
					บันทึก
				</button>

				<button class="btn" type="reset" name="btnReset">
					<i class="ace-icon fa fa-undo bigger-120"></i>
					ล้างข้อมูล
				</button>
<?php

}
?>
	</form>
</div>

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


	function selectlocaloffice(){
		if(document.getElementById('local_office'))
			{
					var checktype = document.getElementById('checktype').value;
					if(checktype == 'enable')
						{
							var local_office = document.getElementById('local_office').value;
							var sltYear = document.getElementById('sltYear').value;

							$.post("table_sar.php", { checktype : checktype ,local_office: local_office,sltYear : sltYear},
								function(data){
									$("#sar").html(data);
								}
							);
					}
			}
		else if(document.getElementById('checktype'))
			{
				var checktype = document.getElementById('checktype').value;
				if(checktype == 'enable1')
					{
							var amphures = document.getElementById('amphures').value;
							var sltYear = document.getElementById('sltYear').value;

							$.post("table_sar.php", { checktype : checktype ,amphures: amphures,sltYear : sltYear},
								function(data){
									$("#sar").html(data);
								}
							);
				}
			}
		else
			{
				var provinces = document.getElementById('provinces').value;
				var amphures = document.getElementById('amphures').value;
				var sltYear = document.getElementById('sltYear').value;

				$.post("table_sar.php", { amphures : amphures ,provinces: provinces,sltYear : sltYear},
					function(data){
						$("#sar").html(data);
					}
				);
			}
	}



		</script>


		</script>
	</body>
</html>
