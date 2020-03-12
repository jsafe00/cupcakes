<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
			
		<br />
		<form method="POST" action="<?php echo base_url(); ?>orders/processorder/<?php echo $order_id; ?>">
		<button class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Add Order</button>
		<div class="form-group">
			<label for="order_type" class="col-sm-2 control-label">Order Type</label>
		<select name="order_type">
			<option value="Pick Up">Pick Up</option>
			<option value="Delivery">Delivery</option>
		</select>
		</div>
		<div class="form-group">
			<label for="order_dp_date" class="col-sm-2 control-label">Order DP Date</label>
			<div class="col-sm-2">
				<input type="date" class="form-control" id="order_dp_date" name="order_dp_date" placeholder="order_dp_date" value="<?php echo set_value('order_dp_date'); ?>">
				<?php echo form_error('order_dp_date', '<div style="color: red;">', '</div>'); ?>
			</div>
		</div>
		</form>
		<br />
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		
		<div class="row">
			<div class="table-responsive">
			<?php if($products): ?>
				<table class="table table-bproducted table-responsive">
					<thead>							
					  <tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Status<th>
						<th>Quantity</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($products as $product): ?>
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>orders/addOrderitems/<?php echo $this->uri->segment(3); ?>">
							<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
							<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
							<tr>
								<td><?php echo $product->product_name; ?></td>
								<td><?php $product->price = number_format($product->price, 2); echo $product->price; ?></td>
								<td><?php echo $product->description; ?></td>
								<td><?php echo $product->status; ?></td>
								<td><select name="quantity">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</td>
								<td> <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Add Cupcake</button></td>								
						  </tr>  
						</form>
						<?php endforeach;?>						
					</tbody>				
				</table>				 
			<?php endif; ?>
			<?php if($ordered_products): ?>
			<table class="table table-bproducted table-responsive">
				<thead>							
				  <tr>
					<th>Product Name</th>
					<th>Price(Each)</th>
					<th>Quantity</th>	
					<th>Cancel</th>
				  </tr>
				</thead> 
				<tbody>
				
					<?php foreach($ordered_products as $order_item): ?>
					<tr>
						<td><?php echo $order_item->product_name; ?></td>
						<td><?php $order_item->price = number_format($order_item->price, 2); echo $order_item->price; ?></td>
						<td><?php echo $order_item->quantity; ?></td>
						<td><a href="<?php echo base_url(); ?>orders/cancelorderproductByID/<?php echo $order_item->order_item_id; ?>/<?php echo $customer; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel </a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php endif;?>
		</div>
		</div>
		<div class="row">	
		</div>
	</div>
</div>
<?php //$this->load->view('footer'); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script>
	$( document ).ready(function() {
		$(".alert").fadeTo(2000, 500).slideUp(500, function(){
			$(".alert").alert('close');
		});	
	});
</script>

</body>
</html>