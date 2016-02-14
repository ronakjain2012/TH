<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panal</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="main">
<section>
<div class="center-block text-center">
<div>
<div style="color:#4F68FF;" class="padding-20"> <img src="Images/user-Icon1.png" style="width:150px;" /> </div>
<div class="col-lg-3"> </div>
<div class="col-lg-6 margin-top-30" id="main">
<form action="dashboard.php" method="post" role="form">
<div class="form-group">
  <input type="text" name="userName" class="form-control text-center bottom" placeholder="Username" required />
</div>
<div class="form-group">
  <input type="password" name="userPassword" class="form-control text-center bottom" placeholder="Password" required/>
</div>
<div class="form-group">
  <input type="hidden" value="new_login" name="operation" />
  <input type="submit" value="Sign In" class="form-control btn-color btn" />
</div>
</div>
<div class="col-lg-3"> </div>
<div class="col-lg-12 padding-20 font-size-20"> <a href="#" class="margin-right"> Home </a> <a href="#" class="margin-right"> Contact Us </a> <a href="#"> Support </a> </div>
</div>
</div>
</section>
</body>
<script src="js/bootstrap.js"> </script>
</html>