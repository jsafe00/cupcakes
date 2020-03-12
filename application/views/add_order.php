<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Customer Details</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>orders/addOrder/">
			
				 <div class="form-group">
					<label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="customer_name" value="<?php echo set_value('customer_name'); ?>">
					  <?php echo form_error('customer_name', '<div style="color: red;">', '</div>'); ?>
					</div>
				  </div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Customer Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="customer_address" value="<?php echo set_value('customer_address'); ?>">
							<?php echo form_error('customer_address', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Contact No.</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="contact_no" value="<?php echo set_value('contact_no'); ?>">
							<?php echo form_error('contact_no', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Order Date</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="order_date" name="order_date" placeholder="order_date" value="<?php echo set_value('order_date'); ?>">
							<?php echo form_error('order_date', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="order_type" class="col-sm-2 control-label">Order Type</label>
						<div class="col-sm-10">
							<select class="form-control" id="status" name="order_status">
								<option value=" ">Please select</option>
								<option value="Delivery">Delivery</option>
								<option value="Pick up">Pick Up</option>

							</select>
							<?php echo form_error('order_status', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Order DP Date</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="order_dp_date" name="order_dp_date" placeholder="order_dp_date" value="<?php echo set_value('order_dp_date'); ?>">
							<?php echo form_error('order_dp_date', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
						<div class="form-group disabled">
						<label for="username" class="col-sm-2 control-label">Staff Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="staff_name" value="<?php echo $this->session->userdata('staff_name'); ?>" readonly>
							<?php echo form_error('staff_name', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="hidden">
						<label for="status" class="col-sm-2 control-label">Order Status</label>
						<div class="col-sm-10">
							<select class="form-control" id="status" name="status">
								<option value="Pending">Pending</option>
								<option value="In the Making">In the Making</option>
							</select>
						</div>
					</div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Add Customer Details</button>
					  <a href="<?php echo base_url(); ?>orders/" class="btn btn-default">Cancel</a>
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