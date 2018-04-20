<meta charset="utf-8" />
<?php
    include 'include/ConnectionDb.php';

    date_default_timezone_set ("Asia/Bangkok");



$fileuploadid = $_POST[fileuploadid];
$sltYear = $_POST[sltYear];
//$t_name_file ='';
echo "--->".$sltYear."<br>";

for($i=0;$i <=sizeof($fileuploadid)-1;$i++)
  { echo "-->".$fileuploadid[$i]."<br>";

    if(!empty($_FILES["fileupload"]['name'][$i]))
      {

        //--------------------------------ZIP------------------------------------
        $today = date("Y-m-d");
      	$now_time = date("H:i:s");

      	$date = explode("-",$today);
      	$year  = $date[0];
      	$month = $date[1];
      	$day = $date[2];

        $t = explode("-",$now_time);
        $th  = $date[0];
        $tm = $date[1];
        $ts = $date[2];

      	$t_today = $th.$tm.$ts;

     $ZipName = "uploads/".$fileuploadid[$i]."_".$sltYear[$i]."_".$today."_".$t_today.".zip";
     require_once("dZip.inc.php"); // include Class
     $zip = new dZip($ZipName); // New Class

     $nameadd = $fileuploadid[$i]."_".$sltYear[$i]."_".$today."_".$t_today.".zip";

     //$count_a = count($file_work);
     //echo $count_a;


     $file_work = $_FILES["fileupload"]['name'][$i];//--file--
     //$t_name_file = $t_name_file." ".$file_work;

     $file_name = iconv('UTF-8', 'TIS-620',$_FILES["fileupload"]['name'][$i]);

     $zip->addFile($_FILES["fileupload"]["tmp_name"][$i],$file_name ); // Source,Destination
     $zip->save();

     $sql_insert = "INSERT INTO scorevs VALUES ('','$fileuploadid[$i]', '1','$sltYear[$i]','$nameadd')";
     echo "---->".$sql_insert;
     mysqli_set_charset($conn,"utf8");
     mysqli_query($conn, $sql_insert);

    //echo "The file ". basename( $_FILES["fileupload"]["name"][$i]). " has been uploaded.";


    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileupload"]["tmp_name"][$i]);
    //     if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // // Check if file already exists
    // // if (file_exists($target_file)) {
    // //     echo "Sorry, file already exists.";
    // //     $uploadOk = 0;
    // // }
    //
    // // Check file size
    // // if ($_FILES["fileToUpload"]["size"] > 500000) {
    // //     echo "Sorry, your file is too large.";
    // //     $uploadOk = 0;
    // // }
    //
    // // Allow certain file formats
    // //if($imageFileType == "bat" && $imageFileType != "png" && $imageFileType != "jpeg"
    // //&& $imageFileType != "gif" )
    // if($imageFileType == "bat")
    // {
    //     echo "ระบบไม่รองรับประเภทไฟล์ของท่าน";
    //     $uploadOk = 0;
    // }
    //
    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "<script>window.location = 'projectimplementprovince.php';</script>";
    //   //echo "Sorry, your file was not uploaded.";
    //
    // // if everything is ok, try to upload file
    // } else {
    //   //$sur = strrchr($imageFileType, ".");
    //
    //   // $file = strtolower($_FILES["fileupload"]["name"]);
    //   // $sizefile = $_FILES["fileupload"]["size"];
    //   // $type= strrchr($file,".");
    //
    //   $newname = $fileuploadid[$i]."_".$sltYear[$i]."_".$today."_".$t_today.".".$imageFileType ;
    //
    //       //$target_file = $target_dir . basename($_FILES["fileupload"]["name"][$i]);
    //       $target_file = $target_dir . $newname;
    //       echo   $target_file;
    //
    //     if (move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i], $target_file)) {
    //
    //     //  $file1 = $_FILES["fileupload"]["name"][$i];
    //
    //
    //       $sql_insert = "INSERT INTO scorevs VALUES ('','$fileuploadid[$i]', '1','$sltYear[$i]','$newname')";
    //   //echo $sql_insert;
    //       mysqli_set_charset($conn,"utf8");
    //       mysqli_query($conn, $sql_insert);
    //
    //         //echo "The file ". basename( $_FILES["fileupload"]["name"][$i]). " has been uploaded.";
    //         //echo "<script>window.location = 'projectimplementprovince.php';</script>";
    //     } else {
    //       //  echo "Sorry, there was an error uploading your file.";
    //         //echo "<script>window.location = 'projectimplementprovince.php';</script>";
    //     }
    // }
  }
} //echo "<script>window.location = 'projectimplementamphur.php';</script>";

    ?>
