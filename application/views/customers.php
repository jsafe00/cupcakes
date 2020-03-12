<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<a href="<?php echo base_url(); ?>customers/add/" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Add New Customer</a>
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		
		<div class="row">
			<div class="table-responsive">
			<?php if($customers): ?>
				<table class="table table-bordered table-responsive">
					<thead>							
					  <tr>
						<th>Customer Name</th>
						<th>Customer Address</th>
						<th>Contact Number</th>
						<th>Add Order</th>
						<th>Update Information</th>
						<th>Delete Customer</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($customers as $customer): ?>
							<tr>
								
								<td><?php echo $customer->customer_name; ?></td>
								<td><?php echo $customer->customer_address; ?></td>	
								<td><?php echo $customer->contact_no; ?></td>
								<td><a href="<?php echo base_url(); ?>orders/products/<?php echo $customer->customer_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Add Order </a></td>
								<td><a href="<?php echo base_url(); ?>customers/edit/<?php echo $customer->customer_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update </a></td>
								<td><a href="<?php echo base_url(); ?>customers/cancelCustomerByID/<?php echo $customer->customer_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel </a></td>
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