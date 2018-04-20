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

    <script>
        function disBudgetBox() {
            document.getElementById("txtBudgets").disabled=true;
            document.getElementById("txtBudgets").value="";
        }
        function enaBudgetBox() {
            document.getElementById("txtBudgets").disabled=false;

        }
        function changeYear() {
            var x = document.getElementById("yearSelect").value;
            //document.getElementById("demo").innerHTML = "You selected: " + x;
            if (x == "2"){
                document.getElementById("y1").value = '2565';
                document.getElementById("y1a").innerHTML = "2565";
                document.getElementById("y2").value = "2566";
                document.getElementById("y2a").innerHTML = "2566";
                document.getElementById("y3").value = "2567";
                document.getElementById("y3a").innerHTML = "2567";
                document.getElementById("y4").value = "2568";
                document.getElementById("y4a").innerHTML = "2568";
            } else if (x == "3"){
                document.getElementById("y1").value = "2569";
                document.getElementById("y1a").innerHTML = "2569";
                document.getElementById("y2").value = "2570";
                document.getElementById("y2a").innerHTML = "2570";
                document.getElementById("y3").value = "2571";
                document.getElementById("y3a").innerHTML = "2571";
                document.getElementById("y4").value = "2572";
                document.getElementById("y4a").innerHTML = "2572";
            } else {
                document.getElementById("y1").value = "2561";
                document.getElementById("y1a").innerHTML = "2561";
                document.getElementById("y2").value = "2562";
                document.getElementById("y2a").innerHTML = "2562";
                document.getElementById("y3").value = "2563";
                document.getElementById("y3a").innerHTML = "2563";
                document.getElementById("y4").value = "2564";
                document.getElementById("y4a").innerHTML = "2564";
            }
        }
        function atLeastOneRadio() {
            var off_payment_method = document.getElementsByName('type');
            var ischecked_method = false;
            for ( var i = 0; i < off_payment_method.length; i++) {
            if(off_payment_method[i].checked) {
                ischecked_method = true;
                break;
            }
        }
            if(!ischecked_method)   { //payment method button is not checked
                alert("Please choose Offline Payment Method");
            }
        }
    </script>

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
              <a href="#">โครงการ</a>
            </li>
            <li class="active">บันทึกแผน</li>
          </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

          <div class="page-header">
            <h1>
              บันทึกแผน
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                การบันทึกข้อมูลโครงการ/กิจกรรม/มาตรการ/แนวทางปฏิบัติงาน
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
            <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<div class="row">
  <form action="projectcreateadd.php" method="post" enctype="multipart/form-data" name="frmProject" onsubmit="return atLeastOneRadio()">

		<?php
			if($_SESSION["ss_user_role_level"] == '3' )//user admin
				{
		?>

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

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อ อปท. </label>
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
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> จังหวัด </label>
					<div class="col-sm-9" id="province1">
						<?php
									include"list/list_province_edit.php";
						 ?>
					</div>
				</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> อำเภอ </label>
							<div class="col-sm-9" id="amphures1">
								<?php
											include"list/list_amphures_edit.php";
								 ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อ อปท. </label>
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
						 </div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> อำเภอ </label>
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อ อปท. </label>
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
			 <div class="col-sm-12 text-left">
				 <label ><b><?php echo $row_locals[local_office_name]."<br> อำเภอ".$row_locals[local_office_amphures]."<br> จังหวัด".$row_locals[local_office_province]; ?></b></label>
			 </div>
		</div>
		<input type="hidden" name="local_office" value="<?php echo $row_locals['local_office_id']; ?>">
		<?php
					}
		?>

<div class="space-10"></div>
<div class="row">
	 <div class="col-sm-6">
		 <label class="text-h" >ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน</label>
	 </div>
</div>
<div class="row">
	<div class="col-sm-6">
		<textarea rows="4" cols="70" id='txtName' name="txtName" required placeholder="กรุณากรอก" oninvalid="this.setCustomValidity('กรุณากรอกชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน')" oninput="setCustomValidity('')" ></textarea>
	</div>
