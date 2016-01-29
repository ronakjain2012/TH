<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$host = "localhost";
$user = "root";
$pwd = "root";
$db = "adminp";
$url = "http://localhost/Try1/adminP.php";
$user_details = null;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script>
window.onkeyup = function(e) {
   var key = e.keyCode ? e.keyCode : e.which;
   if (key == 65 || key == 97) {
	   document.getElementById("switchTab2").click();
       document.getElementById("AAU").click();
   }
   if (key == 76 || key == 108) {
       document.getElementById("switchTab2").click();
	   document.getElementById("LAU").click();
   }
}

function AAUuser() {
	   document.getElementById("switchTab2").click();
       document.getElementById("AAU").click();		
}

function LAUuser() {
       document.getElementById("switchTab2").click();
	   document.getElementById("LAU").click();	
}
</script>

</head>
<body class="mainAdmin">
<?php
$con = new MySQLi($host,$user,$pwd);
if($con->connect_error) {
		header("Location: ".$url."?error=db_connection_error");		
		die();
		exit();
}
$status = null;	

if(isset($_POST['operation'])) {
$status=$_POST['operation'];	
}

$operation = $status;
if($operation==="new_login") {
	$_SESSION['user'] = "NotValid";
	if($con->connect_errno){
		header("Location: ".$url."?error=db_connection_error");
		die();
		exit();
	} else {
		$con->select_db($db);
		if( isset($_POST['userName']) and isset($_POST['userPassword']) ) {
			$userN = hash('sha256',$_POST['userName']);
			$userPwd = hash('sha256',$_POST['userPassword']);
			$query = "select * from admin_users where u_name='".$userN."' and u_pwd='".$userPwd."'";
			if($res = $con->query($query)){
				if($res->num_rows === 1) {
					$result = $res->fetch_assoc();
					$_SESSION['user'] = "valid";
					$user_details = sessionLog($_POST['userName'],$result['u_role']);
					$_SESSION['th_user_details'] = $user_details;
					goto Success;	
				} else {
					header("Location: ".$url."?error=invalidLogin");
					die();
					exit();
				}
			} else {
				header("Location: ".$url."?error=sqlerror");
				die();
				exit();
			}
		} else {
			header("Location: ".$url."?error=novaluePassed");
			die();
			exit();
		}	
	}
} else {
	$status = mainAuth();
	if($status == TRUE) {
		Success:
		$user_details=$_SESSION['th_user_details'];
//////////////////////////////////////// After Successful Authentication ////////////////////////////////
?>
<div>
	
	<div class="top_nav col-lg-11 col-md-11 col-sm-11">
		<div class="logo">
        LOGO HERE
    	</div>
        <div class="info-nav">
        <?php echo $user_details['userName']." | XYZ user Info ";  ?>	
        </div>
    </div>
    
    <div class="col-lg-12 col-md-12 col-sm-12 main-body">
			<div class="data">
            <div class="col-lg-12">
            	 <nav class="navbar navbar-inverse">
                 	<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" style="color:#EDEDED;"><?php echo $user_details['userName']; ?></a>
						</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="LandingPage.php">Home</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Add<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a onClick="AAUuser();">Add Admin User</a></li>
									<li><a onClick="LAUuser();">Add Local Admin User</a></li>
        						</ul>
      						</li>
                            
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">View<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Booking Details</a></li>
									<li><a href="#">Logs</a></li>
                                    <li><a href="#">View Users</a></li>
        						</ul>
      						</li>
                            <li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Transections<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Paid</a></li>
									<li><a href="#">Booked</a></li>
        						</ul>
      						</li>
                            <li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bookings<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Book Ticket</a></li>
									<li><a href="#">Accept Tickets</a></li>
        						</ul>
      						</li>
                            <li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Coupons<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Add Coupons</a></li>
									<li><a href="#">View/Delele Coupons</a></li>
        						</ul>
      						</li>  
					</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
						</ul>
					</div>
				</nav>
            </div>
            <div class="col-lg-3">
				<ul class="nav nav-pills nav-stacked">
                	<li class="active"><a data-toggle="tab" href="#menu">Home</a></li>
					<li><a data-toggle="tab" href="#menu1">Accept Ticket</a></li>
					<li><a data-toggle="tab" href="#menu2" id="switchTab2">Add Users</a></li>
					<li><a data-toggle="tab" href="#menu3">Add Coupons</a></li>
				</ul>
            </div>
            <div class="col-lg-8">
            	<div class="tab-content">
					<div id="menu" class="tab-pane fade in active text-center">
                        <h3> User Operations</h3>
                         <?php
							if(isset($_GET['Operations']) and $_GET['Operations'] === "addAAU") {
								if(isset($_POST['AAUuserName']) and isset($_POST['AAUuserPassword'])) {
									$AAUname = $_POST['AAUuserName'];
									$AAUpass = $_POST['AAUuserPassword'];
									$AAUrole = "a";
									add_user($AAUname,$AAUpass,$AAUrole);
								}
							}
							if(isset($_GET['Operations']) and $_GET['Operations'] === "addLAU") {
								if(isset($_POST['LAUuserName']) and isset($_POST['LAUuserPassword'])) {
									$LAUname = $_POST['LAUuserName'];
									$LAUpass = $_POST['LAUuserPassword'];
									$LAUrole = "l";
									add_user($LAUname,$LAUpass,$LAUrole);
								}
							}
						?>
                    </div>
                    <div id="menu1" class="tab-pane fade text-center">
                        <h3> Accept Tickets</h3>
					
                    </div>
					<div id="menu2" class="tab-pane fade text-center">
						<h3>Add Users</h3>
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#UserMenu" id="AAU"> <strong> 1. </strong>ADD AGENT ADMIN</a></li>
								<li><a data-toggle="tab" href="#UserMenu1" id="LAU"> <strong> 2. </strong> ADD LOCAL ADMIN </a></li>
                            </ul>
                            <div class="tab-content">
								<div id="UserMenu" class="tab-pane fade in active">
									<h3>ADD AGENT ADMIN</h3>
									<form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF'])."?Operations=addAAU"; ?>" method="post">
                                    	<div class="form-group">
                                        	<input type="text" class="form-control" name="AAUuserName" placeholder="User Name" required autofocus autocomplete="off"/>
                                        </div>
                                        <div class="form-group">
                                        	<input type="text" class="form-control" name="AAUuserPassword" placeholder="User Password" required/>
                                        </div>
                                        <div class="form-group">
                                        	<input type="submit" class="btn btn-default btn-lg" value="ADD"/>
                                        </div>
                                    </form>
                                </div>
								<div id="UserMenu1" class="tab-pane fade">
									<h3>ADD LOCAL ADMIN</h3>
                                    	<form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF'])."?Operations=addLAU"; ?>" method="post">

                                    	<div class="form-group">
                                        	<input type="text" class="form-control" name="LAUuserName" placeholder="User Name" required autofocus autocomplete="off"/>
                                        </div>
                                        <div class="form-group">
                                        	<input type="text" class="form-control" name="LAUuserPassword" placeholder="User Password" required/>
                                        </div>
                                        <div class="form-group">
                                        	<input type="submit" class="btn btn-default btn-lg" value="ADD"/>
                                        </div>
                                        </form>
                                </div>
							</div>
					</div>
					<div id="menu3" class="tab-pane fade text-center">
						<h3>Add Coupons</h3>
			
					</div>
				</div>
			</div>
      </div>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
<?php 
	} else {
		header("Location: ".$url."?error=sessionExpiredorNotValid");
		die();
		exit();
	}

}

