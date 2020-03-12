<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Customer</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>customers/updateCustomer/">
				  <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer->customer_id; ?>">
				  <div class="form-group">
					<label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer_name" value="<?php echo $customer->customer_name; ?>">
					</div>
				  </div>
				  <div class="form-group">
					<label for="customer_address" class="col-sm-2 control-label">Customer Address</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Customer_address" value="<?php echo $customer->customer_address; ?>">
					</div>
				  </div>
				 <div class="form-group">
					<label for="customer_address" class="col-sm-2 control-label">Contact No</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact_no" value="<?php echo $customer->contact_no; ?>">
					</div>
				  </div>
			
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Update</button>
					  <a href="<?php echo base_url(); ?>customers/" class="btn btn-default">Cancel</a>
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