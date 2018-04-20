<?php
	session_start();
    include '../include/ConnectionDb.php';
//include "include/checklogin.php";

date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");
$now_time = date("H:i:s");

$today2 = explode(" ", $today);
$t_year = $today2[0]+543;
$t_month = $today2[1];
$t_day = $today2[2];


if($_SESSION["ss_group"] <= '2')
		{
      $locals =" AND local_goverment_id ='".$_SESSION["ss_local_office_id"]."' ";
    }
	else if(isset($_GET['local1']))
	{
			$locals =" AND local_goverment_id ='".$_GET['local1']."' ";
	}
	else {
		$locals ="";
	}
	//echo "-->".$locals."<=<br>";

	$sql="SELECT * , COUNT( * ) AS a  FROM project WHERE status_use = 'Y'".$locals;
//$i =1;
    $q = $_GET['q'];
    if ($q == "0"){
        $sql="SELECT * , COUNT( * ) AS a  FROM project WHERE status_use = 'Y'".$locals;
    } else if ($q == "2561") {
        $sql="SELECT * , COUNT( * ) AS a  FROM project WHERE status_use = 'Y' AND year1='2561'".$locals;
    } else if ($q == "2562") {
        $sql="SELECT * , COUNT( * ) AS a  FROM project WHERE status_use = 'Y' AND year2='2562'".$locals;
    } else if ($q == "2563") {
        $sql="SELECT * , COUNT( * ) AS a FROM project WHERE status_use = 'Y' AND year3='2563'".$locals;
    } else if ($q == "2564") {
        $sql="SELECT * , COUNT( * ) AS a  FROM project WHERE status_use = 'Y' AND year4='2564'".$locals;
    }

//echo $sql;

    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0)
	{
        //echo "<h1>" . $namesystem . "</h1>";
				$row=mysqli_fetch_assoc($result);
					{

						if ($q == "0"){
				        $sql2="SELECT count(*)  as b FROM report WHERE  project_id = '$row[project_id]' and round_report ='2' and budget_year <= '$t_year'";
				    } else {
				        $sql2="SELECT count(*)  as b  FROM report WHERE project_id = '$row[project_id]' AND budget_year='$q'  and round_report ='2'" ;
				    }
//echo $sql2;
						mysqli_set_charset($conn,"utf8");
				    $result2=mysqli_query($conn, $sql2);
				    $num2=mysqli_num_rows($result2);
				    if (mysqli_num_rows($result2) > 0)
					{
							$row2=mysqli_fetch_assoc($result2);

							$b= $row2[b];
					}


					$a =$row[a];
					$i++;
	}


	$c = $a - $b;
	if($c != 0)
		{
			$d =($b / $a)*100;
		}
	else {
		$d=0;
	}

	$d = number_format($d, 2, '.', '');
}
?>

<div class="col-sm-12 infobox-container">

  <div class="infobox infobox-green">
    <div class="infobox-icon">
      <i class="ace-icon fa fa-database"></i>
    </div>

    <div class="infobox-data">
      <span class="infobox-data-number"><? echo $a; ?></span>
      <div class="infobox-content">จำนวนโครงการทั้งหมด</div>
    </div>
  </div>

  <div class="infobox infobox-blue">
    <div class="infobox-icon">
      <i class="ace-icon fa fa-check-circle"></i>
    </div>

    <div class="infobox-data">
      <span class="infobox-data-number"><? echo $b; ?></span>
      <div class="infobox-content">โครงการที่รายงานแล้ว</div>
    </div>

  </div>

  <div class="infobox infobox-pink">
    <div class="infobox-icon">
      <i class="ace-icon fa fa-hourglass-half "></i>
    </div>

    <div class="infobox-data">
      <span class="infobox-data-number"><? echo $c; ?></span>
      <div class="infobox-content">โครงการที่ยังไม่ได้รายงาน</div>
    </div>
  </div>

  <div class="infobox infobox-red">
    <div class="infobox-icon">
      <i class="ace-icon fa fa-percent"></i>
    </div>

    <div class="infobox-data">
      <span class="infobox-data-number"><? echo $d; ?>%</span>
      <div class="infobox-content">คิดเป็น</div>
    </div>
  </div>

  <div class="space-6"></div>

  <div class="col-md-6 col-md-offset-3">
    <div class="widget-box">
      <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">
          <i class="ace-icon fa fa-signal"></i>
          กราฟแสดงภาพรวมโครงการ
        </h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div id="piechart-placeholder"></div>

        <!--	<div class="hr hr8 hr-double">4444</div>

          <div class="clearfix">
            <div class="grid3">
              <h4 class="smaller pull-right">โครงการทั้งหมด</h4>
              <h4 class="bigger pull-right">10</h4>
            </div>

            <div class="grid3">
              <span class="grey">
                <i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
                &nbsp; โครงการที่รายงานแล้ว
              </span>
              <h4 class="bigger pull-right">941</h4>
            </div>

            <div class="grid3">
              <span class="grey">
                <i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
                &nbsp; โครงการที่ยังไม่ได้รายงาน
              </span>
              <h4 class="bigger pull-right">1,050</h4>
            </div>
          </div>-->
        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->

    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div>

<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/jquery.easypiechart.min.js"></script>
<script src="../assets/js/jquery.sparkline.index.min.js"></script>
<script src="../assets/js/jquery.flot.min.js"></script>
<script src="../assets/js/jquery.flot.pie.min.js"></script>
<script src="../assets/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript">
  jQuery(function($) {



    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
    //but sometimes it brings up errors with normal resize event handlers
    $.resize.throttleWindow = false;

    var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
    var data = [
    { label: "โครงการที่รายงานแล้ว",  data: <?php echo $b;  ?>, color: "#2091CF"},
    { label: "โครงการที่ยังไม่ได้รายงาน",  data: <?php echo $c;  ?>, color: "#AF4E96"}
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
</script>
