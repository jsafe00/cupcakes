<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Product Details</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>products/addProduct/">
			
				 <div class="form-group">
					<label for="product_name" class="col-sm-2 control-label">Product Name</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="product_name" value="<?php echo set_value('product_name'); ?>">
					  <?php echo form_error('product_name', '<div style="color: red;">', '</div>'); ?>
					</div>
				  </div>
					<div class="form-group">
						<label for="price" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="price" name="price" placeholder="price" value="<?php echo set_value('price'); ?>">
							<?php echo form_error('price', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php echo set_value('description'); ?>">
							<?php echo form_error('description', '<div style="color: red;">', '</div>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Product Status</label>
						<div class="col-sm-10">
							<select class="form-control" id="status" name="status">
								<option value="Available">Available</option>
								<option value="Not Available">Not Available</option>
							</select>
						</div>
					</div>
				
				
					<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Add  Products</button>
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