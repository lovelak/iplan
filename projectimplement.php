<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>e-PlanNACC</title>
    <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
</head>
<body class="no-skin" onload="changeYear('0')">
<script type="text/javascript">
    function changeYear(selectValue) {
        if (selectValue == "") {
            $("#projectImplement").load("ajax/getProjectImplement.php?y='0'");
        } else {
            $("#projectImplement").load("ajax/getProjectImplement.php?y=" + selectValue);
        }
    }
</script>
<select name="yearProject" id="yearProject" onchange="changeYear(this.value)" required>
    <option value="0" selected>กรุณาเลือกปีที่นำแผนไปสู่การปฏิบัติ
    <option value="2561">2561
    <option value="2562">2562
    <option value="2563">2563
    <option value="2564">2564
</select><br><br>
<div id='projectImplement'></div>    
    
</body>
</html>