<meta charset="utf-8" />
<?php
$username = "nattakorn_mua";
$pass = "Reborn14";


if($username !=null and $pass !=null)
{
$server = " 10.151.0.42"; //dc1-nu
$user = $username."@nacc.go.th";
// connect to active directory
$ad = ldap_connect($server);
if(!$ad) {
die("Connect not connect to ".$server);

// include("chk_login_db.php");

echo "ไม่สามารถติดต่อ server มหาลัยเพื่อตรวจสอบรหัสผ่านได้";
exit();

} else {
$b = @ldap_bind($ad,$user,$pass);

if(!$b)
    {
      die("<br><br>
      <div align='center'> ท่านกรอกรหัสผ่านผิดพลาด
      <br>
      </div>
      ");
    }
    else
    {

      //login ผ่านแล้วมาทำไรก็ว่าไป
      session_start();
      echo "5555 ผ่านแล้ว";

    }
}
}

?>
