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
    function selectYear(year) {
        var x = document.getElementById("yearProject").value;

    }
    </script>
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
								<a href="index.php">หน้าแรก</a>
							</li>

							<li>
								<a href="projectdisplay.php">โครงการ</a>
							</li>
							<li class="active">แสดงข้อมูลโครงการ</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								แสดงข้อมูลโครงการ

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<!-- -----------------------------------------------เนื้อหา ------------------------------------------- -->


<div class="row">
<?php


$sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
$status_pass = $_GET['sp'];
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
    $nameproject= $row['name'];
    $idproject= $row['project_id'];
		$local_goverment_id= $row['local_goverment_id'];
    $year1= $row['year1'];
    $year2= $row['year2'];
    $year3= $row['year3'];
    $year4= $row['year4'];
		$quarter= $row['quarter'];
    $type= $row['type'];
    $dimention= $row['dimention'];
    $budgetyear = $row['budget_year'];
    $non_budget = $row['non_budget'];
    $budget = $row['budget'];
    $targetgroup = $row['target_group'];
    $object = $row['object'];
    $remark = $row['remark_project'];

		$sql_local= "select * from local_office where local_office_id = '$row[local_goverment_id]' ";
		mysqli_set_charset($conn,"utf8");
		$result_local = mysqli_query($conn,$sql_local);
		$row_local = mysqli_fetch_array($result_local);

?>


<form action="projecteditupdate.php" method="post" enctype="multipart/form-data" name="frmProject" onsubmit="return atLeastOneRadio()">

    <!-- <select id="yearSelect" onchange="changeYear()">
      <option value="1" selected>2561 - 2564
      <option value="2">2565 - 2568
      <option value="3">2569 - 2572
    </select><br> -->


		<div class="row">
			<div class="col-sm-12 text-left">
				<label ><b><?php echo $row_local[local_office_name]."<br> อำเภอ".$row_local[local_office_amphures]."<br> จังหวัด".$row_local[local_office_province]; ?></b></label>
			</div>
    </div>
<div class="space-10"></div>
    <?php


        if ($status_pass == 'N'){
            echo "
              			<div class='col-sm-12 row'><h3><span class='red'> โครงการนี้ไม่สอดคล้องกับมิติของการป้องกันการทุจริต ไม่ต้องทำการรายงานผลการดำเนินการ</span></h3></div>";
        }
        echo "<table border='1'>";
        if ($status_pass == 'Y') {
            echo "<th>ดำเนินการปีงบประมาณ</th>
            <th>รายงานรอบ 6 เดือน</th>
            <th>รายงานรอบ 12 เดือน</th>";
            if ($year1 == "2561")
                echo "<tr><td class='center'><label>" . $year1 . "</label></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=1&y=2561'><i class='fa fa-pencil-square-o fa-2x'></i></a></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=2&y=2561'><i class='fa fa-pencil-square-o fa-2x'></a></td></tr>";
            if ($year2 == "2562")
                echo "</tr><td class='center'><label>" . $year2 . "</label></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=1&y=2562'><i class='fa fa-pencil-square-o fa-2x'></a></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=2&y=2562'><i class='fa fa-pencil-square-o fa-2x'></a></td></tr>";
            if ($year3 == "2563")
                echo "<tr><td class='center'><label>" . $year3 . "</label></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=1&y=2563'><i class='fa fa-pencil-square-o fa-2x'></a></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=2&y=2563'><i class='fa fa-pencil-square-o fa-2x'></a></td></tr>";
            if ($year4 == "2564")
                echo "<tr><td class='center'><label>" . $year4 . "</label></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=1&y=2564'><i class='fa fa-pencil-square-o fa-2x'></a></td>
                <td class='center'><a href='projectreport.php?id=" . $idproject . "&r=2&y=2564'><i class='fa fa-pencil-square-o fa-2x'></a></td></tr>";

        } else {
            echo "<th>ดำเนินการปีงบประมาณ</th>";
            if ($year1 == "2561")
                echo "<tr><td><label>" . $year1 . "</label></td>";
            if ($year2 == "2562")
                echo "</tr><td><label>" . $year2 . "</label></td>";
            if ($year3 == "2563")
                echo "<tr><td><label>" . $year3 . "</label></td>";
            if ($year4 == "2564")
                echo "<tr><td><label>" . $year4 . "</label></td>";
        }
        echo "</table><br><br>";
    ?>

    <div class="space-10"></div>
		<div class="row">
       <div class="col-sm-12">
         <label class="text-h">ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน</label>
       </div>
    </div>
    <div class="row">
  <div class="col-sm-12">
        <h3><?php echo $nameproject; ?></h3>
      </div>
    </div>

		<div class="space-10"></div>
		<div class="row">
			<div class="col-sm-4">
				<label class="text-h" >ดำเนินการในไตรมาส</label>
				<select name="quarter" required>
						<option value="">---</option>
						<option value="1" <?php if ($quarter == "1") echo " selected"; ?>>1</option>
						<option value="2" <?php if ($quarter == "2") echo " selected"; ?>>2</option>
						<option value="3" <?php if ($quarter == "3") echo " selected"; ?>>3</option>
						<option value="4" <?php if ($quarter == "4") echo " selected"; ?>>4</option>
				</select><br>
			</div>
		</div>

    <div class="space-10"></div>

  <div class="col-sm-12">
    <div class="row">
       <div class="col-sm-12">
         <label class="text-h">ประเภทงาน</label>
       </div>
    </div>

    <div class="col-sm-8 row">
