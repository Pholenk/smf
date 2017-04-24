<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Users List</h3>
						<div class="box-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
								<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-sm-12">
							<table class="table table-hover" style="margin-top:1%;border:none;">
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th> </th>
								</tr>
								<?php
									$i=1;
									foreach ($users_data as $key) { 
									?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $key->id; ?></td>
									<td><?php echo $key->name_full; ?></td>
									<td><?php echo $key->email; ?></td>
									<td><?php echo $key->jabatan; ?></td>
									<td>
										<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="edit_user_<?php echo $key->email ?>"><i class="fa fa-edit"></i> EDIT</button>
										<a href="<?php echo base_url('/users/delete/'.$key->id)?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<?php $i++;}?>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<div class="col-sm-6">
							<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal" id="add_user"><i class="fa fa-plus"></i> ADD</button>
						</div>
					</div>
				</div>
				<!-- /.box -->
				<div class="modal fade" id="modal" tab-index="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>