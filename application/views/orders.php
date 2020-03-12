<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
	
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		
		<div class="row">
			<div class="table-responsive">
			<?php if($orders): ?>
				<table class="table table-bordered table-responsive">
					<thead>							
					  <tr>
						<th>Order Details</th>
						<th>Customer Name</th>
						<th>Customer Address</th>
						<th>Contact Number</th>
						<th>Order Date</th>
						<th>Order Type</th>
						<th>Order D/P Date</th>
						<th>Staff Name</th>
						<th>Order Status</th>
						<th>Update/Cancel</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($orders as $order): ?>
							<tr>
								<td><a href="<?php echo base_url(); ?>orders/products_view/<?php echo $order->order_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> View </a></td>
								<td><?php echo $order->customer_name; ?> </td>
								<td><?php echo $order->customer_address; ?></td>
								<td><?php echo $order->contact_no; ?></td>
								<td><?php echo date("m/d/Y", strtotime($order->order_date)); ?></td>
								<td><?php echo $order->order_type; ?></td>
								<td><?php echo date("m/d/Y", strtotime($order->order_dp_date)); ?></td>
								<td><?php echo $order->firstname; ?></td>
								<td><?php echo $order->order_status; ?></td>
								<td>
									<a href="<?php echo base_url(); ?>orders/edit/<?php echo $order->order_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Status </a>
									<br>
									<br>
									<a href="<?php echo base_url(); ?>orders/cancel/<?php echo $order->order_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel Order </a>
								</td>
						  </tr>
						<?php endforeach;?>
					</tbody>
				</table>
			<?php endif; ?>					
		</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php echo $pagination; ?>
			</div>
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