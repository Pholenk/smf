<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title" style="font-weight:bold;"><i class="fa fa-warning" style="color:orange;"></i> Users Privileges</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12" style="padding: 0 5%;">
								<form method="post">
									<div class="form-group">
										<label class="col-xs-3">Users Name</label>
										<div class="col-sm-9">
											<select name="user_priv" class="form-control" id="user_priv"> 
												<option> </option>
												<?php foreach ($users_data as $user) {?>
												<option value=<?php echo $user->id ?> ><?php echo $user->name_full ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</form>
							</div>
						</div>
	              		<button type='button' class="btn btn-info" style="margin:2% 30%;" id="edit_priv"><i class="fa fa-edit"></i> EDIT</button>
	            		
						<div class="row">
							<div class="col-xs-12" style="padding: 0 5%;" id="result"></div>
						</div>
					</div>
					<div class='box-footer'>
						
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
