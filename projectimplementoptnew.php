<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>e-PlanNACC</title>
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
</head>
<body class="no-skin" onload="changeYear(0); changeProvince(0);">
<script type="text/javascript">
    function changeYear(selectValue) {
        var provinceSelected = document.getElementById('selectProvince');
        var roundSelected = document.getElementById('selectRound');
        $("#projectImplement").load("ajax/getProjectImplementOPTNew.php?y=" + selectValue + "&p=" + provinceSelected.value + "&r=" + roundSelected.value);
    }
    function changeProvince(selectValue2) {
        var yearSelected = document.getElementById('yearProject');
        var roundSelected = document.getElementById('selectRound');
        $("#projectImplement").load("ajax/getProjectImplementOPTNew.php?p=" + selectValue2 + "&y=" + yearSelected.value + "&r=" + roundSelected.value);
    }
    function changeRound(selectValue3) {
        var provinceSelected = document.getElementById('selectProvince');
        var yearSelected = document.getElementById('yearProject');
        $("#projectImplement").load("ajax/getProjectImplementOPTNew.php?r=" + selectValue3 + "&p=" + provinceSelected.value + "&y=" + yearSelected.value);
    }
</script>
<select name="yearProject" id="yearProject" onchange="changeYear(this.value)" required>
    <option value="0" selected>กรุณาเลือกปีที่นำแผนไปสู่การปฏิบัติ
    <option value="2561">2561
    <option value="2562">2562
    <option value="2563">2563
    <option value="2564">2564
</select><br><br>

<select name = "province" id="selectProvince" onchange="changeProvince(this.value)" required>
    <option value="0" selected>กรุณาเลือกจังหวัดที่ต้องการ</option>
    <?php
    require 'include/ConnectionDb.php';
    $sql="select * from provinces";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
        echo "<option value=" . $row['PROVINCE_ID'] . ">" . $row['PROVINCE_NAME'] . "</option>";
    }
    ?>
</select><br><br>

<select name ="round" id="selectRound" onchange="changeRound(this.value)" required>
    <option value="1" selected>รอบ 6 เดือน</option>
    <option value="2">รอบ 12 เดือน</option>
</select>

<div id='projectImplement'></div>    
    
</body>
</html>