<?php
    if ($type == 1){
?>
       <div class="radio">
         <label>
           <input name="type" type="radio" class="ace" value="1" checked disabled/>
           <span class="lbl"> โครงการ</span>
         </label>
       </div>
<?php
    }
    else if ($type == 2)
    {
?>
       <div class="radio">
         <label>
           <input name="type" type="radio" class="ace" value="2" checked disabled/>
           <span class="lbl"> กิจกรรม</span>
         </label>
       </div>
<?php
    }
    else if ($type == 3)
    {
?>
       <div class="radio">
         <label>
           <input name="type" type="radio" class="ace" value="3" checked disabled/>
           <span class="lbl"> มาตรการ</span>
         </label>
       </div>
<?php
    }
    else
    {
?>
       <div class="radio">
         <label>
           <input name="type" type="radio" class="ace" value="4" checked disabled/>
           <span class="lbl"> แนวปฏิบัติงาน</span>
         </label>
       </div>
<?php
    }
?>
    </div>

    <div class="space-10"></div>

    <div class="row">
       <div class="col-sm-12">
         <label class="text-h">สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ </label>
       </div>
    </div>
    <div class="row">
  		 <div class="col-md-12">
<?php
    if ($dimention == 1){
?>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="1" checked disabled/>
  					<span class="lbl"> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต</span>
  				</label>
  			</div>
<?php
    }
    else if ($dimention == 2)
    {
?>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="2" checked disabled/>
  					<span class="lbl"> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต</span>
  				</label>
  			</div>
<?php
    }
    else if ($dimention == 3)
    {
?>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="3" checked disabled/>
  					<span class="lbl"> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน</span>
  				</label>
  			</div>
<?php
    }
    else
    {
?>
  			<div class="radio">
  				<label>
  					<input name="dimention" type="radio" class="ace" value="4" checked disabled/>
  					<span class="lbl"> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ</span>
  				</label>
  			</div>
<?php
    }
?>
  		</div>
    </div>
<!-- <div class="space-10"></div> -->

    <!-- <div class="row">
    	<div class="col-sm-6">
    		<label >งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ.</label>
        <select name="sltYear" disabled>
          <option value="2559" <?php //if ($budgetyear == "2559") echo " selected"; ?> >2559</option>
          <option value="2560" <?php //if ($budgetyear == "2560") echo " selected"; ?> >2560</option>
          <option value="2561" <?php //if ($budgetyear == "2561") echo " selected"; ?> >2561</option>
          <option value="2562" <?php //if ($budgetyear == "2562") echo " selected"; ?> >2562</option>
          <option value="2563" <?php //if ($budgetyear == "2563") echo " selected"; ?> >2563</option>
          <option value="2564" <?php //if ($budgetyear == "2564") echo " selected"; ?> >2564</option>
          <option value="2565" <?php //if ($budgetyear == "2565") echo " selected"; ?> >2565</option>
          <option value="2566" <?php //if ($budgetyear == "2566") echo " selected"; ?> >2566</option>
          <option value="2567" <?php //if ($budgetyear == "2567") echo " selected"; ?> >2567</option>
        </select><br>
    	</div>
    </div> -->

    <div class="space-10"></div>

    <div class="row">
    	 <div class="col-sm-6">
    		 <label class="text-h">ประเภทงาน</label>
    	 </div>
    </div>

    <div class="row">
    	 <div class="col-md-8">
