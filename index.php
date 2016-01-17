<!DOCTYPE HTML>
<?php

	session_start();

	include '_config.php';
	include '_queries.php';

	$con = connect();

	$sessionState = 0;

	if (isset($_SESSION['halt_user'])) {
		$sessionState = 1;

		$res_chkmail = $con->query($sql_users['sessionFetch'] . "'".$_SESSION['halt_user']."'");
		$row_chkmail = $res_chkmail->fetch_assoc();
	}

?>
<html>
	<head>
		<title>Ticket Halt</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/datepicker.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="FontAwesome/css/font-awesome.css">

		<script type="text/javascript" src="js/live.js"></script>
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
						| <li class="active"><a href="index.php">Home</a></li> |
						<li><a href="cancel.html">Print / Cancel Ticket</a></li> | |

						<?php
							if ($sessionState == 1) {
						?>

						<li><a href="account.php"><?php
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
							<li class="active"><a href="index.php">Home</a></li> 
							<li><a href="cencel.html">Cancel Ticket</a></li>

							<?php
								if ($sessionState == 1) {
							?>

							<li><a href="account.php"><?php
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
		<div class="main_bg" style="background:url('images/slider-bg.jpg') no-repeat fixed center top / cover;">
			<div class="wrap" style="padding:185px 0 0 0">
				<div class="online_reservation">
					<div class="b_room">
						<div class="h-head">
							<h4>Book Bus Ticket Online</h4>
							<p>India's largest real time tickets booking system</p>
						</div>
						<div class="h-body">
							<form method="post" action="searchbus.php">
							<div class="cell">
								<h5>From :</h5>
								<input type="text" name="from" list="source" onkeyup="source(this.value)" required placeholder="Select City">
								<datalist id="source"></datalist>
							</div><div class="cell">
								<h5>To :</h5>
								<input type="text" name="to" list="destination" onkeyup="destination(this.value)" required placeholder="Select City">
								<datalist id="destination"></datalist>
							</div><div class="cell book_date">
								<h5>Date :</h5>
								<input type="text" name="on" id="datepicker" required placeholder="DD/MM/YYYY">
							</div><div class="cell">
								<h5></h5>
								<input type="submit" name="sbus" value="Search Bus">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main_bg">
			<div class="wrap">
				<div class="space"></div>
				<div class="grids_of_3">
					<div class="grid1_of_3">
						<div style="text-align:center;"><i class="fa fa-shopping-cart" style="font-size:800%;color:#191919;"></i></div>
						<p>Ticket Halt is an e-commerce booking portal which not only provides the best services without any hassle but also seeking the quality standards of your journey with economical and pocket friendly prices.</p>
					</div>
					<div class="grid1_of_3">
						<div style="text-align:center;"><i class="fa fa-rupee" style="font-size:800%;color:#191919;"></i></div>
						<p>No extra amounts have to be paid for such services. Be the part of ticket halt and make your experience worth. Tickethalt.com is introduced for the convenience of people who travel a lot but find difficulties in their travelling part. Time is an important part in one’s life and we take care of that by not letting you stand in long que.</p>
					</div>
					<div class="grid1_of_3">
						<div style="text-align:center;"><i class="fa fa-female" style="font-size:800%;color:#191919;"></i></div>
						<p>We offer reserved seats for the ladies without any hassle.comfort and luxury is what we give preference for the public service. No hassle around with the bus operators. </p>
					</div>
					<div class="clear"></div>
				</div>	
			</div>
		</div>
		<!-- /END MAIN CONTENT -->	
		<?php include '_footer.php'; ?>
	</body>
</html>