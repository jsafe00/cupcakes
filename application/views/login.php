<html>
<head>
<title>Mateo's Cupkery</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<!-- Custom theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

</head>
<body>
<?php //$this->load->view('header'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Staff Login </h1>
            <div class="account-wall">
                <img class="profile-img" src="/cupcakes/img/logo.jpg"
                    alt="">
					<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>login/authenticate/">
					
						<div class="form-group">
							
							<label for="username" class="col-sm-2 control-label">
								Username
							</label>
							<br><br>
							<div class="col-sm-10">
								<input class="form-control" id="username" type="text" name="username" />
							</div>
						</div>
						
						<div class="form-group">							 
							<label for="inputPassword3" class="col-sm-2 control-label">
								Password
								
							</label>
							<br><br>
							
							
							<div class="col-sm-10">
								<input class="form-control" id="inputPassword3" type="password" name="password" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-large">
								Sign in
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
<?php //$this->load->view('footer'); ?>
</body>
</html>