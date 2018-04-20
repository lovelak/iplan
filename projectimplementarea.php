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
        $("#projectImplement").load("ajax/getProjectImplementArea.php?y=" + selectValue + "&a=" + areaSelected.value);
        
        
//        if (selectValue == "0") {
//            //var provinceSeleted = document.getElementById('selectProvince');
//            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=0&y=" + provinceSeleted.value);
//        } else {
//            $("#projectImplement").load("ajax/getProjectImplementProvince.php?y=" + selectValue + "&p=" + provinceSeleted.value);
//        }
    }
    function changeArea(selectValue2) {
        var yearSelected = document.getElementById('yearProject');
        $("#projectImplement").load("ajax/getProjectImplementArea.php?a=" + selectValue2 + "&y=" + yearSelected.value);
//        if (selectValue2 == "0") {
//            //var yearSelected = document.getElementById('yearProject');
//            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=0&y=" + yearSelected.value);
//        } else { 
//            
//            //window.alert (yearSelected.value);
//            //window.alert ("ajax/getProjectImplementProvince.php?p=" + selectValue2 + "&y=" + yearSelected.value);
//            $("#projectImplement").load("ajax/getProjectImplementProvince.php?p=" + selectValue2 + "&y=" + yearSelected.value);
//        }
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
</select>

<div id='projectImplement'></div>    
    
</body>
</html>