<meta charset="utf-8" />
<?php

if ($_POST['status_process'] == "") {
    echo "กรุณาเลือกสถานะโครงการ";
    header('Refresh: 0; URL=projectreport.php?id=' . $_POST['id'] . '&r=' . $_POST['r'] . '&y=' . $_POST['y']);
} else {
    if (isset($_POST['input_plan'])){
        $plan = $_POST['input_plan'];
    } else {
        $plan = "N";
    }
    include "include/ConnectionDb.php";
    if ($_POST['input_state'] == "insert"){
        if ($_POST['non_budget'] == "Y"){
            $sql = "INSERT INTO report VALUES ('', '$_POST[id]', '$_POST[dimention]', '$_POST[r]', '$_POST[y]', '$_POST[txtBudget]', '$_POST[y]', '$_POST[txtAmount]', '$_POST[y]', '$_POST[txtPaid]','$plan', '$_POST[y]', '$_POST[status_process]', '$_POST[cant_process]', '$_POST[cant_reason]', '$_POST[txtRemarkReport]', 'Y', 'Y', '$_POST[local_goverment_id]')";
        } else {
            $sql = "INSERT INTO report VALUES ('', '$_POST[id]', '$_POST[dimention]', '$_POST[r]', '$_POST[y]', '0', '$_POST[y]', '0', '$_POST[y]', '0', '$plan', '$_POST[y]', '$_POST[status_process]', '$_POST[cant_process]', '$_POST[cant_reason]', '$_POST[txtRemarkReport]', 'Y', 'Y', '$_POST[local_goverment_id]')";
        }
    } else {
        if ($_POST['cant_process'] != 4) {
            $txt_reason = "";
        } else {
            $txt_reason = $_POST['cant_reason'];
        }
        $sql = "UPDATE report SET budget=$_POST[txtBudget], budget_true=$_POST[txtAmount], paid=$_POST[txtPaid], input_plan='$plan', status_process=$_POST[status_process], radio_reason='$_POST[cant_process]', txt_reason='$txt_reason', remark_report='$_POST[txtRemarkReport]' WHERE project_id=$_POST[id] AND round_report=$_POST[r] AND status_process_year=$_POST[y]";
    }


    //$sql_update = "UPDATE project SET flag_count=$_POST[flag] WHERE project_id=$_POST[id]";

    mysqli_set_charset($conn,"utf8");
    //if (mysqli_query($conn, $sql_insert) && mysqli_query($conn, $sql_update)) {
    if (mysqli_query($conn, $sql)) {
        echo "บันทึกการรายงานผลสำเร็จแล้ว";
        if ($_POST['btnSubmit'] == "บันทึก") {
            header('Refresh: 0; URL=projectdisplay.php');
            echo "<script>window.location = 'projectdisplay.php';</script>";
        } else {
                //header('Refresh: 0; URL=projectcreate.php');
                echo "<script>window.location = 'projectdisplay.php';</script>";
        }
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    die();
}
?>
