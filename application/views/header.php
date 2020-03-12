<html>
<head>
<title>Mateo's Cupkery</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">

<!-- Custom theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

<!-- Custom CSS -->
<style>
body {
	padding-top: 70px;
	/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}
    </style>

</head>
<body>
<?php //$this->load->view('header'); ?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>orders/">Mateo's Cupkery</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php echo ($this->uri->segment(1) == 'orders') ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>orders/"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pending Orders</a></li>
				<li <?php echo ($this->uri->segment(1) == 'customers') ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>customers/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customers</a></li>
				<li <?php echo ($this->uri->segment(1) == 'products') ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>products/"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Products</a></li>
				<li <?php echo ($this->uri->segment(1) == 'reports') ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>reports/"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a></li>
				
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
									
					<li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
					
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>