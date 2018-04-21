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

    <script>
    function checkReason(){
        var radioprocess = document.forms["frmProject"]["status_process"].value;
        var radioreason = document.forms["frmProject"]["cant_process"].value;
        var txtreason = document.forms["frmProject"]["cant_reason"].value;
        if (radioprocess == "4" && radioreason == ""){
            alert ("กรุณาเลือกเหตุผลที่ไม่สามารถดำเนินการได้");
            return false;
        }
        if (radioprocess == "4" && radioreason == "4" && txtreason == ""){
            alert ("กรุณากรอกเหตุผลที่ไม่สามารถดำเนินการได้ หรือเลือกจากที่กำหนดไว้");
            return false;
        }
    }
    </script>
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
                <a href="#">บันทึกการรายงานผลการดำเนินงาน</a>
              </li>
              <li class="active">การรายงานผลการดำเนินงานตามแผนปฏิบัติการป้องกันการทุจริต</li>
            </ul><!-- /.breadcrumb -->

          </div>

          <div class="page-content">

            <div class="page-header">
              <h1>
                การรายงานผลการดำเนินงานตามแผนปฏิบัติการป้องกันการทุจริต

              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
              <!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->



<form action="projectreportadd.php" method="post" enctype="multipart/form-data" name="frmProject" onsubmit="return checkReason()">


    <?php
    //include "..\include/ConnectionDb.php";
    $r = $_GET['r'];
    $id = $_GET['id'];
    $y = $_GET['y'];
    $o = $_GET['o'];
    if ($r == "1") {
        $round_report = '6';
    } else {
        $round_report = '12';
    }
    // เช็ครอบ 6 เดือนว่าเคยบันทึกหรือยัง
    $sql="SELECT * FROM report WHERE project_id='" . $id . "' AND round_report='" . $r . "' AND status_process_year='" . $y . "'";
    $sql2="SELECT * FROM report WHERE project_id='" . $id . "' AND (round_report='1' OR round_report='2') AND status_process_year='" . $y . "' AND status_process='3'";
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $result2=mysqli_query($conn, $sql2);
        // ถ้าหาเจอ
    if (mysqli_num_rows($result) > 0) {
        echo "<label  class='text-h'>มีการบันทึกแล้วรายงาานผลการดำเนินงานรอบ ".$round_report." เดือนของปีงบประมาณ " . $y . " แล้ว
        <input type='hidden' name='input_state' value='update'></label>";
        if (mysqli_num_rows($result2) > 0){
            //echo "<img src='images/icon/finish.jpg'><br>โครงการนี้ดำเนินการแล้วเสร็จ <br><br>";
						echo "<h3><span class='green'>โครงการนี้ดำเนินการแล้วเสร็จ </span></h3>";
        }
    } else {
        echo "<label class='text-h'>ยังไม่เคยบันทึกรายงานในรอบ ".$round_report." เดือนของปีงบประมาณ " . $y . "
        <input type='hidden' name='input_state' value='insert'></label>";
        if (mysqli_num_rows($result2) > 0){
            //echo "<img src='images/icon/finish.jpg'><br>โครงการนี้ดำเนินการแล้วเสร็จ <br><br>";
						echo "<h3><span class='green'>โครงการนี้ดำเนินการแล้วเสร็จ </span></h3>";
        }
    }
    while ($row=mysqli_fetch_assoc($result)){
        $budget_true= $row['budget_true'];
        $paid= $row['paid'];
        $input_plan= $row['input_plan'];
        $status_process = $row['status_process'];
        $radio_reason = $row['radio_reason'];
        $txt_reason = $row['txt_reason'];
        $remark_report = $row['remark_report'];
        // $local_goverment_id['local_goverment_id'];
    }
    if (!isset($budget_true))
        $budget_true = 0;
    if (!isset($paid))
        $paid = 0;
    if (!isset($input_plan))
        $input_plan = "";
    if (!isset($status_process))
        $status_process = 0;
    if (!isset($remark_report))
        $remark_report = "";
    if (!isset($radio_reason))
        $radio_reason = "";
    if (!isset($txt_reason))
        $txt_reason = "";
    if (!isset($remark_report))
        $remark_report = "";
    // if (!isset($local_goverment_id))
    //     $local_goverment_id = "";

    $sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    while ($row=mysqli_fetch_assoc($result)){
        $nameproject= $row['name'];
        $local_goverment_id= $row['local_goverment_id'];
        $idproject= $row['project_id'];
        $year1= $row['year1'];
        $year2= $row['year2'];
        $year3= $row['year3'];
        $year4= $row['year4'];
        $type= $row['type'];
        $dimention= $row['dimention'];
        $budgetyear = $row['budget_year'];
        $non_budget = $row['non_budget'];
        $budget = $row['budget'];
    }
		echo "<br><label class='text-h'>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน</label><h2>";
		echo $nameproject . "</h2>";
    //if (mysqli_num_rows($result2) == 0) {
        echo "<div class='col-sm-8 row'>
          					<div class='checkbox'>
          						<label>";
        if ($year1 != "")
            echo "<input type='checkbox' name ='year1' value='2561' checked disabled><label>2561</label><br>";
        if ($year2 != "")
            echo "<input type='checkbox' name ='year2' value='2562' checked disabled><label>2562</label><br>";
        if ($year3 != "")
            echo "<input type='checkbox' name ='year3' value='2563' checked disabled><label>2563</label><br>";
        if ($year4 != "")
            echo "<input type='checkbox' name ='year4' value='2564' checked disabled><label>2564</label><br>";

        echo "  			</label>
          					</div>
          		</div>";

        echo "<br>ประเภทงาน <br>";
        if ($type == "1")
            echo "<input type='radio' name='type' value='1' checked disabled> โครงการ<br>";
        if ($type == "2")
            echo "<input type='radio' name='type' value='2' checked disabled> กิจกรรม<br>";
        if ($type == "3")
            echo "<input type='radio' name='type' value='3' checked disabled> มาตรการ<br>";
        if ($type == "4")
            echo "<input type='radio' name='type' value='4' checked disabled> แนวปฏิบัติ<br>";

        echo "<br><label class='text-h'>สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ </label><br>";
        if ($dimention == "1")
            echo "<input type='radio' name='dimention' value='1' checked disabled> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต<br>";
        if ($dimention == "2")
            echo "<input type='radio' name='dimention' value='2' checked disabled> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต<br>";
        if ($dimention == "3")
            echo "<input type='radio' name='dimention' value='3' checked disabled> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน<br>";
        if ($dimention == "4")
            echo "<input type='radio' name='dimention' value='4' checked disabled> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ<br>";



        if ($non_budget == 'N'){
            echo "<label class='text-h'>งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. " . $y . "</label><br>
            <input type='radio' name='budget' value='N' onclick='disBudgetBox()' required checked disabled> ดำเนินการโดยไม่ใช้งบประมาณ <br><br>
            <input type='hidden' name = 'txtBudget' value='0'>
            <input type='hidden' name = 'id' value='" . $local_goverment_id . "'>
            <input type='hidden' name = 'txtAmount' value='0'>
            <input type='hidden' name = 'txtPaid' value='0'>
            <input type='hidden' name = 'use_budget' value='N'>";

        } else {
            echo "<label class='text-h'><input type='hidden' name = 'txtBudget' value='$budget'>
            งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. " . $y . "</label><br>
            <input type='radio' name='budget' value='Y' onclick='enaBudgetBox()' required checked  disabled> ดำเนินการโดยใช้งบประมาณ จำนวน " . number_format($budget) . " บาท<br><br>

            <label class='text-h'>งบประมาณ (วงเงินตามข้อบัญญัติ/เทศบัญญัติ) ประจำปีงบประมาณ พ.ศ. " . $y . "</label><br>
            จำนวน
            <input type='text' id='txtAmount' name='txtAmount' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . $budget_true . "'";
            if (mysqli_num_rows($result2) > 0) echo " disabled";
            echo "> บาท <br><br>
            <label class='text-h'>การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ. " . $y . "</label><br>
            จำนวน
            <input type='text' id='txtPaid' name='txtPaid' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . $paid . "' ";
            if (mysqli_num_rows($result2) > 0) echo " disabled";
            echo "> บาท <br><br>";
        }

        echo "<input type='checkbox' name='input_plan' value='Y'";
        if ($input_plan == "Y") echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo " > บรรจุไว้ในข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน <br><br>

        <label class='text-h'>สถานะการดำเนินงานประจำปีงบประมาณ พ.ศ. " . $y . "</label><br>
        <input type='radio' name='status_process' value='2' onclick=\"" . "$('#radio_reason').hide()" . "\" ";
        if ($status_process == 2) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo " > อยู่ระหว่างดำเนินการ <br>
        <input type='radio' name='status_process' value='3' onclick=\"" . "$('#radio_reason').hide()" . "\" ";
        if ($status_process == 3) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo " > ดำเนินการแล้วเสร็จ <br>
        <input type='radio' name='status_process' value='4' onclick=\"" . "$('#radio_reason').show()" . "\" ";
        if ($status_process == 4) echo " checked ";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo " > ไม่สามารถดำเนินการได้ <br><br>

        <div id='radio_reason'";
        if ($status_process != 4)
            echo " style='display: none'";
        echo ">
        <input type='radio' name='cant_process' value='1' onclick=\"" . "$('#txt_cant_reason').hide()" . "\" ";
        if ($radio_reason == 1) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo "> ไม่ได้รับงบประมาณ<br>
        <input type='radio' name='cant_process' value='2' onclick=\"" . "$('#txt_cant_reason').hide()" . "\" ";
        if ($radio_reason == 2) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo "> นโยบายผู้บริหารเปลี่ยนแปลง <br>
        <input type='radio' name='cant_process' value='3' onclick=\"" . "$('#txt_cant_reason').hide()" . "\" ";
        if ($radio_reason == 3) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo "> บุคลากรไม่เพียงพอ <br>
        <input type='radio' name='cant_process' value='4' onclick=\"" . "$('#txt_cant_reason').show()" . "\" ";
        if ($radio_reason == 4) echo " checked";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo "> อื่นๆ </div><br>

        <div id='txt_cant_reason'";
        if ($radio_reason != 4)
            echo " style='display: none'";
        echo ">
        <input id='txtReason' type='text' name='cant_reason' value='" . $txt_reason . "'";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo "></div>";

        echo "<label class='text-h'>หมายเหตุ </label><br>
        <textarea rows='4' cols='70' name='txtRemarkReport' ";
        if (mysqli_num_rows($result2) > 0) echo " disabled";
        echo ">" . $remark_report . "</textarea><br><br>

				<button class='btn btn-info' type='submit' name='btnSubmit'>
					<i class='ace-icon fa fa-floppy-o bigger-120'></i>
					บันทึก
				</button>
				<button class='btn' type='reset' name='btnReset'>
					<i class='ace-icon fa fa-undo bigger-120'></i>
					ล้างข้อมูล
				</button>

        <input type='hidden' name = 'id' value='" . $idproject . "'>
        <input type='hidden' name = 'local_goverment_id' value='" . $local_goverment_id . "'>
        <input type='hidden' name = 'dimention' value='" . $dimention . "'>
        <input type='hidden' name = 'non_budget' value='" . $non_budget . "'>
        <input type='hidden' name = 'r' value='" . $r . "'>
        <input type='hidden' name = 'y' value='" . $y . "'>

        <br><br>";
    //}

?>
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


		</script>
	</body>
</html>
