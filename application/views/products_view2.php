<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<br />
		<br />
		<?php echo $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="table-responsive">
			<?php if($order_items): ?>
				<table class="table table-bordered table-responsive">
					<thead>							
					  <tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
					  </tr>
					</thead>
					<tbody>
					<?php $total=0.00; ?>
						<?php foreach($order_items as $order_item): ?>
							<tr>
								<td><?php echo $order_item->product_name; ?></td>
								<td><?php echo $order_item->price; $total = $total + $order_item->price; ?></td>
								<td><?php echo $order_item->quantity; ?></td>	
						  </tr>
						<?php endforeach;?>
					</tbody>
					<tbody>							
					  <tr>
						<td>Total Price </td>
						<td><?php echo $total; ?></td>
					  </tr>
					 </tbody>
				</table>
				<center>
				 <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
				<a href="<?php echo base_url(); ?>reports/">
                    Back to Reports</button>
					</div>
				</div>
				</center>
			<?php endif; ?>					
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