<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Upload/Update Product </h3>
			</div>
			<br>	
					<form id="change-profile-picture" class="form-horizontal" method="post" action="<?php echo base_url(); ?>products/uploadProductPicture/" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="file" style="height: auto;" class="form-control" id="product_picture" name="userfile">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<button type="submit" id="button-profile-picture" class="btn btn-primary">Upload</button>
								<a href="<?php echo base_url(); ?>products/" class="btn btn-default">Cancel</a>
							</div>
						</div>
					</form>
				</div>
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