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
        var areaSelected = document.getElementById('selectArea');
        var roundSelected = document.getElementById('selectRound');
        $("#projectImplement").load("ajax/getProjectImplementAreaNew.php?y=" + selectValue + "&a=" + areaSelected.value + "&r=" + roundSelected.value);
    }
    function changeArea(selectValue2) {
        var yearSelected = document.getElementById('yearProject');
        var roundSelected = document.getElementById('selectRound');
        $("#projectImplement").load("ajax/getProjectImplementAreaNew.php?a=" + selectValue2 + "&y=" + yearSelected.value + "&r=" + roundSelected.value);
    }
    function changeRound(selectValue3) {
        var areaSelected = document.getElementById('selectArea');
        var yearSelected = document.getElementById('yearProject');
        $("#projectImplement").load("ajax/getProjectImplementAreaNew.php?r=" + selectValue3 + "&y=" + yearSelected.value + "&a=" + areaSelected.value);
    }
</script>
<select name="yearProject" id="yearProject" onchange="changeYear(this.value)" required>
    <option value="0" selected>กรุณาเลือกปีที่นำแผนไปสู่การปฏิบัติ
    <option value="2561">2561
    <option value="2562">2562
    <option value="2563">2563
    <option value="2564">2564
</select><br><br>

<select name = "area" id="selectArea" onchange="changeArea(this.value)" required>
    <option value="0" selected>กรุณาเลือกภาคที่ต้องการ</option>
    <option value="1">ภาค 1</option>
    <option value="2">ภาค 2</option>
    <option value="3">ภาค 3</option>
    <option value="4">ภาค 4</option>
    <option value="5">ภาค 5</option>
    <option value="6">ภาค 6</option>
    <option value="7">ภาค 7</option>
    <option value="8">ภาค 8</option>
    <option value="9">ภาค 9</option>
</select><br><br>

<select name="round" id="selectRound" onchange="changeRound(this.value)" required>
    <option value="1" selected>6 เดือน</option>
    <option value="2">12 เดือน</option>
</select>

<div id='projectImplement'></div>    
    
</body>
</html>