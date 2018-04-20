<?php
    if(empty($_SESSION[ss_username]) )
      {
        echo"<script>
        window.location = 'login.php';
        </script>";
      }
    date_default_timezone_set("Asia/Bangkok");
    $today = date("Y-m-d");
    $now_time = date("H:i:s");


    if($_SESSION["ss_group"] <= '2' )
      {

        //   else
        //   {
            $sql_checkscore1="SELECT * FROM scoresar WHERE local_office_code = '".$_SESSION["ss_username"]."' order by scoresar_id desc ";
            mysqli_set_charset($conn,"utf8");
            $result_checkscore1=mysqli_query($conn, $sql_checkscore1);
            $num_checkscore1=mysqli_fetch_assoc($result_checkscore1);

            $sql_score1="SELECT * FROM criterionscore  order by criterionscore_year desc ";
            mysqli_set_charset($conn,"utf8");
            $result_score1=mysqli_query($conn, $sql_score1);
            $num_score1=mysqli_fetch_assoc($result_score1);

            if($num_checkscore1[suml] != 0)
              {
                $scoreshow = $num_checkscore1[suml];
              }
            if($num_checkscore1[sump] != 0)
              {
                $scoreshow = $num_checkscore1[sump];
              }
            if($num_checkscore1[summ] != 0)
              {
                $scoreshow = $num_checkscore1[summ];
              }


            if($scoreshow < $num_score1[criterionscore_score])
              {
                echo"<script>
                alert('หน่วยงานของท่าน ยังไม่มีผลการประเมิน/ยังไม่จัดส่งแผน');
                window.location = 'login.php';
                </script>";
              }
          //}



      }

?>
