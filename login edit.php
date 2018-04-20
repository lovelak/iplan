<?php
	session_start();


	//$username = $_POST[user];
	//$password = $_POST[password];

	$h_id = $_POST[h_id];
	$error = "";
	if(!empty($h_id))
		{


				$uid = $_REQUEST['Username'];
				$hanaka = $_REQUEST['Password'];


				if($hanaka!='' || $uid !='')
				{
							//check user local

											include 'include/ConnectionDb.php';

											$sql2="SELECT * FROM local_office WHERE local_office_code = '$uid' and password ='$hanaka' ";
									    mysqli_set_charset($conn,"utf8");
									    $result2=mysqli_query($conn, $sql2);
									    $num2=mysqli_fetch_assoc($result2);
											if (mysqli_num_rows($result2) > 0)
												{

														$_SESSION["ss_username"] = $uid;
														$_SESSION["ss_local_office_id"] = $num2[local_office_id];
														$_SESSION["ss_local_office_name"] = $num2[local_office_name];
														$_SESSION["ss_PROVINCE_ID"] = $num2[PROVINCE_ID];
														$_SESSION["ss_group"] = '1';
														mysqli_close($conn);
														echo "<script>window.location = 'index.php';</script>";
												}
											else
												{

														//check user nacc
														$ldap_host = "10.151.0.51";
														$base_dn = "cn=".$uid.",cn=users,dc=nacc,dc=go,dc=th";
														$connect = ldap_connect( $ldap_host);

														ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
														ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
														@$bind = ldap_bind($connect, $base_dn, stripslashes($hanaka));

														if(!@$bind)
															{

																if($hanaka!='' && $uid !='')
																{
																//check user nacc
																$sql_u="SELECT * FROM user WHERE username = '$uid' and password = '$hanaka' and remark='global' ";
																mysqli_set_charset($conn,"utf8");
																$result_u=mysqli_query($conn, $sql_u);
																$num_u=mysqli_fetch_assoc($result_u);
																if (mysqli_num_rows($result_u) > 0)
																	{

																		$sql2="SELECT * FROM office WHERE office_id = '$num_u[local_office_id]' ";
																		mysqli_set_charset($conn,"utf8");
																		$result2=mysqli_query($conn, $sql2);
																		$num2=mysqli_fetch_assoc($result2);

																		$_SESSION["ss_username"] = $uid;
																		$_SESSION["ss_local_office_id"] = $num2[office_id];
																		$_SESSION["ss_local_office_name"] = $num2[office_name];
																		$_SESSION["ss_PROVINCE_ID"] = 'สำนักงาน ป.ป.ช.';
																		$_SESSION["ss_group"] = $num_u[user_group];
																		mysqli_close($conn);
																		echo "<script>window.location = 'index.php';</script>";
																	}
																}
																	else
																		{
																				echo "<script>alert('ไม่พบผู้ใช้งาน');window.location = 'login.php';</script>";
																				$error = "1";
																		}
															}
														else
															{

																$sql="SELECT * FROM user WHERE username = '$uid' ";
																mysqli_set_charset($conn,"utf8");
																$result=mysqli_query($conn, $sql);
																$num=mysqli_fetch_assoc($result);
																if (mysqli_num_rows($result) > 0)
																	{

																		$sql2="SELECT * FROM office WHERE office_id = '$num[local_office_id]' ";
																		mysqli_set_charset($conn,"utf8");
																		$result2=mysqli_query($conn, $sql2);
																		$num2=mysqli_fetch_assoc($result2);

																		$_SESSION["ss_username"] = $uid;
																		$_SESSION["ss_local_office_id"] = $num2[office_id];
																		$_SESSION["ss_local_office_name"] = $num2[office_name];
																		$_SESSION["ss_PROVINCE_ID"] = 'สำนักงาน ป.ป.ช.';
																		$_SESSION["ss_group"] = $num[user_group];
																		mysqli_close($conn);
																		echo "<script>alert('6666');window.location = 'index.php';</script>";

																	}

																}


																echo "<script>alert('ไม่พบผู้ใช้งาน');window.location = 'login.php';</script>";
																$error = "1";
														}


	/*
						include"connect.php";

						$sql_login = "SELECT * FROM member WHERE  DECL_MEMBER_USERNAME =  '$uid' ";
						$result_login = mysql_query($sql_login);
						$login = mysql_fetch_array($result_login);


								if($login[DECL_MEMBER_ID] !="")
									{

										$_SESSION["ss_id"] = $login[DECL_MEMBER_ID];
										$_SESSION["ss_username"] = $login[DECL_MEMBER_USERNAME];
										$_SESSION["ss_name"] = $login[DECL_MEMBER_NAME];
										$_SESSION["ss_surname"] = $login[DECL_MEMBER_SURNAME];
										$_SESSION["ss_level"] = $login[DECL_MEMBER_LEVEL];

										echo "<script>window.location = 'index.php';</script>";

									}
								else
									{
												$error = "1";
									}
					}*/


					}
				else
					{
								echo "<script>alert('ไม่พบผู้ใช้งาน');window.location = 'login.php';</script>";
								$error = "1";
					}

		}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>e-PlanNACC - NACC ระบบรายงานและติดตามประเมินผลงานการดำเนินงานตามแผนปฏิบัติการป้องกันการทุจริตขององค์กรปกครองส่วนท้องถิ่น</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<img src="images/logonacc.png" alt="NACC" border="0" />
									<span class="green">e</span>
									<span class="white" id="id-text2">-PlanNACC</span>
								</h1>
								<h6 class="blue" id="id-company-text">สํานักงานคณะกรรมการป้องกันและปราบปรามการทุจริตแห่งชาติ</h6>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-unlock-alt green"></i>
												กรุณา Login
											</h4>

											<div class="space-6"></div>

											<form class="form-horizontal" role="form" action="login.php" method="post" >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" name="Username" id="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="Password" id="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix center">
											<!--		<button type="button" class="width-35 btn btn-sm btn-primary" onclick="window.location='index.php'">
											-->	<button type="submit" class="width-35 btn btn-sm btn-primary" >
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
														<input name="h_id" type="hidden" id="h_id" value="1" />
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110"></span>
											</div>


										</div>

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->


							</div><!-- /.position-relative -->


						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<?php
					include"footer.php";
		 ?>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>



	</body>
</html>
