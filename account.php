<!DOCTYPE HTML>
<?php

	session_start();

	include '_config.php';
	include '_queries.php';

	$con = connect();

	$sessionState = 0;

	@$error = $_GET['error'];

	if (isset($_SESSION['halt_user'])) {
		$sessionState = 1;

		$res_chkmail = $con->query($sql_users['sessionFetch'] . "'".$_SESSION['halt_user']."'");
		$row_chkmail = $res_chkmail->fetch_assoc();
	}

	if (isset($_POST['changename'])) {
		$con->query($sql_users['changeName']."'".$_POST['name']."' WHERE MD5(`user_mail`) = '".$_SESSION['halt_user']."'");
		header("location: ".$SITE['url']."account.php");
	} elseif (isset($_POST['changepass'])) {
		if (empty($_POST['newpass']) || empty($_POST['repass'] || empty($_POST['oldpass']))) {
			header("location: ".$SITE['url']."account.php?change=password&error=empty");
		} else {
			if ($_POST['newpass'] == $_POST['repass']) {
				$resPass = $con->query($sql_users['mailPasswordCheck']."'".$_SESSION['halt_user']."' AND `user_password` = '".$_POST['oldpass']."'");
				$rowPass = $resPass->fetch_assoc();
				if ($rowPass['chk'] == 1) {
					$con->query($sql_users['changePassword']."'".$_POST['newpass']."' WHERE MD5(`user_mail`) = '".$_SESSION['halt_user']."'");
					header("location: ".$SITE['url']."account.php");
				} else {
					header("location: ".$SITE['url']."account.php?change=password&error=wrong");
				}
			} else {
				header("location: ".$SITE['url']."account.php?change=password&error=notmatch");
			}
		}
	}

?>
<html>
	<head>
		<title>Ticket Halt - My Account</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/JFGrid.css" />
		<link rel="stylesheet" type="text/css" href="css/JFFormStyle-1.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="FontAwesome/css/font-awesome.css">

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>

		<!-- START DATEPICKER SCRIPT -->
		<script>
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script>
		<!-- /END DATEPICKER SCRIPT -->

		<!-- START NAV SCRIPT -->
		<script>
				$(function() {
					var pull 		= $('#pull');
						menu 		= $('nav ul');
						menuHeight	= menu.height();

					$(pull).on('click', function(e) {
						e.preventDefault();
						menu.slideToggle();
					});

					$(window).resize(function(){
		        		var w = $(window).width();
		        		if(w > 320 && menu.is(':hidden')) {
		        			menu.removeAttr('style');
		        		}
		    		});
				});
		</script>
		<!-- /END NAV SCRIPT -->
	</head>
	<body>
		<!-- START HEADER -->
		<div class="header_bg">
		<div class="wrap">
			<div class="header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>
				<!-- START MENU -->
				<div class="h_right">
					<ul class="menu" style="float:right;">
						| <li><a href="index.php">Home</a></li> |
						<li><a href="cancel.html">Print / Cancel Ticket</a></li> | |

						<?php
							if ($sessionState == 1) {
						?>

						<li class="active"><a href="account.php"><?php
													if ($row_chkmail['user_name'] != '') {
														echo $row_chkmail['user_name'];
													} else {
														echo $row_chkmail['user_mail'];
													}
												?></a></li> |
						<li><a href="signout.php">Sign Out</a></li> |

						<?php
							} else {
						?>

						<li><a href="signin.php">Sign In</a></li> |
						<li><a href="signup.php">Sign Up</a></li> |

						<?php
							}
						?>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="top-nav">
				<nav class="clearfix">
						<ul>
							<li><a href="index.php">Home</a></li> 
							<li><a href="cencel.html">Cancel Ticket</a></li>

							<?php
								if ($sessionState == 1) {
							?>

							<li class="active"><a href="account.php"><?php
														if ($row_chkmail['user_name'] != '') {
															echo $row_chkmail['user_name'];
														} else {
															echo $row_chkmail['user_mail'];
														}
													?></a></li>
							<li><a href="signout.php">Sign Out</a></li>

							<?php
								} else {
							?>

							<li><a href="signin.php">Sign In</a></li>
							<li><a href="signup.php">Sign Up</a></li>

							<?php
								}
							?>

						</ul>
						<a href="#" id="pull">Menu</a>
					</nav>
				</div>
				<!-- /END MENU -->
			</div>
		</div>
		</div>
		<!-- /END HEADER -->
		<!-- START MAIN CONTENT -->
		<div class="main_bg">
			<div class="wrap">
				<div class="content-area">
					<div class="content-left"></div>
					<div class="content-right">
						<div class="content-box">
							<h4>My Profile</h4>
							<table>
								<tr>
									<th width="20%">Name</th>
									<td>
										<?php
											if (@$_GET['change'] == 'name') {
										?>
										<form action="account.php" method="post">
											<input type="text" placeholder="Your name" value="<?php echo $row_chkmail['user_name']; ?>" name="name">
											<input type="submit" name="changename" value="Save">
											<a href="account.php">Cancel</a>
										</form>
										<?php
											} else  {
										?>
										<input type="text" placeholder="Your name" value="<?php echo $row_chkmail['user_name']; ?>"> <a href="?change=name">Change</a>
										<?php
											}
										?>
									</td>
								</tr>
								<tr>
									<th>Email</th>
									<td><input type="text" placeholder="Your email" value="<?php echo $row_chkmail['user_mail']; ?>"></td>
								</tr>
								<tr>
									<th>Password</th>
									<td>
										<?php
											if (@$_GET['change'] == 'password') {
										?>
										<form action="account.php" method="post">
											<input type="password" placeholder="Old Password" name="oldpass" <?php if($error=='empty' || $error=='wrong') { echo 'class="error"';} ?>><br />
											<input type="password" placeholder="New Password" name="newpass" <?php if($error=='empty' || $error=='notmatch') { echo 'class="error"';} ?>><br />
											<input type="password" placeholder="Confirm New Password" name="repass" <?php if($error=='empty' || $error=='notmatch') { echo 'class="error"';} ?>>
											<input type="submit" name="changepass" value="Save">
											<a href="account.php">Cancel</a>
										</form>
										<?php
											} else {
										?>
										<input type="text" placeholder="Your password" value="********"> <a href="?change=password">Change</a>
										<?php
											}
										?>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="content-clear">
					</div>
				</div>
						
			</div>
		</div>
		<!-- /END MAIN CONTENT -->	
		<?php include '_footer.php'; ?>
	</body>
</html>