// Function Section 

function mainAuth() {
	if($_SESSION['user']) {
		if($_SESSION['user']==="valid") {
		return TRUE;
		} else {
			session_destroy();
			return FALSE;
		}
	} else {
		session_destroy();
		return FALSE;
	}
}

function sessionLog($Suser,$role) {
		$host = "localhost";
		$user = "root";
		$pwd = "root";
		$db = "adminp";
		$sessionID = null;
		$sessionStart = null;
	try {
		$con = new MySQLi($host,$user,$pwd);
		$con->select_db($db);		
		$sessionID = session_id();
		$sessionStart = time();
		$query = "insert into user_details (th_user,th_session_id,th_session_start) values('".$Suser."','".$sessionID."','".$sessionStart."')";
		$con->query($query);
	} catch(Exception $e) {
		print("$e");	
	}	
	$x=array("userName"=>"$Suser","sessionID"=>"$sessionID","sessionStart"=>"$sessionStart","role"=>"$role");
	$con->close();
	return $x;
}

function add_user($Uname,$Upass,$Urole) {
	try {
		$host = "localhost";
		$user = "root";
		$pwd = "root";
		$db = "adminp";
		$con = new MySQLi($host,$user,$pwd);		
		$con->select_db($db);
		$Uname1 = $Uname;
		$Uname = hash('sha256',$Uname);
		$Upass = hash('sha256',$Upass);
		$query = "insert into admin_users (u_name,u_pwd,u_role) values('".$Uname."','".$Upass."','".$Urole."')";
		
		if($con->query($query)) {
		?>
		<div class="alert alert-success fade in" style="text-align:left;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success !</strong> Admin User is Added. USER : <?php echo $Uname1; ?> 
		</div>
		<?php   
		} else {
		?>
        <div class="alert alert-danger fade in" style="text-align:left;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong> Unsuccess !</strong> User already EXISTS 
		</div>	
		<?php
        }
		
	} catch(Exception $ex) {
		print("$ex");
	}
	$con->close();
}

?>
</html>