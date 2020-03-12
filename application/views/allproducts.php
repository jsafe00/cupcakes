<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<a href="<?php echo base_url(); ?>products/add" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Add New Product</a>
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		
		<div class="row">
			<div class="table-responsive">
			<?php if($products): ?>
				<table class="table table-bordered table-responsive">
					<thead>							
					  <tr>
						
						
						<th>Picture</th>
						<th>Product Name</th>
						<th>Price (Each)</th>
						<th>Description</th>
						<th>Status</th>
						<th>Upload/Change Picture</th>
						<th>Update Product</th>
						<th>Delete Product</th>
										
					  </tr>
					</thead>
					<tbody>
						<?php foreach($products as $allproduct): ?>
							<tr>
								
								<td><img src="<?php echo base_url(); ?>uploads/<?php echo $allproduct->product_picture; ?>" width="150px" ></td>
								<td><?php echo $allproduct->product_name; ?></td>
								<td><?php $allproduct->price = number_format($allproduct->price, 2); echo $allproduct->price; ?></td>
								
								<td><?php echo $allproduct->description; ?></td>
								<td><?php echo $allproduct->status; ?></td>
								<td><a href="<?php echo base_url(); ?>products/uploadpicture/<?php echo $allproduct->product_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Upload/Update Picture</a></td>
								<td><a href="<?php echo base_url(); ?>products/edit/<?php echo $allproduct->product_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update </a></td>
								<td><a href="<?php echo base_url(); ?>products/cancelProductByID/<?php echo $allproduct->product_id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancel </a></td>
								
								
								
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