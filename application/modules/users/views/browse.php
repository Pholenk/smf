<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Users List</h3>
						<div class="box-tools">
							<div class="input-group pull-right" style="width: 23%;">
								<input type="text" id="table_search" class="form-control" placeholder="Search">
								<span class="input-group-addon" style='color:white;background-color:grey;'><i class="fa fa-search"></i></span>
							</div>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-sm-12">
							<table class="table table-hover" style="margin-top:1%;border:none;">
								<thead>
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody id="user-data">
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
										<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_user_<?php echo $key->email ?>"><i class="fa fa-edit"></i> EDIT</button>
										<a href="<?php echo base_url('/users/delete/'.$key->id)?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<?php $i++;}?>
								</tbody>
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