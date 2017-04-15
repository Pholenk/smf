<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Users List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-xs-5" style="padding: 0 2%;">
							<h3>User List</h3>
							<form method="post" id="ts_form">
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_user_tech_support">
								<tr style="text-align:center;">
									<th>Email</th>
									<th>Nama</th>
									<th>Action</th>
								</tr>
								<?php //foreach ($production_data as $data) { ?>
								<tr id="edit_source_<?php echo 'IU0002' ?>">
									<td id='ts_email_<?php echo 'IU0002' ?>'><?php echo '$data->berat_badan2' ?></td>
									<td id='ts_name_<?php echo 'IU0002' ?>'><?php echo '$data->fcr' ?></td>
									<td>
										<button type="submit" class="btn btn-success" id="add_tech_support_<?php echo 'IU0002' ?>"><i class="fa fa-plus"></i> ADD</button>
									</td>
								</tr>
								<?php //}?>
							</table>
							</form>
						</div>
						<div class="col-xs-7" style="padding: 0 2%;">
							<h3>Technical Support List</h3>
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_ts_tech_support">
								<tr style="text-align:center;">
									<th>Email</th>
									<th>Nama</th>
									<th>Peternak</th>
									<th>Populasi</th>
									<th>Action</th>
								</tr>
								<?php //foreach ($production_data as $data) { ?>
								<tr id="edit_source_<?php echo '$data->id' ?>">
									<td><?php echo '$data->berat_badan' ?></td>
									<td><?php echo '$data->fcr' ?></td>
									<td><?php echo '$data->mortalitas' ?></td>
									<td><?php echo '$data->feed_intake' ?></td>
									<td>
										<a href="/std_production/delete/<?php echo '$data->id' ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<tr>
								</tr>
								<?php //}?>
							</table>
						</div>

					</div>
					<!-- /.box-body -->
					<!-- box-footer -->
					<div class="box-footer">
						
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