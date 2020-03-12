<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Edit Product</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>products/updateProduct/">
				  <input type="hidden" id="product_id" name="product_id" value="<?php echo $product->product_id; ?>">
				  <div class="form-group">
					<label for="product_name" class="col-sm-2 control-label">Product_name</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product_name" value="<?php echo $product->product_name; ?>">
					</div>
				  </div>
				<div class="form-group">
					<label for="price" class="col-sm-2 control-label">Price</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $product->price; ?>" >
					</div>
				  </div>
				 <div class="form-group">
					<label for="description" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $product->description; ?> ">
					</div>
				  </div>
					<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							<select class="form-control" id="status" name="status">
								<option value="Available" <?php echo ($product->status == "Available") ? 'selected="true"' : ''; ?>>Available</option>
								<option value="Not Available" <?php echo ($product->status == "Not Available") ? 'selected="true"' : ''; ?>>Not Available</option>
							</select>
						</div>
					</div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-primary">Update</button>
					  <a href="<?php echo base_url(); ?>products/" class="btn btn-default">Cancel</a>
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