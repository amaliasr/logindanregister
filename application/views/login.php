<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header" class="y" >
			  <font face="Hirakatana" align="center"><h1>Nakame Site</h1></font>
			  </div>
			  <?php echo form_open('login/cekLogin'); ?>
			  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			  	<form action="" method="POST" role="form">
			  	
			  	<legend>Login</legend>
			  	
			  	<?php echo validation_errors(); ?>
			  	<div class="form-group">
			  		<label for="">Username</label>
			  		<input type="text" class="form-control" id="username" name="username" placeholder="">
			  		<label for="">Password</label>
			  		<input type="password" class="form-control" id="password" name="password" placeholder="">
			  	</div>
			  		<button type="submit" class="btn btn-primary">Submit</button>  <a href="<?php echo site_url('login/create') ?>" type="button" class="btn btn-warning">Register</a></h1><br><br>
			  </div>
			  
			  	
			  
			  
			  </form>
					</div>
</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>