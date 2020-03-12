<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Update Order</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>orders/updateOrder/">
				  <input type="hidden" id="order_id" name="order_id" value="<?php echo $order->order_id; ?>">
				  <?php echo form_error('order_id', '<div style="color: red;">', '</div>'); ?>
				 <div class="form-group">
					<label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" value="<?php echo $order->customer_name; ?>"readonly>
					  <?php echo form_error('customer_name', '<div style="color: red;">', '</div>'); ?>
					</div>
				  </div>
				  <div class="form-group">
						<label for="customer_address" class="col-sm-2 control-label">Customer Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Customer Address" value="<?php echo $order->customer_address; ?>"readonly>
							<?php echo form_error('customer_address', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					 <div class="form-group">
						<label for="contact_no" class="col-sm-2 control-label">Contact Number</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" value="<?php echo $order->contact_no; ?>"readonly>
							<?php echo form_error('contact_no', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					 <div class="form-group">
						<label for="order_date" class="col-sm-2 control-label">Order Date</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="order_date" name="order_date" placeholder="Order Date" value="<?php echo $order->order_date; ?>"readonly>
							<?php echo form_error('order_date', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="order_type" class="col-sm-2 control-label">Order Type</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="order_type" name="order_type" placeholder="Order Type" value="<?php echo $order->order_type; ?>"readonly>
							<?php echo form_error('order_type', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="order_dp_date" class="col-sm-2 control-label">Order DP Date</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="order_dp_date" name="order_dp_date" placeholder="Order DP Date" value="<?php echo $order->order_dp_date; ?>"readonly>
							<?php echo form_error('order_dp_type', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="staff_name" class="col-sm-2 control-label">staff_name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="staff_name" value="<?php echo $order->firstname.' ',$order->lastname; ?>"readonly>
							<?php echo form_error('staff_name', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Order Status</label>
						<div class="col-sm-10">
							<select class="form-control" id="status" name="order_status">
								<option> </option>
								<option value="Now Baking" <?php echo ($order->order_status == "Now Baking") ? 'selected="true"' : ''; ?>>Now Baking</option>
								<option value="Completed" <?php echo ($order->order_status == "Completed") ? 'selected="true"' : ''; ?>>Completed</option>
							</select>
							<?php echo form_error('order_status', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Update</button>
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