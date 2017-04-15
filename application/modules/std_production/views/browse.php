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
						<div class="col-xs-12" style="padding: 0 5%;">
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_std_prod">
								<tr style="text-align:center;">
									<th>Berat (kg)</th>
									<th>FCR</th>
									<th>Mortalitas (%)</th>
									<th>Feed Intake (gr)</th>
									<th>Umur (hari)</th>
									<th>Action</th>
								</tr>
								<?php
									foreach ($production_data as $data) { 
									?>
								<tr id="edit_source_<?php echo $data->id ?>">
									<td><?php echo $data->berat_badan ?></td>
									<td><?php echo $data->fcr ?></td>
									<td><?php echo $data->mortalitas ?></td>
									<td><?php echo $data->feed_intake ?></td>
									<td><?php echo $data->age ?></td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" id="edit_std_prod_<?php echo $data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
										<a href="/std_production/delete/<?php echo $data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<tr>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
					<!-- box-footer -->
					<div class="box-footer">
						<div class="col-sm-6">
							<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal" id="add_std_prod"><i class="fa fa-plus"></i> ADD</button>
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