<?php
    include "../include/ConnectionDb.php";
    $year = $_GET['y'];
    if ($year == 0){
        //$sql = "SELECT `status_process`, COUNT(`status_process`) AS quantity FROM (SELECT project_id, MAX(round_report) AS round_report, status_process, status_process_year FROM report WHERE status_pass='Y' GROUP BY project_id,status_process_year) AS T GROUP BY `status_process`";
        $sql = "SELECT status_process, COUNT(status_process) AS quantity FROM (SELECT tbA.project_id,tbA.round_report,tbA.budget_true,tbA.status_process,tbA.status_process_year FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_pass != 'N') tbCount GROUP BY status_process";
        $sql2 = "SELECT * FROM project WHERE status_use != 'N' AND status_pass != 'N'";
    } else {
        //$sql = "SELECT `status_process`, COUNT(`status_process`) AS quantity FROM (SELECT project_id, MAX(round_report) AS round_report, status_process, status_process_year FROM report WHERE status_pass='Y' AND status_process_year='$year' GROUP BY project_id,status_process_year) AS T GROUP BY `status_process`";
        $sql = "SELECT status_process, COUNT(status_process) AS quantity FROM (SELECT tbA.project_id,tbA.round_report,tbA.budget_true,tbA.status_process,tbA.status_process_year FROM report tbA , (SELECT tbB1.project_id AS project_id, MAX(tbB1.round_report) AS round_report FROM report tbB1 GROUP BY project_id ) tbB2 WHERE tbA.project_id = tbB2.project_id AND tbA.round_report = tbB2.round_report AND tbA.status_process_year = $year";
        $sql .=" AND tbA.status_pass != 'N') tbCount GROUP BY status_process";
        $sql2 = "SELECT * FROM project WHERE status_use != 'N' AND status_pass != 'N' AND (year1='$year' OR year2='$year' OR year3='$year' OR year4='$year')";
    }
    echo $year;
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    $result2=mysqli_query($conn, $sql2);
    $num=mysqli_num_rows($result);
    $num2=mysqli_num_rows($result2);
    $score = 0;
    $success = 0;
    $process = 0;
    $cannot = 0;
    if (mysqli_num_rows($result) > 0){
        echo "<br>";

        while ($row=mysqli_fetch_assoc($result)) {
            if ($row['status_process'] == 3) {
                $success = $row['quantity'];
                $score += $row['quantity']*1;
            } else if ($row['status_process'] == 2){
                $process = $row['quantity'];
                $score += $row['quantity']*0.5;
            } else if ($row['status_process'] == 4){
                $cannot = $row['quantity'];
                $score += $row['quantity']*0;
            }
        }

        echo "จำนวนโครงการทั้งหมด " . $num2 . "<br>
        จำนวนโครงการที่ดำเนินการแล้วเสร็จ " . $success . " โครงการ :: (" . $success . "*1)=" . $success*1 . "<br>
        จำนวนโครงการที่อยู่ระหว่างดำเนินการ " . $process . " โครงการ :: (" . $process . "*0.5)=" . $process*0.5 . "<br>
        จำนวนโครงการที่ไม่สามารถดำเนินการได้ " . $cannot . " โครงการ :: (" . $process . "*0)=" . $cannot*0 . "<br>
        คะแนนที่ได้ :: " . $success*1 . "+" . $process*0.5 . " = " . $score .
        "<br>คิดเป็น " . number_format((float)$score/$num2*100, 2, '.', '') . "%";
    } else {
        echo "จำนวนโครงการทั้งหมด " . $num2 . "<br>
        จำนวนโครงการที่ดำเนินการแล้วเสร็จ " . $success . " โครงการ :: (" . $success . "*1)=" . $success*1 . "<br>
        จำนวนโครงการที่อยู่ระหว่างดำเนินการ " . $process . " โครงการ :: (" . $process . "*0.5)=" . $process*0.5 . "<br>
        จำนวนโครงการที่ไม่สามารถดำเนินการได้ " . $cannot . " โครงการ :: (" . $process . "*0)=" . $cannot*0 . "<br>
        คะแนนที่ได้ :: " . $success*1 . "+" . $process*0.5 . " = " . $score .
        "<br>คิดเป็น " . number_format((float)$score/$num2*100, 2, '.', '') . "%";
    }
    mysqli_close($conn);
//    $dataPoints = array(
//	array("label"=>"อยู่ระหว่างดำเนินการ", "y"=>$process ),
//	array("label"=>"ดำเนินการแล้วเสร็จ", "y"=>$success),
//  array("label"=>"ไม่สามารถดำเนินการได้", "y"=>$cannot ),
//	array("label"=>"รอการรายงานผล", "y"=>$num2-$process-$success-$cannot));

    $wait = $num2-$process-$success-$cannot;
    $per_process=($process/$num2*100);
    $per_success=($success/$num2*100);
    $per_cannot=($cannot/$num2*100);
    $per_wait=(($num2-$process-$success-$cannot)/$num2*100);

    $dataPoints2 = array(
	array("label"=>"อยู่ระหว่างดำเนินการ $process โครงการ", "y"=>$per_process),
	array("label"=>"ดำเนินการแล้วเสร็จ $success โครงการ", "y"=>$per_success),
    array("label"=>"ไม่สามารถดำเนินการได้ $cannot โครงการ", "y"=>$per_cannot),
	array("label"=>"รอการรายงานผล $wait โครงการ ", "y"=>$per_wait));

?>
<!--
<script src="assets/js/canvasjs.min.js"></script>
<script type="text/javascript">
//alert('33333');
        var chart = new CanvasJS.Chart("projectScore2", {
            animationEnabled: true,
            title: {
              text: "ผลการนำแผนไปปฏิบัติ"
            },
            subtitles: [{
              text: "โครงการทั้งหมดจำนวน " + <?php //echo $num2; ?> + " โครงการ"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                //yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php //echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
</script>-->


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
    { label: "อยู่ระหว่างดำเนินการ",  data: <?php echo $process;  ?>, color: "#2091CF"},
    { label: "ดำเนินการแล้วเสร็จ",  data: <?php echo $success;  ?>, color: "#AF4E96"},
    { label: "ไม่สามารถดำเนินการได้",  data: <?php echo $cannot;  ?>, color: "#010D05"},
    { label: "รอการรายงานผล",  data: <?php echo $wait;  ?>, color: "#0D0502"}
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