<?php
    if ($non_budget == 'N')
      {
?>
    			<div class="radio">
    				<label>
    					<input type="radio" name="budget" value="N" class="ace" checked disabled>
    					<span class="lbl"> ดำเนินการโดยไม่ใช้งบประมาณ</span>
    				</label>
    			</div>
<?php
        } else {
?>
    			<div class="radio">
    				<label>
    					<input type="radio" name="budget" value="Y" class="ace" checked disabled>
    					<span class="lbl"> ดำเนินการโดยใช้งบประมาณ จำนวน <input type="text" id='txtBudgets' name="txtBudget" cols="30"  value='<?php echo $budget; ?>' disabled> บาท</span>
    				</label>
    			</div>
<?php
        }
 ?>
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
							<input name="target_groupa" id='target_groupa' value="a" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group1'] == 1 || $row['target_group2'] == 2 || $row['target_group3'] == 3) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y1a'>บุคลากรขององค์กรปกครองส่วนท้องถิ่น</label></span>
						</label>
					</div>
					<ul>
					<div class="checkbox">
						<label>
							<input name="target_group1" id='target_group1' value="1" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group1'] == 1) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y1a'>ข้าราชการการเมืองฝ่ายบริหาร</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group2" id='target_group2' value="2" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group2'] == 2) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y1a'>ข้าราชการการเมืองฝ่ายสภาท้องถิ่น</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group3" id='target_group3' value="3" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group3'] == 3) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y1a'>ข้าราชการส่วนท้องถิ่น/ลูกจ้าง/พนักงานจ้าง</label></span>
						</label>
					</div>
				</ul>
					<div class="checkbox">
						<label>
							<input name="target_group4" id='target_group4' value="4" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group4'] == 4) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y2a'>เด็กและเยาวชน</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group5" id='target_group5' value="5" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group5'] == 5) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y3a'>ประชาชน/ภาคประชาสังคม</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group6" id='target_group6' value="6" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group6'] == 6) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y4a'>สถานศึกษา</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group7" id='target_group7' value="7" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group7'] == 7) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y4a'>หน่วยงานภาครัฐ</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group8" id='target_group8' value="8" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group8'] == 8) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y4a'>หน่วยงานภาครัฐวิสาหกิจ</label></span>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="target_group9" id='target_group9' value="9" class="ace ace-checkbox-2" type="checkbox" <?php if ($row['target_group9'] == 9) echo " checked"; ?> disabled/>
							<span class="lbl"><label id='y4a'>หน่วยงานภาคธุรกิจเอกชน</label></span>
						</label>
					</div>
				</div>

			</div>


<!--      <div class="row">
    	<div class="col-sm-6">
    		<input type="text" name="txtTarget" size="65" required placeholder="กรุณากรอก" oninvalid="this.setCustomValidity('กรุณากรอกกลุ่มเป้าหมาย')"  oninput="setCustomValidity('')" value="<?php echo $targetgroup; ?>" disabled >
    	</div>
    </div>-->

    <div class="space-10"></div>

    <div class="row">
    	 <div class="col-sm-6">
    		 <label class="text-h">วัตถุประสงค์</label>
    	 </div>
    </div>
    <div class="row">
    	<div class="col-sm-6">
    		<textarea rows="4" cols="70" name="txtObject" required placeholder="กรุณากรอก" oninvalid="this.setCustomValidity('กรุณากรอกวัตถุประสงค์')"  oninput="setCustomValidity('')" disabled ><?php echo $object; ?></textarea>
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
    		<textarea rows="4" cols="70" name="txtRemark" disabled><?php echo $remark; ?></textarea>
    	</div>
    </div>
    <input type="hidden" name = "idproject" value="<?php echo $idproject; ?>">
      <div class="space-10"></div>



    <br /><br>
    <!-- <input type="submit" name="btnSubmit"> -->
    <br><br>
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


		</script>
	</body>
</html>
