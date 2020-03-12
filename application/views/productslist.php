<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
			
		<br />
		<a href="<?php echo base_url(); ?>orders/" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Add Order</a>
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="table-responsive">
			<?php if($products): ?>
				<table class="table table-bproducted table-responsive">
					<thead>							
					  <tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Status<th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($products as $product): ?>
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>orders/addOrderitems/">
							<input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
							<input type="hidden" name="order_id" value="<?php echo $this->session->userdata('order_id'); ?>">
							<tr>
								<td><?php echo $product->product_id; ?></td>
								<td><?php echo $product->product_name; ?></td>
								<td><?php $product->price = number_format($product->price, 2); echo $product->price; ?></td>
								<td><?php echo $product->description; ?></td>
								<td><?php echo $product->status; ?></td>
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
					<th>Price</th>
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
						<td><a href="<?php echo base_url(); ?>orders/cancelorder/<?php echo $order_item->order_item_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel </a></td>
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