</div>
	  <div class="space-10"></div>
		<div class="row">
  	<div class="col-sm-4">
  			<div class="col-sm-10 row">
  				<label class="text-h">อปท. เลือกปีงบประมาณที่ดำเนินการ</label>
  		    <select id="yearSelect" onchange="changeYear()" required>
  		        <option value="1" selected>2561 - 2564</option>
  		        <option value="2">2565 - 2568</option>
  		        <option value="3">2569 - 2572</option>
  		    </select>
  			</div>

  			<div class="col-sm-8 row">
  					<div class="checkbox">
  						<label>
  							<input name="year1" id='y1' value="2561" class="ace ace-checkbox-2" type="checkbox" />
  							<span class="lbl"><label id='y1a'>2561</label></span>
  						</label>
  					</div>
  					<div class="checkbox">
  						<label>
  							<input name="year2" id='y2' value="2562" class="ace ace-checkbox-2" type="checkbox" />
  							<span class="lbl"><label id='y2a'>2562</label></span>
  						</label>
  					</div>
  					<div class="checkbox">
  						<label>
  							<input name="year3" id='y3' value="2563" class="ace ace-checkbox-2" type="checkbox" />
  							<span class="lbl"><label id='y3a'>2563</label></span>
  						</label>
  					</div>
  					<div class="checkbox">
  						<label>
  							<input name="year4" id='y4' value="2564" class="ace ace-checkbox-2" type="checkbox" />
  							<span class="lbl"><label id='y4a'>2564</label></span>
  						</label>
  					</div>
  				</div>

  		</div>

  		<div class="col-sm-4">
  			<div class="col-sm-10 row">
  					<label class="text-h">ประเภทงาน</label>
  			</div>
  			<div class="col-sm-8 row">
  				 <div class="radio">
  					 <label>
  						 <input name="type" type="radio" class="ace" value="1" required/>
  						 <span class="lbl"> โครงการ</span>
  					 </label>
  				 </div>
  				 <div class="radio">
  					 <label>
  						 <input name="type" type="radio" class="ace" value="2"/>
  						 <span class="lbl"> กิจกรรม</span>
  					 </label>
  				 </div>
  				 <div class="radio">
  					 <label>
  						 <input name="type" type="radio" class="ace" value="3"/>
  						 <span class="lbl"> มาตรการ</span>
  					 </label>
  				 </div>
  				 <div class="radio">
  					 <label>
  						 <input name="type" type="radio" class="ace" value="4"/>
  						 <span class="lbl"> แนวปฏิบัติงาน</span>
  					 </label>
  				 </div>
  			</div>
  		</div>

  	</div>

		<div class="space-10"></div>
		<div class="row">
			<div class="col-sm-4">
				<label >ดำเนินการในไตรมาส</label>
				<select name="quarter" required>
						<option value="">---</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
				</select><br>
			</div>
		</div>

  	<div class="space-10"></div>

  	<div class="row">
  		 <div class="col-sm-6">
  			 <label class="text-h">สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ </label>
  		 </div>
  	</div>
  	<div class="row">
  		 <div class="col-md-8">
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="1" required/>
  					<span class="lbl"> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต</span>
  				</label>
  			</div>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="2"/>
  					<span class="lbl"> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต</span>
  				</label>
  			</div>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="3"/>
  					<span class="lbl"> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน</span>
  				</label>
  			</div>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="4"/>
  					<span class="lbl"> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ</span>
  				</label>
  			</div>
  		</div>
  </div>

  <div class="space-10"></div>

  <!--  <div class="row">
  	<div class="col-sm-6">
  		<label >งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ.</label>
      <select name="sltYear">
          <option value="2558">2558</option>
          <option value="2559">2559</option>
          <option value="2560">2560</option>
          <option value="2551">2561</option>
          <option value="2551">2562</option>
          <option value="2551">2563</option>
          <option value="2551">2564</option>
          <option value="2551">2565</option>
          <option value="2551">2566</option>
          <option value="2551">2567</option>
      </select><br>
  	</div>
  </div>-->

  <div class="space-10"></div>

  <div class="row">
  	 <div class="col-sm-6">
  		 <label class="text-h">งบประมาณ</label>
  	 </div>
  </div>
  <div class="row">
  	 <div class="col-md-8">
  			<div class="radio">
  				<label>
  					<input type="radio" name="budget" value="N" onclick="disBudgetBox()" class="ace" required>
  					<span class="lbl"> ไม่ใช้งบประมาณ</span>
  				</label>
  			</div>
  			<div class="radio">
  				<label>
  					<input type="radio" name="budget" value="Y" onclick="enaBudgetBox()" class="ace" required>
  					<span class="lbl"> งบประมาณตามแผนปฏิบัติการป้องกันการทุจริต จำนวน <input type="text" id="txtBudgets" name="txtBudget" cols="30" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid="this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')"  oninput="setCustomValidity('')" disabled  > บาท</span>
  				</label>
  			</div>
  		</div>
  </div>

  <div class="space-10"></div>

  <div class="row">
  	 <div class="col-sm-6">
  		 <label class="text-h">กลุ่มเป้าหมาย</label>
  	 </div>
  </div>

	<div class="row">

		<div class="col-sm-8 row">

				<div class="checkbox">
					<label>
						<input name="target_group1" id='target_group1' value="1" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y1a'>ข้าราชการการเมืองฝ่ายบริหาร</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group2" id='target_group2' value="2" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y1a'>ข้าราชการการเมืองฝ่ายสภาท้องถิ่น</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group3" id='target_group3' value="3" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y1a'>ข้าราชการ/พนักงาน/ลูกจ้าง ส่วนท้องถิ่น</label></span>
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input name="target_group4" id='target_group4' value="4" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y2a'>เด็กและเยาวชน</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group5" id='target_group5' value="5" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y3a'>ประชาชน/ภาคประชาสังคม</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group6" id='target_group6' value="6" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y4a'>สถานศึกษา</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group7" id='target_group7' value="7" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y4a'>หน่วยงานภาครัฐ</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group8" id='target_group8' value="8" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y4a'>หน่วยงานภาครัฐวิสาหกิจ</label></span>
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input name="target_group9" id='target_group9' value="9" class="ace ace-checkbox-2" type="checkbox" />
						<span class="lbl"><label id='y4a'>หน่วยงานภาคธุรกิจเอกชน</label></span>
					</label>
				</div>
			</div>

	 	</div>
  <!--  <div class="row">
  	<div class="col-sm-6">
  		<input type="text" name="txtTarget" size="65" required placeholder="กรุณากรอก" oninvalid="this.setCustomValidity('กรุณากรอกกลุ่มเป้าหมาย')"  oninput="setCustomValidity('')"  >
  	</div>
  </div>-->

  <div class="space-10"></div>

  <div class="row">
  	 <div class="col-sm-6">
  		 <label class="text-h">วัตถุประสงค์</label>
  	 </div>
  </div>

  	<div class="col-sm-6">
  		<textarea rows="4" cols="70" name="txtObject" required placeholder="กรุณากรอก" oninvalid="this.setCustomValidity('กรุณากรอกวัตถุประสงค์')"  oninput="setCustomValidity('')"  ></textarea>
  	</div>
  </div>

  <div class="space-10"></div>

  <div class="row">
  	 <div class="col-sm-6">
  		 <label class="text-h">หมายเหตุ</label>
  	 </div>
  </div>
  <div class="row">
  	<div class="col-sm-6">
  		<textarea rows="4" cols="70" name="txtRemark" placeholder="กรุณากรอก"></textarea>
  	</div>
  </div>

    <div class="space-10"></div>


        <!-- <input type="submit" name="btnSubmit"> -->

    		<button class="btn btn-info" type="submit" name="btnSubmit" value="บันทึก">
    			<i class="ace-icon fa fa-floppy-o bigger-120"></i>
    			บันทึก
    		</button>
    		<button class="btn btn-warning" type="submit" name="btnSubmit2" value="บันทึกข้อมูลถัดไป">
    			<i class="ace-icon fa fa-arrow-right bigger-120"></i>
    			บันทึกข้อมูลถัดไป
    		</button>
    		<button class="btn" type="reset" name="btnReset">
    			<i class="ace-icon fa fa-undo bigger-120"></i>
    			ล้างข้อมูล
    		</button>
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

		</script>
	</body>
</html>
