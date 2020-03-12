<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Generate Order Report</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>reports/orderReport/">
				  <div class="form-group">
					<label for="customer_address" class="col-sm-2 control-label">Date From</label>
					<div class="col-sm-10">
					  <input type="date" class="form-control" name="date_from" placeholder="YYYY-MM-DD">
					</div>
				  </div>
			      <div class="form-group">
					<label for="customer_address" class="col-sm-2 control-label">Date To</label>
					<div class="col-sm-10">
					  <input type="date" class="form-control" name="date_to" placeholder="YYYY-MM-DD">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Generate Report</button>
					</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php //$this->load->view('footer'); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>