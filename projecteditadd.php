<?php
session_start();
$local_office = $_POST[local_office];
?>
<meta charset="utf-8" />
<?php
if ($_POST['txtName'] == "") {
    echo "กรุณาป้อนข้อมูลให้ครบถ้วน";
    //header('Refresh: 0; URL=projectcreate.php');
    echo "<script>window.location = 'projectcreate.php';</script>";
} else {
    include "include/ConnectionDb.php";
    $sql_insert = "UPDATE project SET name='$_POST[txtName]',local_goverment_id='$local_office', year1='$_POST[year1]', year2='$_POST[year2]', year3='$_POST[year3]', year4='$_POST[year4]', quarter='$_POST[quarter]', type='$_POST[type]', dimention='$_POST[dimention]', budget_year='$_POST[sltYear]', non_budget='$_POST[budget]', budget='$_POST[txtBudget]', target_group='$_POST[txtTarget]', object='$_POST[txtObject]',target_group1='$_POST[target_group1]',target_group2='$_POST[target_group2]',target_group3='$_POST[target_group3]',target_group4='$_POST[target_group4]',target_group5='$_POST[target_group5]',target_group6='$_POST[target_group6]',target_group7='$_POST[target_group7]',target_group8='$_POST[target_group8]',target_group9='$_POST[target_group9]', remark_project='$_POST[txtRemark]'  WHERE project_id='$_POST[idproject]'";

    //echo $sql_insert;
    mysqli_set_charset($conn,"utf8");
    if (mysqli_query($conn, $sql_insert)) {
        echo "บันทึกโครงการสำเร็จแล้ว";
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if ($_POST['btnSubmit'] == "บันทึก") {
        //header('Refresh: 0; URL=projectdisplay.php');
        echo "<script>window.location = 'projectdisplay.php';</script>";
    } else {
        //header('Refresh: 0; URL=projectcreate.php');
        echo "<script>window.location = 'projectdisplay.php';</script>";
    }
    die();
}
?>
