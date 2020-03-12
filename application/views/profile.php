<?php $this->load->view('header'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Profile</h3>
			</div>
			<div class="panel-body">
				
				<div class="col-md-10">
					<?php echo $this->session->flashdata('message'); ?>
					<form id="profile-form" class="form-horizontal" method="post" action="<?php echo base_url(); ?>users/updateProfile/">
						<div class="form-group">
							<label class="col-sm-2 control-label">Firstname:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="<?php echo $user->firstname; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Lastname:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="<?php echo $user->lastname; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user->email; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
						
								<button type="submit" id="button-profile" class="btn btn-primary">Update</button>
								<a id="cancel" class="btn btn-default">Cancel</a>
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

<script>
	$( document ).ready(function() {
		$( "#profile_picture" ).hide();
		$( "#button-profile-picture" ).hide();
		$( "#cancel-profile-picture" ).hide();
		$( "#button-profile" ).hide();
		$( "#cancel" ).hide();
		$( "#edit_profile" ).click(function() {
			$( "#profile-form :input" ).removeAttr( "readonly" );
			$( "#edit_profile" ).hide();
			$( "#button-profile" ).show();
			$( "#cancel" ).show();
		});
		
		$( "#cancel" ).click(function() {
			$( "#profile-form :input" ).attr('readonly', 'readonly')
			$( "#edit_profile" ).show();
			$( "#button-profile" ).hide();
			$( "#cancel" ).hide();
		});
		
		$( "#profile-picture-toggle" ).click(function() {
			$( "#profile_picture" ).show();
			$( "#button-profile-picture" ).show();
			$( "#cancel-profile-picture" ).show();
		});
		
		$( "#cancel-profile-picture" ).click(function() {
			$( "#profile_picture" ).hide();
			$( "#button-profile-picture" ).hide();
			$( "#cancel-profile-picture" ).hide();
		});
	});
</script>

</body>
</html>