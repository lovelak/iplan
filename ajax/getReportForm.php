<?php
include "../include/ConnectionDb.php";
$r = $_GET['r'];
$id = $_GET['id'];
$y = $_GET['y'];
if ($r == "1"){ //รอบ 6 เดือน
    // เช็ครอบ 6 เดือนว่าเคยบันทึกหรือยัง
    $sql="SELECT * FROM report WHERE project_id='" . $id . "' AND round_report='" . $r . "' AND status_process_year='" . $y . "'";
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    // ถ้าหาเจอ





















    if (mysqli_num_rows($result) > 0){
        echo "มีการบันทึกแล้วรายงาานผลการดำเนินงานรอบ 6 เดือนของปีงบประมาณ " . $y . " แล้ว  <br><br><br>";
        while ($row=mysqli_fetch_assoc($result)){
            $budget_true= $row['budget_true'];
            $paid= $row['paid'];
            $input_plan= $row['input_plan'];
            $status_process = $row['status_process'];
            $remark_report = $row['remark_report'];
        }

        $sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
        mysqli_set_charset($conn,"utf8");
        $result=mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            $nameproject= $row['name'];
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
            echo "<br>";
            if ($year1 != "")
                echo "<input type='checkbox' name ='year1' value='2561' checked disabled><label>2561</label><br>";
            if ($year2 != "")
                echo "<input type='checkbox' name ='year2' value='2562' checked disabled><label>2562</label><br>";
            if ($year3 != "")
                echo "<input type='checkbox' name ='year3' value='2563' checked disabled><label>2563</label><br>";
            if ($year4 != "")
                echo "<input type='checkbox' name ='year4' value='2564' checked disabled><label>2564</label><br>";

            echo "<br>ประเภทงาน <br>";
            if ($type == "1")
                echo "<input type='radio' name='type' value='1' checked disabled> โครงการ<br>";
            if ($type == "2")
                echo "<input type='radio' name='type' value='2' checked disabled> กิจกรรม<br>";
            if ($type == "3")
                echo "<input type='radio' name='type' value='3' checked disabled> มาตรการ<br>";
            if ($type == "4")
                echo "<input type='radio' name='type' value='4' checked disabled> แนวปฏิบัติ<br>";

            echo "<br>สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ <br>";
            if ($dimention == "1")
                echo "<input type='radio' name='dimention' value='1' checked disabled> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต<br>";
            if ($dimention == "2")
                echo "<input type='radio' name='dimention' value='2' checked disabled> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต<br>";
            if ($dimention == "3")
                echo "<input type='radio' name='dimention' value='3' checked disabled> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน<br>";
            if ($dimention == "4")
                echo "<input type='radio' name='dimention' value='4' checked disabled> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ<br>";

            echo "<br>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน<h2>";
            echo $nameproject . "</h2>";

            if ($non_budget == "N"){
                echo "งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                <input type='radio' name='budget' value='N' onclick='disBudgetBox()' required checked disabled> ดำเนินการโดยไม่ใช้งบประมาณ <br><br>
                <input type='hidden' name = 'txtBudget' value='0'>
                <input type='hidden' name = 'txtAmount' value='0'>
                <input type='hidden' name = 'txtPaid' value='0'>
                <input type='hidden' name = 'use_budget' value='N'>";

            } else {
                echo "<input type='hidden' name = 'txtBudget' value='$budget'>
                งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                <input type='radio' name='budget' value='Y' onclick='enaBudgetBox()' required checked  disabled> ดำเนินการโดยใช้งบประมาณ จำนวน " . number_format($budget) . " บาท<br><br>

                งบประมาณ (วงเงินตามข้อบัญญัติ/เทศบัญญัติ) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                จำนวน <input type='text' id='txtAmount' name='txtAmount' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . ($budget_true) . "' > บาท <br><br>
                การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                จำนวน <input type='text' id='txtPaid' name='txtPaid' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . ($paid) . "' > บาท <br><br>";
            }
            echo "<input type='checkbox' name='input_plan' value='Y'";
            if ($input_plan == "Y") echo " checked";
            echo " > บรรจุไว้ในข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน <br><br>

            สถานะการดำเนินงานประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='status_process' value='2' ";
            if ($status_process == 2) echo " checked";
            echo " onclick=\"" . "$('#radio_reason').hide()" . "\" > อยู่ระหว่างดำเนินการ <br>
            <input type='radio' name='status_process' value='3' ";
            if ($status_process == 3) echo " checked";
            echo " onclick=\"" . "$('#radio_reason').hide()" . "\" > ดำเนินการแล้วเสร็จ <br>
            <input type='radio' name='status_process' value='4' ";
            if ($status_process == 4) {
                echo " checked";
                echo " onclick=\"" . "$('#radio_reason').show()" . "\" > ไม่สามารถดำเนินการได้ <br><br>
                <div id='radio_reason'>
                <input type='radio' name='cant_process' value='1' required onclick='$('#txt_cant_reason').hide()'> ไม่ได้รับงบประมาณ<br>
                <input type='radio' name='cant_process' value='2' onclick='$('#txt_cant_reason').hide()'> นโยบายผู้บริหารเปลี่ยนแปลง <br>
                <input type='radio' name='cant_process' value='3' onclick='$('#txt_cant_reason').hide()'> บุคลากรไม่เพียงพอ <br>
                <input type='radio' name='cant_process' value='4' onclick='$('#txt_cant_reason').show()'> อื่นๆ </div> <br>
                <div id='txt_cant_reason'>
                <input type='text' name='cant_reason' required></div>";
            }
            echo "หมายเหตุ <br>
            <textarea rows='4' cols='70' name='txtRemarkReport'>" . $remark_report . "</textarea><br><br><br>
            <input type='hidden' name='id' value='" . $idproject . "'>
            <input type='hidden' name='dimention' value='" . $dimention . "'>
            <input type='hidden' name='non_budget' value='" . $non_budget . "'>
            <input type='hidden' name='r' value='" . $r . "'>
            <input type='hidden' name='y' value='" . $y . "'>
            <input type='hidden' name='input_state' value='update'>
            <input type='submit' name='btnSubmit' value='บันทึก' src='images/icon/save.png'>
            <input type='reset' name='btnReset'' value='ล้างข้อมูล' src='images/icon/save.png'>
            <br><br>";

        }





















    } else { // หาไม่เจอแสดงว่าไม่เคยมีการบันทึก
        echo "ยังไม่เคยบันทึกรายงานในรอบ 6 เดือนของปีงบประมาณ " . $y . "<br><br><br>";
        $sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
        mysqli_set_charset($conn,"utf8");
        $result=mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            $nameproject= $row['name'];
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
        echo "<br>";
        if ($year1 != "")
            echo "<input type='checkbox' name ='year1' value='2561' checked disabled><label>2561</label><br>";
        if ($year2 != "")
            echo "<input type='checkbox' name ='year2' value='2562' checked disabled><label>2562</label><br>";
        if ($year3 != "")
            echo "<input type='checkbox' name ='year3' value='2563' checked disabled><label>2563</label><br>";
        if ($year4 != "")
            echo "<input type='checkbox' name ='year4' value='2564' checked disabled><label>2564</label><br>";

        echo "<br>ประเภทงาน <br>";
        if ($type == "1")
            echo "<input type='radio' name='type' value='1' checked disabled> โครงการ<br>";
        if ($type == "2")
            echo "<input type='radio' name='type' value='2' checked disabled> กิจกรรม<br>";
        if ($type == "3")
            echo "<input type='radio' name='type' value='3' checked disabled> มาตรการ<br>";
        if ($type == "4")
            echo "<input type='radio' name='type' value='4' checked disabled> แนวปฏิบัติ<br>";

        echo "<br>สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ <br>";
        if ($dimention == "1")
            echo "<input type='radio' name='dimention' value='1' checked disabled> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต<br>";
        if ($dimention == "2")
            echo "<input type='radio' name='dimention' value='2' checked disabled> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต<br>";
        if ($dimention == "3")
            echo "<input type='radio' name='dimention' value='3' checked disabled> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน<br>";
        if ($dimention == "4")
            echo "<input type='radio' name='dimention' value='4' checked disabled> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ<br>";

        echo "<br>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน<h2>" . $nameproject . "</h2>";

        if ($non_budget == "N"){
            echo "งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='budget' value='N' onclick='disBudgetBox()' required checked disabled> ดำเนินการโดยไม่ใช้งบประมาณ <br><br>
            <input type='hidden' name = 'txtBudget' value='0'>
            <input type='hidden' name = 'txtAmount' value='0'>
            <input type='hidden' name = 'txtPaid' value='0'>
            <input type='hidden' name = 'use_budget' value='N'>";
        } else {
            echo "<input type='hidden' name = 'txtBudget' value='$budget'>
            งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='budget' value='Y' onclick='enaBudgetBox()' required checked  disabled> ดำเนินการโดยใช้งบประมาณ จำนวน " . number_format($budget) . " บาท<br><br>

            งบประมาณ (วงเงินตามข้อบัญญัติ/เทศบัญญัติ) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            จำนวน
            <input type='text' id='txtAmount' name='txtAmount' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')'> บาท <br><br>
            การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            จำนวน
            <input type='text' id='txtPaid' name='txtPaid' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')'> บาท <br><br>";
        }
        echo "<input type='checkbox' name='input_plan' value='Y'> บรรจุไว้ในข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน <br><br>
        สถานะการดำเนินงานประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
        <input type='radio' name='status_process' value='2' required onclick=\"" . "$('#radio_reason').hide()" . "\" > อยู่ระหว่างดำเนินการ <br>
        <input type='radio' name='status_process' value='3' onclick=\"" . "$('#radio_reason').hide()" . "\" > ดำเนินการแล้วเสร็จ <br>
        <input type='radio' name='status_process' value='4' onclick=\"" . "$('#radio_reason').show()" . "\" > ไม่สามารถดำเนินการได้ <br><br>

        <div id='radio_reason'>
        <input type='radio' name='cant_process' value='1' required onclick='$('#txt_cant_reason').hide()'> ไม่ได้รับงบประมาณ<br>
        <input type='radio' name='cant_process' value='2' onclick='$('#txt_cant_reason').hide()'> นโยบายผู้บริหารเปลี่ยนแปลง <br>
        <input type='radio' name='cant_process' value='3' onclick='$('#txt_cant_reason').hide()'> บุคลากรไม่เพียงพอ <br>
        <input type='radio' name='cant_process' value='4' onclick='$('#txt_cant_reason').show()'> อื่นๆ </div> <br>
        <div id='txt_cant_reason'>
        <input type='text' name='cant_reason' required></div>

        <br>
        หมายเหตุ <br>
        <textarea rows='4' cols='70' name='txtRemarkReport'></textarea><br><br><br>
        <input type='hidden' name='id' value='" . $idproject . "'>
        <input type='hidden' name='dimention' value='" . $dimention . "'>
        <input type='hidden' name='non_budget' value='" . $non_budget . "'>
		<input type='hidden' name='r' value='" . $r . "'>
		<input type='hidden' name='y' value='" . $y . "'>
        <input type='hidden' name='input_state' value='insert'>
        <input type='submit' name='btnSubmit' value='บันทึก' src='images/icon/save.png'>
        <input type='reset' name='btnReset'' value='ล้างข้อมูล' src='images/icon/save.png'>
        <br><br>";
    }
























} else { // รอบ 12 เดือน
    // เช็ครอบ 12 เดือนว่าเคยบันทึกหรือยัง
    $sql="SELECT * FROM report WHERE project_id='" . $id . "' AND round_report='" . $r . "' AND status_process_year='" . $y . "'";
    mysqli_set_charset($conn,"utf8");
    $result=mysqli_query($conn, $sql);
    // ถ้าหาเจอ
    if (mysqli_num_rows($result) > 0){
        echo "มีการบันทึกแล้วรายงาานผลการดำเนินงานรอบ 12 เดือนของปีงบประมาณ " . $y . " แล้ว  <br><br><br>";
        while ($row=mysqli_fetch_assoc($result)){
            $budget_true= $row['budget_true'];
            $paid= $row['paid'];
            $input_plan= $row['input_plan'];
            $status_process = $row['status_process'];
            $remark_report = $row['remark_report'];
        }
        $sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
        mysqli_set_charset($conn,"utf8");
        $result=mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            $nameproject= $row['name'];
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
            echo "<br>";
            if ($year1 != "")
                echo "<input type='checkbox' name ='year1' value='2561' checked disabled><label>2561</label><br>";
            if ($year2 != "")
                echo "<input type='checkbox' name ='year2' value='2562' checked disabled><label>2562</label><br>";
            if ($year3 != "")
                echo "<input type='checkbox' name ='year3' value='2563' checked disabled><label>2563</label><br>";
            if ($year4 != "")
                echo "<input type='checkbox' name ='year4' value='2564' checked disabled><label>2564</label><br>";

            echo "<br>ประเภทงาน <br>";
            if ($type == "1")
            echo "<input type='radio' name='type' value='1' checked disabled> โครงการ<br>";
            if ($type == "2")
                echo "<input type='radio' name='type' value='2' checked disabled> กิจกรรม<br>";
            if ($type == "3")
                echo "<input type='radio' name='type' value='3' checked disabled> มาตรการ<br>";
            if ($type == "4")
                echo "<input type='radio' name='type' value='4' checked disabled> แนวปฏิบัติ<br>";

            echo "<br>สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ <br>";
            if ($dimention == "1")
                echo "<input type='radio' name='dimention' value='1' checked disabled> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต<br>";
            if ($dimention == "2")
                echo "<input type='radio' name='dimention' value='2' checked disabled> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต<br>";
            if ($dimention == "3")
                echo "<input type='radio' name='dimention' value='3' checked disabled> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน<br>";
            if ($dimention == "4")
                echo "<input type='radio' name='dimention' value='4' checked disabled> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ<br>";

            echo "<br>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน<h2>";
            echo $nameproject . "</h2>";

            if ($non_budget == "N"){
                echo "งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                <input type='radio' name='budget' value='N' onclick='disBudgetBox()' required checked disabled> ดำเนินการโดยไม่ใช้งบประมาณ <br><br>
                <input type='hidden' name = 'txtBudget' value='0'>
                <input type='hidden' name = 'txtAmount' value='0'>
                <input type='hidden' name = 'txtPaid' value='0'>
                <input type='hidden' name = 'use_budget' value='N'>";
            } else {
                echo "<input type='hidden' name = 'txtBudget' value='$budget'>
                งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                <input type='radio' name='budget' value='Y' onclick='enaBudgetBox()' required checked  disabled> ดำเนินการโดยใช้งบประมาณ จำนวน " . number_format($budget) . " บาท<br><br>

                งบประมาณ (วงเงินตามข้อบัญญัติ/เทศบัญญัติ) ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                จำนวน
                <input type='text' id='txtAmount' name='txtAmount' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . $budget_true . "' > บาท <br><br>
                การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ. <label>" . $y . "</label><br>
                จำนวน
                <input type='text' id='txtPaid' name='txtPaid' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')' value='" . $paid . "' > บาท <br><br>";
            }
            echo "<input type='checkbox' name='input_plan' value='Y'";
            if ($input_plan == "Y") echo " checked";
            echo " > บรรจุไว้ในข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน <br><br>

            สถานะการดำเนินงานประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='status_process' value='2'";
            if ($status_process == 2) echo " checked";
            echo " > อยู่ระหว่างดำเนินการ <br>
            <input type='radio' name='status_process' value='3'";
            if ($status_process == 3) echo " checked";
            echo " > ดำเนินการแล้วเสร็จ <br>
            <input type='radio' name='status_process' value='4'";
            if ($status_process == 4) echo " checked";
            echo " > ไม่สามารถดำเนินการได้ <br><br>
            หมายเหตุ <br>
            <textarea rows='4' cols='70' name='txtRemarkReport'>" . $remark_report . "</textarea><br><br><br>
            <input type='hidden' name='id' value='" . $idproject . "'>
            <input type='hidden' name='dimention' value='" . $dimention . "'>
            <input type='hidden' name='non_budget' value='" . $non_budget . "'>
            <input type='hidden' name='r' value='" . $r . "'>
            <input type='hidden' name='y' value='" . $y . "'>
            <input type='hidden' name='input_state' value='update'>
            <input type='submit' name='btnSubmit' value='บันทึก' src='images/icon/save.png'>
            <input type='reset' name='btnReset'' value='ล้างข้อมูล' src='images/icon/save.png'>
            <br><br>";

        }
    } else { // หาไม่เจอแสดงว่าไม่เคยมีการบันทึก
        echo "ยังไม่เคยบันทึกรายงานในรอบ 12 เดือนของปีงบประมาณ " . $y . "<br><br><br>";
        $sql = "SELECT * FROM project WHERE project_id ='$_GET[id]'";
        mysqli_set_charset($conn,"utf8");
        $result=mysqli_query($conn, $sql);
        while ($row=mysqli_fetch_assoc($result)){
            $nameproject= $row['name'];
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
        echo "<br>";
        if ($year1 != "")
            echo "<input type='checkbox' name ='year1' value='2561' checked disabled><label>2561</label><br>";
        if ($year2 != "")
            echo "<input type='checkbox' name ='year2' value='2562' checked disabled><label>2562</label><br>";
        if ($year3 != "")
            echo "<input type='checkbox' name ='year3' value='2563' checked disabled><label>2563</label><br>";
        if ($year4 != "")
            echo "<input type='checkbox' name ='year4' value='2564' checked disabled><label>2564</label><br>";

        echo "<br>ประเภทงาน <br>";
        if ($type == "1")
        echo "<input type='radio' name='type' value='1' checked disabled> โครงการ<br>";
        if ($type == "2")
            echo "<input type='radio' name='type' value='2' checked disabled> กิจกรรม<br>";
        if ($type == "3")
            echo "<input type='radio' name='type' value='3' checked disabled> มาตรการ<br>";
        if ($type == "4")
            echo "<input type='radio' name='type' value='4' checked disabled> แนวปฏิบัติ<br>";

        echo "<br>สาระสำคัญของโครงการ/กิจกรรม/มาตรการสอดคล้องกับกรอบแนวทาง ดังนี้ <br>";
        if ($dimention == "1")
            echo "<input type='radio' name='dimention' value='1' checked disabled> มิติที่ 1 การสร้างสังคมที่ไม่ทนต่อการทุจริต<br>";
        if ($dimention == "2")
            echo "<input type='radio' name='dimention' value='2' checked disabled> มิติที่ 2 การบริหารราชการเพื่อป้องกันการทุจริต<br>";
        if ($dimention == "3")
            echo "<input type='radio' name='dimention' value='3' checked disabled> มิติที่ 3 การส่งเสริมบทบาทและการมีส่วนร่วมของภาคประชาชน<br>";
        if ($dimention == "4")
            echo "<input type='radio' name='dimention' value='4' checked disabled> มิติที่ 4 การเสริมสร้างและปรับปรุงกลไกในการตรวจสอบการปฏิบัติราชการ<br>";

        echo "<br>ชื่อโครงการ/กิจกรรม/มาตรการ/แนวปฏิบัติงาน<h2>" . $nameproject . "</h2>";

        if ($non_budget == "N"){
            echo "งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='budget' value='N' onclick='disBudgetBox()' required checked disabled> ดำเนินการโดยไม่ใช้งบประมาณ <br><br>
            <input type='hidden' name='txtBudget' value='0'>
            <input type='hidden' name='txtAmount' value='0'>
            <input type='hidden' name='txtPaid' value='0'>
            <input type='hidden' name='use_budget' value='N'>";
        } else {
            echo "<input type='hidden' name='txtBudget' value='$budget'>
            งบประมาณ (วงเงินตามแผนพัฒนาท้องถิ่น) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            <input type='radio' name='budget' value='Y' onclick='enaBudgetBox()' required checked  disabled> ดำเนินการโดยใช้งบประมาณ จำนวน " . number_format($budget) . " บาท<br><br>

            งบประมาณ (วงเงินตามข้อบัญญัติ/เทศบัญญัติ) ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            จำนวน
            <input type='text' id='txtAmount' name='txtAmount' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')'> บาท <br><br>
            การเบิกจ่ายงบประมาณ ประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
            จำนวน
            <input type='text' id='txtPaid' name='txtPaid' cols='30' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required oninvalid='this.setCustomValidity('กรุณากรอกจำนวนเงินงบประมาณ')'  oninput='setCustomValidity('')'> บาท <br><br>";
        }
        echo "<input type='checkbox' name='input_plan' value='Y'> บรรจุไว้ในข้อบัญญัติ/เทศบัญญัติ/แผนการดำเนินงาน <br><br>
        สถานะการดำเนินงานประจำปีงบประมาณ พ.ศ. <label>" . $year1 . "</label><br>
        <input type='radio' name='status_process' value='2' required> อยู่ระหว่างดำเนินการ <br>
        <input type='radio' name='status_process' value='3' > ดำเนินการแล้วเสร็จ <br>
        <input type='radio' name='status_process' value='4' > ไม่สามารถดำเนินการได้ <br><br>
        หมายเหตุ <br>
        <textarea rows='4' cols='70' name='txtRemarkReport'></textarea><br><br><br>
        <input type='hidden' name='id' value='" . $idproject . "'>
        <input type='hidden' name='dimention' value='" . $dimention . "'>
        <input type='hidden' name='non_budget' value='" . $non_budget . "'>
		<input type='hidden' name='r' value='" . $r . "'>
		<input type='hidden' name='y' value='" . $y . "'>
        <input type='hidden' name='input_state' value='insert'>
        <input type='submit' name='btnSubmit' value='บันทึก' src='images/icon/save.png'>
        <input type='reset' name='btnReset'' value='ล้างข้อมูล' src='images/icon/save.png'>
        <br><br>";
    }
}
?>
