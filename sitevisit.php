<?php
	session_start();
    include 'include/ConnectionDb.php';
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
            <li class="active">เยี่ยม อปท.</li>
          </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

          <div class="page-header">
            <h1>
              เยี่ยม อปท.
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
            <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<div class="row">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> จังหวัด </label>
		<div class="col-sm-9" id="province1">
			<?php
						include"list/list_province.php";
			 ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> อำเภอ </label>
		<div class="col-sm-9" id="amphures1">
			<?php
						include"list/list_amphures.php";
			 ?>
		</div>
	</div>

	<form action="saradd.php" method="post" enctype="multipart/form-data" name="frmProject" >
	<div class="row">
		<div class="col-sm-6">
			<label >เยี่ยม อปท. ประจำปี</label>
			<select name="sltYear"  id="sltYear" onclick="selectlocaloffice()">
					<option value="2558">2558</option>
					<option value="2559">2559</option>
					<option value="2560">2560</option>
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

	<div class="space-5"></div>



	<div id="sv"></div>





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
	var provinces = document.getElementById('provinces').value;
	var amphures = document.getElementById('amphures').value;
	var sltYear = document.getElementById('sltYear').value;
	$.post("table_sitevisit.php", { amphures : amphures ,provinces: provinces,sltYear : sltYear},
		function(data){
			$("#sv").html(data);
		}
	);
	}



	function vs1(office_id,numfrom){
			var sltYear = document.getElementById('sltYear').value;
			var typeshow = '1';
			alert(office_id+'--'+numfrom);
			$.post("sitevisitadd.php", { sltYear : sltYear,local_office_code :office_id,typeshow : typeshow },
			function(data){
			//$("#svshow").html(data);
			//document.getElementById('svshow').innerHTML ="<label><button type='button' class='btn btn-success' title='เยี่ยม' onClick='if(confirm('คุณต้องการที่จะยกเลิกการเยี่ยมใช่หรือไม่ data')){vs2(data);}'><i class='fa fa-check' fa-2x ></i></button></label>";
			$("#svshow").html("<label><button type='button' class='btn btn-success' title='เยี่ยม' onClick='if(confirm('คุณต้องการที่จะยกเลิกการเยี่ยมใช่หรือไม่ data')){vs2(data);}'><i class='fa fa-check' fa-2x ></i></button></label>");
		//document.getElementById('svshow').innerHTML ="<label><button type='button' class='btn btn-default' title='เยี่ยม' onClick='alert('6666')'><i class='fa fa-car' fa-2x ></i></button></label>";
		}
	);
	}

	function vs2(office_id,numfrom){
			var sltYear = document.getElementById('sltYear').value;
			var typeshow = '2';
			alert(office_id+'--'+numfrom);
			$.post("sitevisitadd.php", { sltYear : sltYear,local_office_code :office_id,typeshow : typeshow },
			function(data){
			//$("#svshow").html(data);
			//document.getElementById('svshow').innerHTML ="<label><button type='button' class='btn btn-default' title='เยี่ยม' onClick=if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่ data')){vs1(data);}'><i class='fa fa-car' fa-2x ></i></button></label>";
			$("#svshow").html("<label><button type='button' class='btn btn-default' title='เยี่ยม' onClick=if(confirm('คุณต้องการที่จะบันทึกการเยี่ยมใช่หรือไม่ data')){vs1(data);}'><i class='fa fa-car' fa-2x ></i></button></label>");

			//document.getElementById('svshow').innerHTML ="<label><button type='button' class='btn btn-default' title='เยี่ยม' onClick='alert('55555')'><i class='fa fa-car' fa-2x ></i></button></label>";

		}
	);
	}


	</script>


		</script>
	</body>
</html>
