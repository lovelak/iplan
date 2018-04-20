<?php
	session_start();
    include 'include/ConnectionDb.php';
		include "include/checklogin.php";

    $sql_local= "select * from localdetail where local_office_id = '".$_SESSION["ss_local_office_id"]."' ";
    //echo $sql_local;
		mysqli_set_charset($conn,"utf8");
		$result_local = mysqli_query($conn,$sql_local);
		$row_local = mysqli_fetch_array($result_local);
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
								<a href="#">โครงการ</a>
							</li>
							<li class="active">บันทึกแผน</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								ขั้นสูง
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									คะแนนขั้นต่ำ
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->
								<form class="form-horizontal" role="form" action="savedcriterionscore.php" method="post">

									<div class="form-group">
										<!-- <div class="col-sm-12"> -->

											<div class="row">

													<label class="col-sm-3 text-right">ปี</label>

												<div class="col-sm-3">
													<select name="yearscore" required onchange="changeYear(this.value)">
														<option value="0" selected>-- ปี --</option>
														<option value="2560">2560</option>
										        <option value="2561">2561</option>
										        <option value="2562">2562</option>
										        <option value="2563">2563</option>
										        <option value="2564">2564</option>
													</select><br>
												</div>
											</div>

									  	<div class="space-10"></div>
											<div class="row">

												<label class="col-sm-3 text-right"> คะแนนขั้นต่ำ </label>
												<div class="col-sm-2">
													<input type="text" class="text-right"   name='score'	id='score' value="" maxlength='3'/>
												</div>
												<label class="text-left">คะแนน</label>
											</div>

										</div><!-- /.col -->
									</div>



										<div class="col-md-offset-3 col-md-9">

											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึก
											</button>
											<button class="btn" type="reset" name="btnReset">
												<i class="ace-icon fa fa-undo bigger-120"></i>
												ล้างข้อมูล
											</button>

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

		//---------------------------year------------------------
function changeYear(selectValue){
	var years = selectValue;
	//alert('777');
	$.post("selectcriterionscore.php", { years : years },
		function(data){

			document.getElementById('score').value = data;
			//$("#amphures1").html(data);
		}
	);
}


		</script>
	</body>
</html>
